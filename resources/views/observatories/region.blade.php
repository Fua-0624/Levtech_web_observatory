<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>地方の天文台</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-rwdImageMaps/1.6/jquery.rwdImageMaps.min.js"></script>
    </head>
    
    <!--表示画面-->
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $region->region_name }}
            </h2>
        </x-slot>
        <body>
            <img src="{{ asset( $region->region_image )}}"  alt='北海道' class="map"/>
            <table class="table">
                <thead>
                    <tr>
                    <th>番号</th>
                    <th>県名</th>
                    <th>天文台名</th>
                    <th>宿泊施設</th>
                    <th>プラネタリウム</th>
                    <th>住所</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($observatories as $observatory)
                    <tr>
                    <td>{{ $observatory->id }}</td>
                    <td>{{ $observatory->prefecture }}</td>
                    <td><a href="{{ $observatory->HP_link }}">{{ $observatory->observatory }}</a></td>
                    <td>{{ $observatory->hotel }}</td>
                    <td>{{ $observatory->planetarium }}</td>
                    <td>〒{{ $observatory->address_number }}<br><a href="{{ $observatory->google_url }}">{{ $observatory->address }}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </body>
        
    </x-app-layout>
</html>