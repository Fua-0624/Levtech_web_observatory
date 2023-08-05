<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $observatory->observatory }}
            </h2>
        </x-slot>
            <table class="table">
                <thead>
                    <tr>
                    <th>作成日</th>
                    <th>コメント</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($threads as $thread)
                    <tr>
                    <td>{{ $thread->updated_at }}</td>
                    <td>{{ $thread->article }}</td>
                    <td><a href="/observatories/{{ $thread->id}}/edit" >編集</a></td>
                    <td><form action="/threads/{{ $thread->id }}" id="form_{{ $thread->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deleteThread({{ $thread->id }})">削除</button>
                        </form>
                    </td>
                    </tr>
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