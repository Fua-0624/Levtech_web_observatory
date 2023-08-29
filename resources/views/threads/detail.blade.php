<head>
    <link href="{{ asset('/css/thread/detail.css') }}" rel="stylesheet">
</head>

<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                スレッドタイトル：{{ $thread->title }}
            </h2>
        </x-slot>
        <!--スレッド内容表示-->
        <div class="kokuban">
            <span class="title-t2">スレッド</span>
            <p><span class="text-sm">{{ $thread->updated_at}}</span>&nbsp;&nbsp;&nbsp;{{ $thread->article }}&nbsp;&nbsp;&nbsp;<a class="btn btn--radius" href="/threads/{{ $thread->id}}/edit">編集</a></p>
            <form action="/threads/{{ $thread->id }}" id="form_{{ $thread->id }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn--radius" type="button" onclick="deleteThread({{ $thread->id }})">削除</button>
            </form>
        </div>
        <a class="btn btn--radius" href="/observatories/{{ $thread->observatory->id }}/threads">スレッド一覧はこちら</a>
        
        
        <!--コメント内容表示-->
        <div class="kakomi">
            <span class="title">コメント</span>
                @foreach($comments as $comment)
                    <p class="text-xs">作成日:{{ $comment->updated_at }}</p>
                    <h2>{{ $comment->article }}</h2>
                    </br>
                @endforeach
                <button id="moreRead" class="more-read btn btn--radius">もっと見る</button>
                <a class="btn btn--radius" href="/threads/{{ $thread->id }}/comments/create">コメント作成はこちら</a> 
        </div>
               
    <!--JavaScript-->
    <script>
        function deleteThread(id){
            'use strict'
            
            if(confirm('削除すると復元できません。\n本当に削除しますか?')){
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
    <script type="text/javascript">var add = @json(count($comments))</script>
    <script type="text/javascript" src="{{ asset('/js/Threadindex.js') }}"></script>
</x-app-layout>