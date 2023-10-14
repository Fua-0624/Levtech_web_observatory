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
            @auth
                <span class="title-t2">{{ $thread->observatory->observatory}}</span>
                <p>{{ $thread->updated_at}}&nbsp;&nbsp;&nbsp;<span class="text-lg">{{ $thread->article }}</span></p>
                @if(Auth::user()->id == $thread->user_id)
                    <a class="btn btn--radius" href="/threads/{{ $thread->id}}/edit">編集</a>
                    <form action="/threads/{{ $thread->id }}" id="form_{{ $thread->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn--radius" type="button" onclick="deleteThread({{ $thread->id }})">削除</button>
                    </form>
                @endif
            @else
            <h2><span class="title-t2">{{ $thread->observatory->observatory }}</span>{{ $thread->updated_at }}</h2>
            <p><span class="text-lg">{{ $thread->article }}</span></p>
            @endauth
        </div>
        <div class="a_button">
            <a href="/observatories/{{ $thread->observatory->id }}/threads">{{ $thread->observatory->observatory }}のスレッド一覧はこちら</a>
        </div>
        
        
        
        <!--コメント内容表示-->
        <div class="kakomi">
            <span class="title">コメント</span>
                @foreach($comments as $comment)
                    <p>作成日:{{ $comment->updated_at }}</p>
                    <h2 class="text-lg">{{ $comment->article }}</h2>
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