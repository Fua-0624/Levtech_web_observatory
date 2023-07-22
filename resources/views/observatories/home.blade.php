<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>全国の天文台</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/balloon.css/balloon.min.css')}}">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-rwdImageMaps/1.6/jquery.rwdImageMaps.min.js"></script>
    </head>
    
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('HOME') }}
            </h2>
         </x-slot>
    <!--表示画面-->     
         <body>
             <div>
                <img src="{{ asset('/css/image/Japan.PNG') }}" usemap="#Japan" alt="日本地図" class="map"/>
                <map name="Japan">
                    <area shape="circle" coords="1356,312,13" href="https://www.nayoro-star.jp/kitasubaru/" class="observatory"/>
                    <area shape="circle" coords="1449,371,12" href="https://www.rikubetsu.jp/tenmon/"/>
                    <area shape="circle" coords="1218,999,12" href="https://www.sendai-astro.jp/"/>
                    <area shape="circle" coords="1049,1206,13" href="https://www.astron.pref.gunma.jp/"/>
                    <area shape="circle" coords="939,1303,12" href="https://www.kyoto-su.ac.jp/observatory/"/>
                    <area shape="circle" coords="734,1383,13" href="http://www.ioa.s.u-tokyo.ac.jp/kisohp/"/>
                    <area shape="circle" coords="617,1388,15" href="http://www.nhao.jp/"/>
                    <area shape="circle" coords="707,1492,11" href="http://www.obs.jp/"/>
                    <area shape="circle" coords="695,1521,10" href="https://hidakagawa-kanko.jp/tomaru/tenmonkouen/"/>
                    <area shape="circle" coords="587,1346,12" href="https://www.city.tottori.lg.jp/www/contents/1425466200201/"/>
                    <area shape="circle" coords="531,1413,9" href="https://www.bao.city.ibara.okayama.jp/"/>
                    <area shape="circle" coords="543,1430,13" href="http://www.oao.nao.ac.jp/"/>
                    <area shape="circle" coords="634,1516,12" href="http://ananscience.jp/science/"/>
                    <area shape="circle" coords="242,1573,9" href="https://www.hoshinofurusato.jp/constellation/"/>
                    <area shape="circle" coords="1187,1900,11" href="https://murikabushi.jp/"/>
                </map>
	        </div>
            
        <!--JavaScript-->
            <script>
                $('img[usemap]').rwdImageMaps();
            </script>
         </body>
    </x-app-layout>


</html>