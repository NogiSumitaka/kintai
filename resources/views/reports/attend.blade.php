<x-app-layout>
    <form action="{{ route('attendance_stamp.save_report') }}" method="POST" class="flex flex-col">
        @csrf
        <h1>勤務状況</h1>
        <div>
            <input type="radio" name="style_id" value="1"/>リモート
            <input type="radio" name="style_id" value="2"/>出社
            <input type="radio" name="style_id" value="3"/>出張
        </div>
        <h1>勤務場所</h1>
        <div>
            <input type="radio" name="place_id" value="1"/>東京本社
            <input type="radio" name="place_id" value="2"/>千葉オフィス
            <input type="radio" name="place_id" value="3"/>自宅
            <input type="radio" name="place_id" value="4"/>出張先
        </div>
        <input type="submit" value="送信" class="px-2 py-2 border bg-white max-w-sm"/>
    </form>
</x-app-layout>