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
                    @forEach($observatories as $observatory)
                    <area shape="circle" coords="{{ $observatory->Coordinate }}" href="{{ $observatory->HP_link}}" class="observatory" onmouseover="showTooltip(1)"/>
                    @endforEach
                </map>
                <div class="tooltip" id="tooltip">
                    <h2 id="title"></h2>
                    <p>宿泊施設:<span id="hotel"></span></p>
                    <p>プラネタリウム:<span id="planetarium"></span></p>
                    <p>住所:</p>
                    <p>〒<span id="address_number"></span></p>
                    <p><span id="address"></span></p>
                </div>
	        </div>
            
    　　<!--JavaScript-->
            <script>
                $('img[usemap]').rwdImageMaps();
                function showTooltip(area) {
                    const tooltip = document.getElementById('tooltip');
                    const title = document.getElementById('title');
                    const hotel = document.getElementById('hotel');
                    const planetarium = document.getElementById('planetarium');
                    const address_number = document.getElementById('address_number');
                    const address = document.getElementById('address');
                    if (area === 1 ){
                        title.textContent = "なよろ市立天文台きたすばる";
                        hotel.textContent = "×";
                        planetarium.textContent = "○";
                        address_number.textContent = "123－456";
                        address.textContent = "名寄市";
                    }
                    tooltip.style.display = 'block';
                    tooltip.style.left = event.pageX + 'px';
                    tooltip.style.top = event.pageY + 'px';
                }

                function hideTooltip() {
                    const tooltip = document.getElementById('tooltip');
                    tooltip.style.display = 'none';
                }

                const observatories = document.querySelectorAll('area');
                observatories.forEach(area => {
                area.addEventListener('mouseout', hideTooltip);
                });
            </script>
            
         </body>
    </x-app-layout>


</html>