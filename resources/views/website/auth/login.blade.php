@extends('website.layouts.app')

@section('content')
    <!-- login Area START -->
    <div class="login my-16">
        <div class="area-container px-6">
            <div class="content md:w-1/2 m-auto bg-white drop-shadow-sm border border-[#ddd] p-6 rounded">

                <div class="login-header mb-4">
                    <h2 class="text-xl font-bold text-[#566C7B]">{{ __("User Login") }}</h2>
                    <p class="text-xs font-medium text-gray-500">{{ __("Please login to access your account dashboard") }}</p>
                </div>

                <div class="login-form">
                    <form action="{{ route('website.user.login.submit') }}" method="POST" class="x-http-r-send">

                        @csrf

                        <div class="input-wrapper mb-2 w-full">
                            <label for="phone" class="block text-xs mb-1 font-medium text-[#566C7B]">{{ __("Phone") }}</label>
                            <input type="tel" name="phone" id="phone" placeholder="Enter Phone Number" class="iti-phone w-full py-2 px-4 text-sm rounded border border-[#ddd] outline-0" value="">
                        </div>

                        <div class="input-wrapper mb-2 w-full">
                            <label for="password" class="block text-xs mb-1 font-medium text-[#566C7B]">{{ __("Password") }}</label>
                            <div class="input-field-wrap relative">
                                <input type="password" name="password" id="password" placeholder="Enter Password" class="w-full py-2 px-4 text-sm rounded border border-[#ddd]">
                                <span class="icon opacity-75 absolute right-3 top-1/2 translate-y-[-50%] cursor-pointer password-eye-btn">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>

                        <div class="input-wrapper mt-4 w-full text-end">
                            <button type="submit" class="transitions duration-200 inline-block py-1 sm:py-1.5 px-4 bg-[#FFAA71] hover:bg-[#FF9045] rounded fotn-medium text-white">{{ __("Login") }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- login Area END -->
@endsection