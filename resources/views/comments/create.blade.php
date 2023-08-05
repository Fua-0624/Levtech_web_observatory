  <x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $thread->title }}
            </h2>
        </x-slot>
        <form action="/threads/comments" , method="POST">
            @csrf
            <div class="body">
                <input type="hidden" name="comment[thread_id]" value="{{ $thread->id }}">
                <h2>コメント</h2>
                    <textarea name="comment[article]" placeholder="コメントを書いてください"></textarea>
            </div>    
            <input type="submit" value="送信">
        </form>
            <div class="footer">
                <a href="/">HOME画面に戻る</a>
            </div>
</x-app-layout>