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
                    <th>タイトル</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($threads as $thread)
                    <tr>
                    <td>{{ $thread->updated_at }}</td>
                    <td><a href="/threads/{{ $thread->id }}">{{ $thread->title }}</a></td>
                    @endforeach
                </tbody>
            </table> 
</x-app-layout>