<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('SNS登録') }}
            </h2>
        </x-slot>
             <form action="/observatories/SNS" , method="POST">
                @csrf
                <h2>天文台名</h2>
                <select name="observatory_id">
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
                    <h2>X(ツイッター)URL登録</h2>
                    <textarea name="TwitterURL" placeholder="X(ツイッター)のURLを登録してください。登録しない場合は空白で大丈夫です。"></textarea>
                    <h2>インスタグラムURL登録</h2>
                    <textarea name="InstagramURL" placeholder="インスタグラムのURLを登録してください。登録しない場合は空白で大丈夫です。"></textarea>
                </div>
                <input type="submit" value="送信">
             </form>
             <div class="footer">
                 <a href="/">HOME画面に戻る</a>
             </div>
</x-app-layout>