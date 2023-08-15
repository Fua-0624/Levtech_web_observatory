<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('スレッド作成') }}
            </h2>
        </x-slot>
             <form action="/observatories/threads" , method="POST">
                @csrf
                <h2>天文台名</h2>
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
                <div class="body">
                    <h2>タイトル</h2>
                    <input type="text" name="thread[title]" placeholder="タイトル">
                    <h2>コメント</h2>
                    <textarea name="thread[article]" placeholder="追加情報などを書いてください"></textarea>
                </div>
                <input class="btn btn--radius" type="submit" value="送信">
             </form>
             <div class="footer">
                 <a class="btn btn--radius" href="/">HOME画面に戻る</a>
             </div>
</x-app-layout>