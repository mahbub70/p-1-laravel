<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project One</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="app">
        <div class="content">

            <!-- App Top Mini Header START -->
            @include('website.partials.top-header')
            <!-- App Top Mini Header END -->

            <!-- App Primary Header START -->
            @include('website.partials.primary-header')
            <!-- App Primary Header END -->

            @yield('content')

            <!-- Footer Section START -->
            @include('website.partials.footer')
            <!-- Footer Section END -->

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    @stack('script')

</body>
</html>