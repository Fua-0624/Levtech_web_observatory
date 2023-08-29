<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('スレッド作成') }}
            </h2>
    </x-slot>
        <div style="width:50%; margin: 0 auto; text-align:center;">
            <form action="/observatories/threads" , method="POST">
            @csrf
            <div class="Form">
                <div class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>天文台</p>
                    <select name="thread[observatory_id]">
                        @php
                            $regionid = -1 ;
                        @endphp
                        @foreach($observatories as $observatory)
                            @if( $observatory->region_id != $regionid)
                                <optgroup id="optgroup" label="{{ $observatory->region->region_name}}"></optgroup>
                            @endif
                                <option value="{{ $observatory->id }}">&ensp;&ensp;{{ $observatory->observatory }}</option>
                            @php
                                $regionid = $observatory->region_id;
                            @endphp
                            @endforeach
                    </select>
                </div>
            <div class="Form-Item">
                <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>スレッドタイトル</p>
                <input type="text" name="thread[title]" placeholder="タイトル">
            </div>
            <div class="Form-Item">
                <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>スレッド内容</p>
                <textarea name="thread[article]" placeholder="追加情報などを書いてください"></textarea>
            </div>
            <input class="btn btn--radius" type="submit" value="送信">
            </form>
        </div>
        <div class="footer">
            <a class="btn btn--radius" href="/">HOME画面に戻る</a>
        </div>
</x-app-layout>