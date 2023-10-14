<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('スレッド一覧')}}
        </h2>
    </x-slot>
        <div class="order">
            <select name="input-select">
                <option value="asc">古い順</option>
                <option value="desc">新しい順</option>
            </select>
        </div>
        <div class="kakomi">
            <span class="title">スレッド</span>
            <div class="item">
                @foreach($threads as $thread)
                    <div class="item_child">
                        <p class="td" ><span class="font-semibold">{{ $thread->observatory->observatory }}</span>&nbsp;&nbsp;&nbsp;<span class="item_child_content td">作成日:{{ $thread->updated_at }}</span></p>
                        <a href="/threads/{{ $thread->id }}" class="td text-lg"><font color="blue">{{ $thread->title }}</font></a>
                        </br>
                    </div>
                @endforeach
            </div>
            <button id="moreRead" class="more-read btn btn--radius">もっと見る</button>
        </div>
</x-app-layouts>
<script type="text/javascript">var add = @json(count($threads))</script>
<script type="text/javascript" src="{{ asset('/js/Threadindex.js') }}"></script>