<head>
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet">
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('HOME') }}
        </h2>
    </x-slot>
    <h2 class="text-lg font-semibold" style="text-align:center;">ようこそおいでくださいました！</h2>
    <h2 class="text-lg font-semibold" style="text-align:center;">HOME画面では口径が100cm以上の望遠鏡を持つ天文台が載ってます♪</h2>
    <div class="kakomi-tape">
	   <span class="title-tape">このページの使い方</span>
	   <p>・星にカーソルを合わせてみて！天文台の情報が見れるよ！</p>
	   <p>・星をクリックしてみて！天文台のHPに飛べるよ！</p>
	</div>
        <div class="map">
            <img src="{{ asset('/css/image/Japan.PNG') }}" usemap="#Japan" alt="日本地図" class="map"/>
            <map name="Japan">
                @foreach($observatories as $key => $observatory)
                 <area shape="circle" coords="{{ $observatory->Coordinate }}" href="{{ $observatory->HP_link}}" class="observatory" onmouseover="showTooltip({{ $key }})"/>
                @endforeach
            </map>
            <div class="tooltip" id="tooltip">
                <p id="title" class="text-lg font-semibold"></p>
                <table class="pop_up">
                    <tr><td>宿泊施設</td><td><span class="font-medium" id="hotel"></span></td></tr>
                    <tr><td>プラネタリウム</td><td><span class="font-medium" id="planetarium"></span></td></tr>
                    <tr><td>住所</td><td>〒<span class="font-medium" id="address_number"></span></td></tr>
                    <tr><td></td><td><span class="font-medium" id="address"></span></td></tr>
                </table>
            </div>
	    </div>
	    
	    <div class="kokuban">
            <span class="title-t2">イベント情報</span>
            @foreach($threads as $thread)
                <p>
                    <span class="font-semibold">{{ $thread->observatory->observatory }}</span>&nbsp;&nbsp;&nbsp;
                    <a href="/threads/{{ $thread->id }}">{{ $thread->event_day }}&nbsp;&nbsp;&nbsp;{{ $thread->title}}</a>
                </p>
            @endforeach
        </div>
	    

            
    　　<!--JavaScript-->
        <script>
            //ポップアップ機能
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
