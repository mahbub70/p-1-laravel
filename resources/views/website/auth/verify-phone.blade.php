@extends('website.layouts.app')

@section('content')
    <!-- Register Area START -->
    <div class="register my-16">
        <div class="area-container px-6">
            <div class="content md:w-1/2 m-auto bg-white drop-shadow-sm border border-[#ddd] p-6 rounded">

                <div class="register-header mb-4">
                    <h2 class="text-xl font-bold text-[#566C7B]">{{ __("OTP Verification") }}</h2>
                    <p class="text-xs font-medium text-gray-500">{{ __("Please verify your phone number with 6 digits OTP code. OTP sended to your phone number: ") }} <strong>{{ $temp->data->full_phone }}</strong>. {{ __("Please check SMS inbox and verify within 10 minutes.") }}
                    </p>
                </div>

                <div class="register-form">
                    <form action="{{ route('website.user.register.verifyPhone.submit', $token) }}" method="POST" class="x-http-r-send">
                        @csrf

                        <div class="input-wrapper flex gap-3 justify-center">
                            <input type="number" name="code[]" min="0" max="9" class="otp-input py-2 px-4 text-sm rounded border border-[#ddd] outline-0 appearance-none">
                            <input type="number" name="code[]" min="0" max="9" class="otp-input py-2 px-4 text-sm rounded border border-[#ddd] outline-0 appearance-none">
                            <input type="number" name="code[]" min="0" max="9" class="otp-input py-2 px-4 text-sm rounded border border-[#ddd] outline-0 appearance-none">
                            <input type="number" name="code[]" min="0" max="9" class="otp-input py-2 px-4 text-sm rounded border border-[#ddd] outline-0 appearance-none">
                            <input type="number" name="code[]" min="0" max="9" class="otp-input py-2 px-4 text-sm rounded border border-[#ddd] outline-0 appearance-none">
                            <input type="number" name="code[]" min="0" max="9" class="otp-input py-2 px-4 text-sm rounded border border-[#ddd] outline-0 appearance-none">
                        </div>

                        <div class="input-wrapper mt-4 w-full text-end flex justify-between items-center">

                            <div class="text-xs text-[#566C7B] flex items-center gap-1 code-resend-area">
                                <p>Don't get code?</p>
                            </div>

                            <button type="submit" class="transitions duration-200 inline-block py-1 sm:py-1.5 px-4 bg-[#FFAA71] hover:bg-[#FF9045] rounded fotn-medium text-white">{{ __("Verify") }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Area END -->
@endsection

@push('script')

    <script type="module">
        let resendTime = "{{ $resend_time }}";
        let resendLink = "{{ route('website.user.register.verifyPhone.resend', $token) }}";

        if(resendTime > 0) {
            // Need to show timer with second
            $(".code-resend-area").find(".resend-btn").remove();
            $(".code-resend-area").append(`<p class="resend-timer font-medium text-sky-900">Resend after: <span class="resend-time font-bold text-sky-500 text-sm">${resendTime}</span> s</p>`);

            let timerInterval = setInterval(() => {
                // console.log("working");
                resendTime--;
                $(".code-resend-area").find(".resend-time").text(resendTime);

                if(resendTime < 0) {
                    clearInterval(timerInterval);

                    // Add resend button
                    $(".code-resend-area").find(".resend-timer").remove();
                    $(".code-resend-area").append(`<a href="${resendLink}" class="text-blue-600 font-medium resend-btn">Resend</a>`);
                }

            }, 1000);

        }else {
            // resend button
            $(".code-resend-area").find(".resend-timer").remove();
            $(".code-resend-area").append(`<a href="${resendLink}" class="text-blue-600 font-medium resend-btn">Resend</a>`);

            // console.log($(".code-resend-area").find("resend-timer").remove());
        }

        // $(document).on("click",".resend-btn", function() {
        //     $(this).addClass("pointer-events-none");
        // });

    </script>

@endpush