@extends('website.layouts.app')

@section('content')

    <!-- Profile Area START -->
    <div class="profile my-16">
        <div class="area-container px-6">
            <div class="content">

                <!-- Profile Info Awarded START -->
                <div class="profile-info-awarded md:flex justify-between gap-5">

                    <div class="profile-info flex items-center gap-3 w-full mb-4 md:0">
                        <div class="image-box max-w-[100px] max-h-[100px] sm:max-h-[150px] sm:max-w-[150px] md:max-h-[200px] md:max-w-[200px] overflow-hidden rounded-full">
                            <img src="{{ $user->image_link }}" class="w-full h-full object-cover" alt="Profile Image">
                        </div>
                        <div class="user-info">
                            <h2 class="full-name text-xl font-medium text-[#353535]">MD Mahbubur Rahman Rokon</h2>
                            <p class="phone-number text-sm text-[#071952] font-light">+8801998080167</p>
                            <p class="email-address text-sm text-[#071952] font-light">mail.mahbub22@gmail.com</p>
                        </div>
                    </div>

                    <div class="awarded w-full shadow-md min-h-[150px] rounded">
                        <div class="header bg-[#ddd] border-b border-[#353535] p-2 rounded">
                            <h2 class="text-sm text-[#353535] font-medium">Achievements</h2>
                        </div>

                        <div class="awards p-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus molestiae deserunt atque. Quos consectetur reiciendis quibusdam atque minus? Dolor, corrupti itaque. Beatae vitae sunt voluptatum saepe amet non quae nostrum?
                        </div>
                    </div>
                </div>
                <!-- Profile Info Awarded END -->


                <!-- Profile Info Form START -->
                <div class="account-settings md:flex justify-between gap-6">

                    <!-- Update Profile Information -->
                    <div class="update-profile-info shadow-md p-6 mt-6 md:w-1/2 border border-[#ddd] rounded">

                        <div class="header mb-6">
                            <h2 class="text-xl text-[#35353] font-medium mb-2">Update Profile Information</h2>
                            <p class="text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto hic earum soluta voluptates! At nihil quod reiciendis tenetur, id alias maxime quibusdam, corrupti incidunt eaque delectus laudantium ea consequuntur rem?</p>
                        </div>

                        <form action="" method="POST" enctype="application/x-www-form-urlencoded">
                            <div class="input-wrapper mb-2 w-full">
                                <label for="fullName" class="block text-xs mb-1 font-medium text-[#566C7B]">Full Name <span class="text-xs text-gray-500 font-light">(Required)</span></label>
                                <input type="text" name="full_name" id="fullName" placeholder="Enter Full Name" class="w-full py-2 px-4 text-sm rounded border border-[#ddd]">
                            </div>

                            <div class="input-wrapper mb-2 w-full">
                                <label for="userName" class="block text-xs mb-1 font-medium text-[#566C7B]">Username</label>
                                <input type="text" name="username" id="userName" placeholder="Enter Username" class="w-full py-2 px-4 text-sm rounded border border-[#ddd]">
                            </div>

                            <div class="input-wrapper mb-2 w-full">
                                <label for="group" class="block text-sm mb-1 font-medium text-[#566C7B]">Position <span class="text-xs text-gray-500 font-light">(Required)</span></label>
                                <select name="group" id="position" class="border border-[#ddd] py-2 pl-4 pr-8 rounded text-sm w-full">
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
                                <label for="group" class="block text-sm mb-1 font-medium text-[#566C7B]">City <span class="text-xs text-gray-500 font-light">(Required)</span></label>
                                <select name="group" id="city" class="border border-[#ddd] py-2 pl-4 pr-8 rounded text-sm w-full">
                                    <option value="" selected disabled>Choose One</option>
                                    <option value="">Dhaka</option>
                                    <option value="">Mymensingh</option>
                                    <option value="">Sylhet</option>
                                    <option value="">CTG</option>
                                </select>
                            </div>

                            <div class="input-wrapper mb-2 w-full">
                                <label for="group" class="block text-sm mb-1 font-medium text-[#566C7B]">Area <span class="text-xs text-gray-500 font-light">(Required)</span></label>
                                <select name="group" id="area" class="border border-[#ddd] py-2 pl-4 pr-8 rounded text-sm w-full">
                                    <option value="" selected disabled>Choose One</option>
                                    <option value="">Mirpur</option>
                                    <option value="">Uttora</option>
                                    <option value="">Mohammadpur</option>
                                    <option value="">Dhanmondi</option>
                                </select>
                            </div>

                            <div class="input-wrapper mt-4 w-full text-end">
                                <button type="submit" class="transitions duration-200 inline-block py-1 sm:py-1.5 px-4 bg-[#FFAA71] hover:bg-[#FF9045] rounded fotn-medium text-white">Update</button>
                            </div>
                        </form>
                    </div>

                    <!-- Update Password & Account Delete Section -->
                    <div class="password-account-delete-wrap mt-6 md:w-1/2">

                        <!-- Record -->
                        <div class="record shadow-md border border-[#ddd] rounded h-fit pb-6">

                            <div class="header bg-[#ddd] border-b border-[#353535] p-2 rounded flex justify-between items-center">
                                <h2 class="text-sm text-[#353535] font-medium">Records</h2>
                                <button class="text-sm text-white shadow-md transitions duration-200 inline-block py-1 px-3 bg-[#00BEB2] hover:bg-[#02897C] rounded fotn-medium">Add New</button>
                            </div>

                            <div class="alert my-4 py-1 px-6">
                                <p class="text-black bg-[#FF702D] py-1 px-6 rounded text-[#27374D] font-normal">Lorem ipsum dolor</p>
                            </div>

                            <div class="record-list px-6">
                                <table class="table-auto w-full text-center text-sm">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>10/10/2022</td>
                                            <td>Uttora, Dhaka</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <!-- Update Password -->
                        <div class="update-password shadow-md p-6 border border-[#ddd] rounded h-fit mt-6">
                            <form action="" method="POST">

                                <div class="header mb-6">
                                    <h2 class="text-xl text-[#35353] font-medium mb-2">Change Account Password</h2>
                                    <p class="text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto hic earum soluta voluptates! At nihil quod reiciendis tenetur, id alias maxime quibusdam, corrupti incidunt eaque delectus laudantium ea consequuntur rem?</p>
                                </div>

                                <div class="input-wrapper mb-2 w-full">
                                    <label for="currentPassword" class="block text-xs mb-1 font-medium text-[#566C7B]">Current Password</label>
                                    <div class="input-field-wrap relative">
                                        <input type="password" name="current_password" id="currentPassword" placeholder="Enter Current Password" class="w-full py-2 px-4 text-sm rounded border border-[#ddd]">
                                        <span class="icon opacity-75 absolute right-3 top-1/2 translate-y-[-50%] cursor-pointer password-eye-btn">
                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </span>
                                    </div>
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
                                    <button type="submit" class="transitions duration-200 inline-block py-1 sm:py-1.5 px-4 bg-[#FFAA71] hover:bg-[#FF9045] rounded fotn-medium text-white">Update</button>
                                </div>


                            </form>
                        </div>


                        <!-- Account Delete -->
                        <div class="account-delete shadow-md p-6 border border-[#ddd] rounded h-fit mt-6">
                            <form action="" method="POST">

                                <div class="header mb-6">
                                    <h2 class="text-xl text-[#35353] font-medium mb-2">Delete Account (Permanently)</h2>
                                    <p class="text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto hic earum soluta voluptates! At nihil quod reiciendis tenetur, id alias maxime quibusdam, corrupti incidunt eaque delectus laudantium ea consequuntur rem?</p>
                                </div>


                                <div class="input-wrapper mb-2 w-full">
                                    <label for="typeText" class="block text-xs mb-1 font-medium text-[#566C7B]">Type Text <span class="text-xs text-gray-500 font-light">(Required)</span></label>
                                    <input type="text" name="text" id="typeText" placeholder="Enter Text" class="w-full py-2 px-4 text-sm rounded border border-[#ddd]">
                                </div>


                                <div class="input-wrapper mt-4 w-full text-end">
                                    <button type="submit" class="transitions duration-200 inline-block py-1 sm:py-1.5 px-4 bg-red-400 hover:bg-red-600 rounded fotn-medium text-white">Delete</button>
                                </div>


                            </form>
                        </div>



                    </div>

                    
                </div>
                <!-- Profile Info Form END -->

            </div>
        </div>
    </div>
    <!-- Profile Area END -->

@endsection

@push('script')

@endpush