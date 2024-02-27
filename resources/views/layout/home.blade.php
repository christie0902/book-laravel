<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite('resources/css/style.scss')
    
</head>
<body>
    <nav>
        {{-- <a href="/" class="{{ $current_url == "/" ? "some_class" : ''}}">Home</a> --}}
        <a href="#">Home</a>
        <a href="#">About</a>
    </nav>

{{-- Where react will redener --}}
<div id="partners"></div> 
{{-- the marker --}}
@viteReactRefresh
@vite('resources/js/partners.jsx')    

<ul id="latest-books"></ul>
@vite('resources/js/latest-book.js')

    @yield('main-content')
    @yield('footer')
</body>
</html>