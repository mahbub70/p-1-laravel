<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? "Home" }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="app">
        <div class="content overflow-hidden">

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

    @vite(['resources/js/project/script.js'])

    @stack('script')

</body>
</html>