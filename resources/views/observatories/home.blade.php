<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('HOME') }}
        </h2>
    </x-slot>
        <div>
            <img src="{{ asset('/css/image/Japan.PNG') }}" usemap="#Japan" alt="日本地図" class="map"/>
            <map name="Japan">
                @foreach($observatories as $key => $observatory)
                 <area shape="circle" coords="{{ $observatory->Coordinate }}" href="{{ $observatory->HP_link}}" class="observatory" onmouseover="showTooltip({{ $key }})"/>
                @endforeach
            </map>
            <div class="tooltip" id="tooltip">
                <p id="title" class="text-lg font-semibold"></p>
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
                const data = @json($observatories);
                const tooltip = document.getElementById('tooltip');
                const title = document.getElementById('title');
                const hotel = document.getElementById('hotel');
                const planetarium = document.getElementById('planetarium');
                const address_number = document.getElementById('address_number');
                const address = document.getElementById('address');
                if (isFinite(area)){
                    title.textContent = data[area].observatory;
                    hotel.textContent = data[area].hotel;
                    planetarium.textContent = data[area].planetarium;
                    address_number.textContent = data[area].address_number;
                    address.textContent = data[area].address;
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
</x-app-layout>
