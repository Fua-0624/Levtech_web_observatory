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
                <th>コメント</th>
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