<head>
    <link href="{{ asset('/css/sitemap.css') }}" rel="stylesheet">
</head>
<x-app-layout>
    <x-slot name="header">
        {{ __('サイトマップ') }}
    </x-slot>
        <a href="/"><h1>HOME</h1></a>
        &nbsp;&nbsp;<p>100cm以上の望遠鏡を持つ天文台を一覧できます</p></br>
        
        <h1>地域画面</h2>
        <p>各地域にある、50cm以上の望遠鏡を持つ天文台を一覧できます</p>
        @foreach($regions as $region)
            &nbsp;&nbsp;&nbsp;<a href="/regions/{{ $region->id }}">{{ $region->region_name }}</a>&nbsp;&nbsp;
        @endforeach
        </br></br>
        
        <a href="/threads"><h1>スレッド作成</h1></a>
        &nbsp;&nbsp;<p>各天文台について、気になる話題を話しましょう！</p></br>
        
        <a href="/observatories/threads/list"><h1>スレッド一覧</h1></a>
        &nbsp;&nbsp;<p>みんなの建てたスレッドを見てみましょう！</p>
</x-app-layout>