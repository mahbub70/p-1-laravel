<?php

namespace App\Http\Controllers\Website\User\Auth;

use Exception;
use App\Models\Temp;
use App\Http\Helpers\JSON;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Declare OTP resend delay time for phone verification.
     */
    protected $phone_otp_resend_delay_time = 120;

    protected $verify_phone = false;

    public function showRegistrationForm() {
        $title = "Register";

        return view('website.auth.register',[
            'title'         => $title,
            'geo_divisions' => get_geo_divisions(),
        ]);

    }

    /**
     * Handle a registration request and store it in temp data.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function registerRequest(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'full_name'     => 'required|string|max:200',
            'username'      => 'nullable|string|max:100',
            'email'         => 'nullable|string|email|max:200|unique:users',
            'phone'         => 'required|string|max:200',
            'full_phone'    => 'required|string|phone|max:200|unique:users',
            'division'      => 'required|numeric',
            'district'      => 'required|numeric',
            'upazila'       => 'required|numeric',
            'blood_group'   => 'required|numeric',
            'password'      => 'required|min:6|confirmed',
        ]);

        if($validator->fails()) return JSON::error($validator->errors(),[],400);
        $validated = $validator->validate();
        $validated['division']      = get_geo_division_info_by_id($validated['division']);
        $validated['district']      = get_geo_district_info_by_id($validated['district']);
        $validated['upazila']       = get_geo_upazila_info_by_id($validated['upazila']);
        $validated['blood_group']   = bloodGroups($validated['blood_group']);
        $validated['password']      = Hash::make($validated['password']);

        try{
            // Store data in temporary database location
            $temp = $this->tempCreate($validated);

            if($this->verify_phone) {
                // Send SMS to Verify Phone Number
                $phone_otp                      = 456789;
                $temp_data                      = json_decode(json_encode($temp->data), true);
                $temp_data['phone_otp']         = $phone_otp;
                $temp_data['otp_created_at']    = now();
                $temp_data['otp_expire_at']     = now()->addMinutes(10);

                $temp->update([
                    'data'  => $temp_data,
                ]);
            }

        }catch(Exception $e) {
            return JSON::error(['Something went wrong! Please try again ['. $e->getMessage() .']']);
        }

        if($this->verify_phone == false) {
            return $this->register(new Request($validated), $temp->token);
        }

        return JSON::success(['Data stored success'],[
            'next_page_url'      =>  route('website.user.register.verifyPhone.view', $temp->token),
        ], 200);
    }

    public function tempCreate($data) {
        return Temp::create([
            'token'         => Str::uuid(),
            'data'          => $data,
            'expire_at'     => now()->addHour(),
            'created_at'    => now(),
        ]);
    }

    public function verifyPhoneView(Request $request, $token) {
        $temp = Temp::where("token", $token)->firstOrFail();
        $page_title = "Phone Verification";

        // get resend time
        $resend_time = 0;
        if(Carbon::parse($temp->data->otp_created_at)->addSeconds($this->phone_otp_resend_delay_time) > now()) {
            $resend_time = Carbon::parse($temp->data->otp_created_at)->addSeconds($this->phone_otp_resend_delay_time)->diffInSeconds(now());
        }

        return view('website.auth.verify-phone', compact('temp','page_title','temp','token','resend_time'));
    }

    public function verifyPhoneResend($token) {

        $temp = Temp::where("token", $token)->firstOrFail();

        // If request is resend code  
        $resend_otp = 123456;

        // update temp data
        $temp_data                      = json_decode(json_encode($temp->data),true);
        $temp_data['phone_otp']         = $resend_otp;
        $temp_data['otp_created_at']    = now();
        $temp_data['otp_expire_at']     = now()->addMinutes(10);

        try{
            $temp->update([
                'data'  => $temp_data,
            ]);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again. [' . $e->getMessage() . ']']]);
        }

        return redirect()->route('website.user.register.verifyPhone.view',$token)->with(['success' => ['Successfully resend OTP!']]);
    }

    public function verifyPhoneSubmit(Request $request, $token) {

        $validator = Validator::make($request->all(),[
            'code'     => 'required|array|min:6|max:6',
            'code.*'   => 'required|numeric',
        ]);

        if($validator->fails()) {
            return JSON::error($validator->errors());
        }

        $validated = $validator->validate();
        $validated['code'] = implode('',$validated['code']);

        $temp_data = Temp::token($token)->first();

        if(!$temp_data) return JSON::error(['Request token is expired or invalid. Please try again.'],[],498); // if token not exists in database
        
        if(now() > Carbon::parse($temp_data->data->otp_expire_at)) return JSON::error(['OTP is expired. Please resend and verify.'],[],401); // check otp input time is expire or not

        if($validated['code'] != $temp_data->data->phone_otp) return JSON::error(['Invalid OTP. Please try again with valid OTP.'],[],400); // if OTP is invalid

        return $this->register(new Request(
            json_decode(json_encode($temp_data->data),true)
        ), $token);
    }

    public function register(Request $request, $token)
    {
        $request->merge(['token' => $token]);
        $validator = Validator::make($request->all(),[
            'token'     => 'required|exists:temps,token'
        ]);

        if($validator->fails()) return JSON::error($validator->errors()->all(),[],400);

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }


    public function create(array $data) {
        return User::create([
            'full_name'         => $data['full_name'],
            'username'          => $data['username'],
            'email'             => $data['email'],
            'full_phone'        => $data['full_phone'],
            'blood_group'       => $data['blood_group'],
            'address'           => [
                'division'      => $data['division'],
                'district'      => $data['district'],
                'upazila'       => $data['upazila'],
            ],
            'password'          => $data['password'],
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        return JSON::success(['Registration Success'],[
            'next_page_url'      =>  redirect()->intended(route('website.user.profile.index'))->getTargetUrl(),
        ], 200);
    }

    public function redirectPath() {
        return route('website.home');
    }

}
