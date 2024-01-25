<x-app-layout>
    <div class="flex flex-col items-center">
        <h1>{{ $latestWorkingStatus }}済みです</h1>
        <a href="{{ route('dashboard') }}" class="px-6 py-2 m-3 bg-white border border-gray-400">戻る</a>
    </div>
</x-app-layout>