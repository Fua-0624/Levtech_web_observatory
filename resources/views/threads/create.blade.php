<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('スレッド作成') }}
            </h2>
    </x-slot>
        <div style="width:90%; margin: 0 auto; text-align:center;">
            <form action="/observatories/threads/store" , method="POST">
            @csrf
            <div class="Form">
                <!--スレッド作成-->
                <div class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>天文台</p>
                    <select name="thread[observatory_id]">
                        @php
                            $regionid = -1 ;
                        @endphp
                        @foreach($observatories as $observatory)
                            @if( $observatory->region_id != $regionid)
                                <optgroup id="optgroup" label="{{ $observatory->region->region_name}}"></optgroup>
                            @endif
                                <option value="{{ $observatory->id }}">&ensp;&ensp;{{ $observatory->observatory }}</option>
                            @php
                                $regionid = $observatory->region_id;
                            @endphp
                        @endforeach
                    </select>
                    <p class="observatory_error" style="color:red">{{ $errors->first('thread.observatory_id') }}</p>
                </div>
                <div class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>スレッドタイトル</p>
                    <input type="text" name="thread[title]" placeholder="タイトル" value="{{ old('thread.title') }}">
                    <p class="title_error" style="color:red">{{ $errors->first('thread.title') }}</p>
                </div>
                <div class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>スレッド内容</p>
                    <textarea name="thread[article]" placeholder="追加情報などを書いてください">{{ old('thread.article')}}</textarea>
                    <p class="article_error" style="color:red">{{ $errors->first('thread.article') }}</p>
                </div>
                <!--イベント登録-->
                <div class="Form-Item">
                    <select name="thread[event]">
                        <option value="No">イベント登録しない</option>
                        <option value="Yes">イベント登録する</option>
                    </select>
                </div>
                <div class="Form-Item">
                    <label for="start_date">開始日時</label>
                    <input class="input-date" type="date" id="start_date" name="start_date" value="" />
                    <label for="end_date">終了日時</label>
                    <input class="input-date" type="date" id="end_date" name="end_date" value="" />
                </div>
                <div class="Form-Item">
                    <label for="event_color">カレンダーに表示する背景色</label>
                    <select id="event_color" name="event_color">
                        <option value="blue">青</option>
                        <option value="green">緑</option>
                    </select>
                </div>
                <input class="btn btn--radius" type="submit" value="送信">
            </form>
            </div>
        <div>
            <a href="/">HOME画面に戻る</a>
        </div>
</x-app-layout>
<script>
    window.addEventListener('DOMContentLoaded', () => {
    if([thread[event]].isSelected()){
        date = document.querySelectorAll('.date');
        console.log(date);
        date.classList.remove('hidden')
    }
    else{
        date = document.querySelectorAll('.date');
        date.classList.add('hidden')
    }
    });
</script>