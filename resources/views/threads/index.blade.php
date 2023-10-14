<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $observatory->observatory }}のスレッド一覧
            </h2>
        </x-slot>
            <div class="SNS">
                @if( $observatory->TwitterURL != NULL)
                    <a class="SNS_child" href="{{ $observatory->TwitterURL }}"><font color="bule">X(ツイッター)はこちら</font></a>
                    <a class="SNS_child btn btn--radius" href="/observatories/{{ $observatory->id }}/x/edit">X(ツイッター)URL編集</a>
                @else 
                    <p class="SNS_child">X(ツイッター)は未登録です</p>
                @endif
                @if( $observatory->InstagramURL != NULL)
                    <a class="SNS_child" href="{{ $observatory->InstagramURL }}"><font color="blue">インスタグラムはこちら</font></a>
                    <a class="SNS_child btn btn--radius" href="/observatories/{{ $observatory->id }}/instagram/edit">インスタグラムURL編集</a>
                @else
                    <p class="SNS_child">インスタグラムは未登録です</p>
                @endif
            </div>
            
            <select name="input-select">
                <option value="asc">古い順</option>
                <option value="desc">新しい順</option>
            </select>
            <div class="kakomi">
                <span class="title">スレッド</span>
                <div class="item">
                    @foreach($threads as $thread)
                    <div class="item_child">
                        <p class="item_child_content td">作成日:{{ $thread->updated_at }}</p>
                        <a href="/threads/{{ $thread->id }}" class="td text-lg"><font color="blue">{{ $thread->title }}</font></a>
                        </br>
                    </div>
                    @endforeach
                </div>
                <button id="moreRead" class="more-read btn btn--radius">もっと見る</button>
            </div>


</x-app-layout>

<!--JavaScript-->
<script>
    function deleteSNS(id){
        'use strict'
            
        if(confirm('削除すると復元できません。\n本当に削除しますか?')){
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
<script type="text/javascript">var add = @json(count($threads))</script>
<script type="text/javascript" src="{{ asset('/js/Threadindex.js') }}"></script>
