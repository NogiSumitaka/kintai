<x-app-layout>
    <div class="flex flex-col items-center">
        <p class="text-xl my-12">～～休憩中～～</p>
        <form action="{{ route('breaktime.report_end') }}" method="POST">
            @csrf
            <div class="">
                <input type="submit" value="休憩終了" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
            </div>
        </form>
    </div>
</x-app-layout>