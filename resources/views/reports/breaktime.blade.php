<x-app-layout>
    <div>
        <p class="text-xl my-12">休憩を開始しますか？</p>
        <form action="{{ route('breaktime.start') }}" method="POST">
            @csrf
            <div class="flex items-center">
                <input type="submit" value="YES">
                <a href="{{ route('dashboard')}}" class="px-6 py-2 m-3 bg-white border border-gray-400">NO</a>
            </div>
        </form>
    </div>
</x-app-layout>