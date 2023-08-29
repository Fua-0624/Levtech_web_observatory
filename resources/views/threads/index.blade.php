<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $observatory->observatory }}のスレッド一覧
            </h2>
        </x-slot>
            <div class="SNS">
                @if( $observatory->TwitterURL != NULL)
                    <a class="SNS_child" href="{{ $observatory->TwitterURL }}"><font color="bule">X(ツイッター)はこちら</font></a>
                @else 
                    <p class="SNS_child">X(ツイッター)は未登録です</p>
                @endif
                @if( $observatory->InstagramURL != NULL)
                    <a class="SNS_child" href="{{ $observatory->InstagramURL }}"><font color="blue">インスタグラムはこちら</font></a>
                @else
                    <p class="SNS_child">インスタグラムは未登録です</p>
                @endif
            </div>
            
            <select name="input-select">
                <option value="asc">古い順</option>
                <option value="desc">新しい順</option>
            </select>
            <table class="table">
                <thead>
                    <tr>
                    <th>作成日</th>
                    <th>タイトル</th>
                    </tr>
                </thead>
                <tbody class="item">
                    @foreach($threads as $thread)
                    <tr class="item_child">
                        <td class="item_child_content">{{ $thread->updated_at }}</td>
                        <td><a href="/threads/{{ $thread->id }}"><font color="blue">{{ $thread->title }}</font></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="more-read-button">
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
