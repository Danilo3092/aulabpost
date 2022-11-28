<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Aulab Post</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- <x-navbar /> --}}
    <x-navbar/>
    <x-header header="{{$header}}" />
    {{$slot}}
    <x-footer />


    
  
     {{-- Fontawsome --}}
     <script src="https://kit.fontawesome.com/5e9c555a84.js" crossorigin="anonymous"></script>
     <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

</body>
</html>