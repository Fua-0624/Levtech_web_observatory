<head>
    <link href="{{ asset('/css/thread/detail') }}" rel="stylesheet">
</head>
<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $thread->title }}
            </h2>
        </x-slot>
        <!--スレッド内容表示-->
            <p class="text-sm">{{ $thread->updated_at}}</p>
            <p class="text-lg">{{ $thread->article }}</p>
            <div class="flex flex-row-reverse space-x-10 space-x-reverse">
                <div><a href="/observatories/{{ $thread->id}}/edit" >編集</a></div>
                <div><form action="/threads/{{ $thread->id }}" id="form_{{ $thread->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteThread({{ $thread->id }})">削除</button>
                    </form>
                </div>
            </div>
            
        <!--コメント内容表示-->
            <div class="flex flex-row-reverse space-x-4 space-x-reverse">
                <div><p class="text-lg">コメント</p></div>
                <div><a href="/threads/{{ $thread->id }}/comments/create">コメント作成</a></div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th>作成日</th>
                    <th>コメント</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                    <tr>
                    <td>{{ $comment->updated_at }}</td>
                    <td>{{ $comment->article }}</td>
                    @endforeach
                </tbody>
            </table> 
    
    <script>
        function deleteThread(id){
            'use strict'
            
            if(confirm('削除すると復元できません。\n本当に削除しますか?')){
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>