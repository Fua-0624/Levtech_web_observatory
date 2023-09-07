<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('SNSのURL編集') }}
            </h2>
        </x-slot>
             <form action="/observatories/{{ $observatory->id }}" , method="POST">
                @csrf
                @method('PUT')
                <h2>{{ $observatory->observatory }}</h2>
                <div class="body">
                    <h2>X(ツイッター)URL</h2>
                    <textarea name="TwitterURL" value="{{ $observatory->TwitterURL }}">{{ $observatory->TwitterURL }}</textarea>
                    <h2>インスタグラムURL</h2>
                    <textarea name="InstagramURL" value="{{ $observatory->InstagramURL }}">{{ $observatory->InstagramURL }}</textarea>
                </div>
                <input class="btn btn--radius" type="submit" value="変更を保存">
             </form>
             <div class="footer">
                 <a class="btn btn--radius" href="/">HOME画面に戻る</a>
             </div>
</x-app-layout>