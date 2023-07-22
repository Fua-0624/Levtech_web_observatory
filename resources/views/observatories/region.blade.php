<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>地方の天文台</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/balloon.css/balloon.min.css')}}"　rel="stylesheet">
        <link rel="stylesheet" href="path/to/balloon.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-rwdImageMaps/1.6/jquery.rwdImageMaps.min.js"></script>
    </head>
    
    <!--表示画面-->
    <x-app-layout>
        <x-slot>
            <select name = "observatory[region_id]" class="font-semibold text-xl text-gray-800 leading-tight">
                @foreach($regions as $region)
                <option value = {{ $region_id}}>{{ $regions->region_name }}</option>
                @endforeach
            </select>
        </x-slot>
        <body>
            <img src="{{ asset({{ $observatories->region_region}}) }}" usemap="#Japan" alt="日本地図" class="map"/>
        </body>
        
    </x-app-layout>
</html>