  <x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('コメント作成') }}
            </h2>
        </x-slot>
             <form action="/observatories/threads" , method="POST">
                @csrf
                <h2>天文台名</h2>
                <select name="thread[observatory_id]">
                    @foreach($observatories as $observatory)
                    <option value="{{ $observatory->id }}">{{ $observatory->observatory }}</option>
                    @endforeach
                </select>
                <div class="body">
                    <h2>コメント</h2>
                    <textarea name="thread[article]" placeholder="追加情報などを書いてください"></textarea>
                </div>
                <input type="submit" value="送信">
             </form>
             <div class="footer">
                 <a href="/">HOME画面に戻る</a>
             </div>
</x-app-layout>