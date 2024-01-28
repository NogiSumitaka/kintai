<x-app-layout>
    <div class="flex flex-col items-center mt-10">
        <h1 class="text-xl">{{ $latest_working_status }}済みです</h1>
        <a href="{{ route('dashboard') }}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 mt-10 border border-gray-400 rounded shadow">戻る</a>
    </div>
</x-app-layout>