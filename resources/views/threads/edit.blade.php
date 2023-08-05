<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('スレッド編集') }}
            </h2>
        </x-slot>
             <form action="/threads/{{ $thread->id }}" , method="POST">
                @csrf
                @method('PUT')
                <h2>{{ $thread->observatory->observatory }}</h2>
                <div class="body">
                    <h2>スレッド内容</h2>
                    <input type='text' name="thread[article]" value="{{ $thread->article }}">
                </div>
                <input type="submit" value="変更を保存">
             </form>
             <div class="footer">
                 <a href="/">HOME画面に戻る</a>
             </div>
</x-app-layout>