@extends('website.layouts.app')

@section('content')
    <!-- Register Area START -->
    <div class="register my-16">
        <div class="area-container px-6">
            <div class="content md:w-1/2 m-auto bg-white drop-shadow-sm border border-[#ddd] p-6 rounded">

                <div class="register-header mb-4">
                    <h2 class="text-xl font-bold text-[#566C7B]">User Registration</h2>
                    <p class="text-xs font-medium text-gray-500">Register & Support</p>
                </div>

                <div class="register-form">
                    <form action="" method="POST">

                        <div class="input-wrapper mb-2 w-full">
                            <label for="fullName" class="block text-xs mb-1 font-medium text-[#566C7B]">Full Name <span class="text-xs text-gray-500 font-light">(Required)</span></label>
                            <input type="text" name="full_name" id="fullName" placeholder="Enter Full Name" class="w-full py-2 px-4 text-sm rounded border border-[#ddd]">
                        </div>

                        <div class="input-wrapper mb-2 w-full">
                            <label for="userName" class="block text-xs mb-1 font-medium text-[#566C7B]">Username</label>
                            <input type="text" name="username" id="userName" placeholder="Enter Username" class="w-full py-2 px-4 text-sm rounded border border-[#ddd]">
                        </div>

                        <div class="input-wrapper mb-2 w-full">
                            <label for="position" class="block text-sm mb-1 font-medium text-[#566C7B]">Position <span class="text-xs text-gray-500 font-light">(Required)</span></label>
                            <select name="position" id="position" class="border border-[#ddd] py-2 pl-4 pr-8 rounded text-sm w-full">
                                <option value="" selected disabled>Choose One</option>
                                <option value="">Top</option>
                                <option value="">Left</option>
                                <option value="">Bottom</option>
                                <option value="">Right</option>
                            </select>
                        </div>

                        <div class="input-wrapper mb-2 w-full">
                            <label for="email" class="block text-xs mb-1 font-medium text-[#566C7B]">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter Email Address" class="w-full py-2 px-4 text-sm rounded border border-[#ddd]">
                        </div>

                        <div class="input-wrapper mb-2 w-full">
                            <label for="phone" class="block text-xs mb-1 font-medium text-[#566C7B]">Phone <span class="text-xs text-gray-500 font-light">(Required)</span></label>
                            <input type="text" name="phone" id="phone" placeholder="Enter Phone Number" class="w-full py-2 px-4 text-sm rounded border border-[#ddd]">
                        </div>

                        <div class="input-wrapper mb-2 w-full">
                            <label for="division" class="block text-sm mb-1 font-medium text-[#566C7B]">Division <span class="text-xs text-gray-500 font-light">(Required)</span></label>
                            <select name="division" id="division" class="border border-[#ddd] py-2 pl-4 pr-8 rounded text-sm w-full basic-select2">
                                <option value="" selected disabled>Choose One</option>
                                @foreach ($geo_divisions as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-wrapper mb-2 w-full">
                            <label for="district" class="block text-sm mb-1 font-medium text-[#566C7B]">District<span class="text-xs text-gray-500 font-light">(Required)</span></label>
                            <select name="district" id="district" class="border border-[#ddd] py-2 pl-4 pr-8 rounded text-sm w-full basic-select2">
                                <option value="" selected disabled>Choose One</option>
                                {{-- @foreach ($geo_divisions as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach --}}
                            </select>
                        </div>

                        <div class="input-wrapper mb-2 w-full">
                            <label for="upozila" class="block text-sm mb-1 font-medium text-[#566C7B]">Upozila <span class="text-xs text-gray-500 font-light">(Required)</span></label>
                            <select name="upozila" id="upozila" class="border border-[#ddd] py-2 pl-4 pr-8 rounded text-sm w-full basic-select2">
                                <option value="" selected disabled>Choose One</option>
                                {{-- @foreach ($geo_divisions as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach --}}
                            </select>
                        </div>

                        <div class="input-wrapper mb-2 w-full">
                            <label for="group" class="block text-sm mb-1 font-medium text-[#566C7B]">Area <span class="text-xs text-gray-500 font-light">(Required)</span></label>
                            <select name="group" id="group" class="border border-[#ddd] py-2 pl-4 pr-8 rounded text-sm w-full">
                                <option value="" selected disabled>Choose One</option>
                                <option value="">Mirpur</option>
                                <option value="">Uttora</option>
                                <option value="">Mohammadpur</option>
                                <option value="">Dhanmondi</option>
                            </select>
                        </div>

                        <div class="input-wrapper mb-2 w-full">
                            <label for="password" class="block text-xs mb-1 font-medium text-[#566C7B]">Password</label>
                            <div class="input-field-wrap relative">
                                <input type="password" name="password" id="password" placeholder="Enter Password" class="w-full py-2 px-4 text-sm rounded border border-[#ddd]">
                                <span class="icon opacity-75 absolute right-3 top-1/2 translate-y-[-50%] cursor-pointer password-eye-btn">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>

                        <div class="input-wrapper mb-2 w-full">
                            <label for="confirmPassword" class="block text-xs mb-1 font-medium text-[#566C7B]">Confirm Password</label>
                            <div class="input-field-wrap relative">
                                <input type="password" name="password_confirmation" id="confirmPassword" placeholder="Enter Confirm Password" class="w-full py-2 px-4 text-sm rounded border border-[#ddd]">
                                <span class="icon opacity-75 absolute right-3 top-1/2 translate-y-[-50%] cursor-pointer password-eye-btn">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>

                        <div class="input-wrapper mt-4 w-full text-end">
                            <button type="submit" class="transitions duration-200 inline-block py-1 sm:py-1.5 px-4 bg-[#FFAA71] hover:bg-[#FF9045] rounded fotn-medium text-white">Register</button>
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

        $("select[name=division]").change(function() {
            let division_id = $(this).val();
            localGeo.getDistrictsOnDivision("{{ route('geo.getDistrictsOnDivision') }}", division_id);
        });

    </script>

@endpush