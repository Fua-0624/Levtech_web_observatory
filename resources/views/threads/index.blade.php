<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $observatory->observatory }}のスレッド一覧
            </h2>
        </x-slot>
            <select name="order-select">
                <option>新しい順</option>
                <option>古い順</option>
            </select>
            <table class="table">
                <thead>
                    <tr>
                    <th>作成日</th>
                    <th>タイトル</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($threads as $thread)
                    <tr class="item">
                        <td>{{ $thread->updated_at }}</td>
                        <td><a href="/threads/{{ $thread->id }}">{{ $thread->title }}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="more-read-button">
                <button id="moreRead" class="more-read">もっと見る</button>
            </div>
</x-app-layout>

<script type="text/javascript">var add = @json(count($threads))</script>
<script type="text/javascript">var data = @json($threads)</script>
<script type="text/javascript" src="{{ asset('/js/Threadindex.js') }}"></script>
