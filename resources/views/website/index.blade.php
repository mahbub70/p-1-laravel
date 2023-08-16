@extends('website.layouts.app')

@section('content')

    <!-- Banner Area START -->
    <div class="banner pt-[35px] w-full">
        <div class="area-container">
            <div class="content">

                <!-- Slider main container -->
                <div class="swiper h-[250px] sm:h-[300px] md:h-[350px] lg:h-[400px]">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">

                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="content relative h-full">

                                <div class="image absolute w-full h-full top-0 left-0">
                                    <img class="w-full h-full object-cover" src="{{ asset('storage/images/banner/banner-1.jpg') }}" alt="Image">
                                </div>

                                <div class="text absolute top-1/2 translate-y-[-50%] left-4 max-w-[70%] sm:max-w-[50%]">
                                    <h2 class="text-base min-[420px]:text-lg sm:text-2xl md:text-4xl font-bold text-[#fff] mb-1 sm:mb-2">Lorem ipsum dolor sit.</h2>
                                    <p class="text-xs sm:text-sm font-normal text-[#ddd]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis illum beatae iusto quod culpa laudantium voluptatem blanditiis rerum quae quam illo earum, repellendus dolore sed ipsum. Rem eligendi enim quasi!</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="content relative h-full">

                                <div class="image absolute w-full h-full top-0 left-0">
                                    <img class="w-full h-full object-cover" src="{{ asset('storage/images/banner/banner-2.jpg') }}" alt="Image">
                                </div>

                                <div class="text absolute top-1/2 translate-y-[-50%] left-4 max-w-[70%] sm:max-w-[50%]">
                                    <h2 class="text-base min-[420px]:text-lg sm:text-2xl md:text-4xl font-bold text-[#fff] mb-1 sm:mb-2">Lorem ipsum dolor sit.</h2>
                                    <p class="text-xs sm:text-sm font-normal text-[#ddd]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis illum beatae iusto quod culpa laudantium voluptatem blanditiis rerum quae quam illo earum, repellendus dolore sed ipsum. Rem eligendi enim quasi!</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="content relative h-full">

                                <div class="image absolute w-full h-full top-0 left-0">
                                    <img class="w-full h-full object-cover" src="{{ asset('storage/images/banner/banner-3.jpg') }}" alt="Image">
                                </div>

                                <div class="text absolute top-1/2 translate-y-[-50%] left-4 max-w-[70%] sm:max-w-[50%]">
                                    <h2 class="text-base min-[420px]:text-lg sm:text-2xl md:text-4xl font-bold text-[#fff] mb-1 sm:mb-2">Lorem ipsum dolor sit.</h2>
                                    <p class="text-xs sm:text-sm font-normal text-[#ddd]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis illum beatae iusto quod culpa laudantium voluptatem blanditiis rerum quae quam illo earum, repellendus dolore sed ipsum. Rem eligendi enim quasi!</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="content relative h-full">

                                <div class="image absolute w-full h-full top-0 left-0">
                                    <img class="w-full h-full object-cover" src="{{ asset('storage/images/banner/banner-4.jpg') }}" alt="Image">
                                </div>

                                <div class="text absolute top-1/2 translate-y-[-50%] left-4 max-w-[70%] sm:max-w-[50%]">
                                    <h2 class="text-base min-[420px]:text-lg sm:text-2xl md:text-4xl font-bold text-[#fff] mb-1 sm:mb-2">Lorem ipsum dolor sit.</h2>
                                    <p class="text-xs sm:text-sm font-normal text-[#ddd]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis illum beatae iusto quod culpa laudantium voluptatem blanditiis rerum quae quam illo earum, repellendus dolore sed ipsum. Rem eligendi enim quasi!</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </div>
    </div>
    <!-- Banner Area END -->

    <!-- Search Section START -->
    <div class="search">

        <div class="header translate-y-[50%] z-20 relative">
            <div class="area-container px-6 w-full sm:w-[70%] lg:w-1/2 m-auto">
                <div class="content bg-[#fff] drop-shadow-lg border broder-[#566C7B] py-6 px-4 rounded">
                    <form action="" method="POST">

                        <div class="md:flex gap-3 items-end justify-around">

                            <div class="input-wrapper mb-2 md:mb-0 w-full">
                                <label for="group" class="block text-sm mb-1 font-medium text-[#566C7B]">Position</label>
                                <select name="group" id="group" class="border border-[#ddd] p-1 pl-2 pr-8 rounded text-sm w-full">
                                    <option value="" selected disabled>Choose One</option>
                                    <option value="">Top</option>
                                    <option value="">Left</option>
                                    <option value="">Bottom</option>
                                    <option value="">Right</option>
                                </select>
                            </div>

                            <div class="input-wrapper mb-2 md:mb-0 w-full">
                                <label for="group" class="block text-sm mb-1 font-medium text-[#566C7B]">Area</label>
                                <select name="group" id="group" class="border border-[#ddd] p-1 pl-2 pr-8 rounded text-sm w-full">
                                    <option value="" selected disabled>Select Area</option>
                                    <option value="">Dhaka</option>
                                    <option value="">Mymensingh</option>
                                    <option value="">Cumilla</option>
                                    <option value="">Sylhet</option>
                                </select>
                            </div>

                            <div class="input-wrapper">
                                <button type="submit" class="py-1.5 px-6 bg-[#00BEB2] drop-shadow-lg rounded text-sm text-white font-medium">Search</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="search-result z-10">
            <div class="area-container px-6">
                <div class="content border rounded border-[#ddd] min-h-[150px] p-4 pt-28 md:pt-16 drop-shadow-lg text-sm">

                    <div class="notice">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt, quaerat. Odit in minus doloremque. Error excepturi deserunt commodi molestias esse! Rerum odio totam fugit in delectus quo perspiciatis omnis ipsam!
                    </div>

                    <!-- Search Result -->
                    <div class="search-result-wrap pt-4">

                        <div class="search-result-items border-x border-t">

                            <div class="header single-item flex justify-between items-center border-b p-3">
                                <li class="list-none w-full text-center text-md font-medium text-[#353535] border-e">Full Name</li>
                                <li class="list-none w-full text-center text-md font-medium text-[#353535] border-e hidden sm:block">Age</li>
                                <li class="list-none w-full text-center text-md font-medium text-[#353535] border-e">Address</li>
                                <li class="list-none w-full text-center text-md font-medium text-[#353535]">Info</li>
                            </div>

                            <div class="single-item flex justify-between items-center border-b p-3">
                                <li class="list-none w-full text-center text-sm text-[#353535] border-e">Mahbubur Rahman Rokon</li>
                                <li class="list-none w-full text-center text-sm text-[#353535] border-e hidden sm:block">23</li>
                                <li class="list-none w-full text-center text-sm text-[#353535] border-e">Uttora, Dhaka</li>
                                <li class="list-none w-full text-center text-sm text-[#353535]">
                                    <a href="javascript:void(0)" class="text-xs bg-[#566C7B] py-1 px-3 rounded text-[#fff]">Contact</a>
                                </li>
                            </div>
                            <div class="single-item flex justify-between items-center border-b p-3">
                                <li class="list-none w-full text-center text-sm text-[#353535] border-e">Mahbubur Rahman Rokon</li>
                                <li class="list-none w-full text-center text-sm text-[#353535] border-e hidden sm:block">23</li>
                                <li class="list-none w-full text-center text-sm text-[#353535] border-e">Uttora, Dhaka</li>
                                <li class="list-none w-full text-center text-sm text-[#353535]">
                                    <a href="javascript:void(0)" class="text-xs bg-[#566C7B] py-1 px-3 rounded text-[#fff]">Contact</a>
                                </li>
                            </div>
                            <div class="single-item flex justify-between items-center border-b p-3">
                                <li class="list-none w-full text-center text-sm text-[#353535] border-e">Mahbubur Rahman Rokon</li>
                                <li class="list-none w-full text-center text-sm text-[#353535] border-e hidden sm:block">23</li>
                                <li class="list-none w-full text-center text-sm text-[#353535] border-e">Uttora, Dhaka</li>
                                <li class="list-none w-full text-center text-sm text-[#353535]">
                                    <a href="javascript:void(0)" class="text-xs bg-[#566C7B] py-1 px-3 rounded text-[#fff]">Contact</a>
                                </li>
                            </div>
                            <div class="single-item flex justify-between items-center border-b p-3">
                                <li class="list-none w-full text-center text-sm text-[#353535] border-e">Mahbubur Rahman Rokon</li>
                                <li class="list-none w-full text-center text-sm text-[#353535] border-e hidden sm:block">23</li>
                                <li class="list-none w-full text-center text-sm text-[#353535] border-e">Uttora, Dhaka</li>
                                <li class="list-none w-full text-center text-sm text-[#353535]">
                                    <a href="javascript:void(0)" class="text-xs bg-[#566C7B] py-1 px-3 rounded text-[#fff]">Contact</a>
                                </li>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Search Section END -->

@endsection

@push('script')

    <!-- Swiper JS -->
    <script type="module">
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'vertical',
            loop: true,

            speed: 1000,
            spaceBetween: 500,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
                dynamicMainBullets: 1,
            },

            autoplay:{
                delay: 4000,
                pauseOnMouseEnter: true,
                waitForTransition: true,
            },

        });
    </script>

@endpush