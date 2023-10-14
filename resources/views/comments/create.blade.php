  <x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $thread->title }}
            </h2>
        </x-slot>
        <div style="width:50%; margin: 0 auto; text-align:center;">
            <form action="/threads/comments" , method="POST">
                @csrf
                <div class="Form">
                    <div class="Form-Item">
                        <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">必須</span>コメント内容</p>
                        <input type="hidden" name="comment[thread_id]" value="{{ $thread->id }}">
                        <textarea name="comment[article]" placeholder="コメントを書いてください">{{ old('comment.article') }}</textarea>
                        <p class="article_error" style="color:red">{{ $errors->first('comment.article') }}</p>
                    </div>
                </div>    
                <input class="btn btn--radius" type="submit" value="送信">
            </form>
        <div>
            <div class="footer">
                <a class="btn btn--radius" href="/">HOME画面に戻る</a>
            </div>
</x-app-layout>