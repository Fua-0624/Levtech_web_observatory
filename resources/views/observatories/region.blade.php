<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $region->region_name }}
        </h2>
    </x-slot>
    <div class="map"> 
        <img src="{{ asset( $region->region_image )}}" class="map"/>
    </div>
    <div class="kakomi-tape">
        <span class="title-tape">このページの使い方</span>
        <p style="text-align:center;">・<span class="font-semibold text-red-600 text-lg">天文台名</span>を<span class="font-semibold">クリック</span>すると<span class="font-semibold text-red-600">天文台のHP</span>に飛ぶことができます</p>
        <p style="text-align:center;">・<span class="font-semibold text-green-600 text-lg">住所</span>を<span class="font-semibold">クリック</span>すると天文台の場所を示した<span class="font-semibold text-green-600">googlemap</span>に飛ぶことができます</p>
        <p style="text-align:center;">・<span class="font-semibold text-blue-600 text-lg">スレッドの「あり」</span>を<span class="font-semibold">クリック</span>すると<span class="font-semibold text-blue-600">スレッド一覧</span>に飛ぶことができます</p>
    </div>    
        <table class="table">
            <thead>
                <tr>
                <th>番号</th>
                <th>県名</th>
                <th>天文台名</th>
                <th>宿泊施設</th>
                <th>プラネタリウム</th>
                <th>住所</th>
                <th>スレッド</th>
                </tr>
            </thead>
            <tbody>
                @foreach($observatories as $observatory)
                <tr>
                <td>{{ $observatory->id }}</td>
                <td>{{ $observatory->prefecture }}</td>
                <td><a href="{{ $observatory->HP_link }}"><font color="blue">{{ $observatory->observatory }}</font></a></td>
                <td>{{ $observatory->hotel }}</td>
                <td>{{ $observatory->planetarium }}</td>
                <td>〒{{ $observatory->address_number }}<br><a href="{{ $observatory->google_url }}"><font color="blue">{{ $observatory->address }}</font></a></td>
                <td>@if( $observatory->threads->count() != 0 )
                    <a href="/observatories/{{ $observatory->id }}/threads" class="font-semibold"><font color="blue">あり</font></a>
                    @else
                    <p>なし</p>
                    @endif
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</x-app-layout>