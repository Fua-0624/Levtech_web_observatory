<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('SNS登録') }}
            </h2>
        </x-slot>
        <div style="width:50%; margin: 0 auto; text-align:center;">
            <form action="/observatories/SNS" , method="POST">
            @csrf
            <div class="Form">
                <div class="Form-Item">
                    <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">必須</span>天文台</p>
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
                </div>
                <div class="Form-Item">
                    <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-NoRequired">任意</span>X(ツイッター)登録</p>
                    <textarea name="TwitterURL" placeholder="X(ツイッター)のURLを登録してください。登録しない場合は空白で大丈夫です。"></textarea>
                </div>
                <div class="Form-Item">
                    <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-NoRequired">任意</span>インスタグラム登録</p>
                    <textarea name="InstagramURL" placeholder="インスタグラムのURLを登録してください。登録しない場合は空白で大丈夫です。"></textarea>
                </div>
            </div>
                <input class="btn btn--radius" type="submit" value="送信">
             </form>
        </div>
        <div class="footer">
            <a class="btn btn--radius" href="/">HOME画面に戻る</a>
        </div>
</x-app-layout>