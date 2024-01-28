<x-app-layout>
    <div class="flex justify-center">
        <form action="{{ route('attendance_stamp.save_report') }}" method="POST" class="flex flex-col items-center p-4 mt-10 w-screen rounded-lg bg-white">
            @csrf
            <h1 class="text-xl font-semibold underline">勤務状況</h1>
            <div class="flex justify-center mt-2">
                <input type="radio" name="style_id" value="1" class="ml-2"/>リモート
                <input type="radio" name="style_id" value="2" class="ml-2"/>出社
                <input type="radio" name="style_id" value="3" class="ml-2"/>出張
            </div>
            <h1 class="text-xl font-semibold underline mt-5">勤務場所</h1>
            <div class="flex justify-center mt-2">
                <input type="radio" name="place_id" value="1" class="ml-2"/>東京本社
                <input type="radio" name="place_id" value="2" class="ml-2"/>千葉オフィス
                <input type="radio" name="place_id" value="3" class="ml-2"/>自宅
                <input type="radio" name="place_id" value="4"/>出張先
            </div>
            <input type="submit" value="出勤打刻" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-10 rounded shadow"/>
        </form>
    </div>
</x-app-layout>