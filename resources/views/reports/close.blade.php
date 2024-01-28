<x-app-layout>
    <div class="flex flex-col items-center p-4 mt-10 bg-white">
        <p class="text-xl">退勤しますか？</p>
        <form action="{{ route('closing_stamp.close') }}" method="POST" class="mt-10">
            @csrf
            <div class="flex items-center">
                <input type="submit" value="YES" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-8 rounded shadow">
                <a href="{{ route('dashboard')}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">NO</a>
            </div>
        </form>
    </div>
</x-app-layout>