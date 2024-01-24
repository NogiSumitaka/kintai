<x-app-layout>
    <div class="py-12">
        <div class="flex flex-col items-center max-w-7xl mx-auto sm:px-6 sm:rounded-lg lg:px-8 bg-white shadow-sm">
            <a href="{{ route('attendance_stamp.attend_form') }}" class="px-6 py-2 m-3 bg-white border border-gray-400">出勤打刻</a>
            <a href="{{ route('breaktime.breaktime_form') }}" class="px-6 py-2 m-3 bg-white border border-gray-400">休憩開始</a>
            <a href="{{ route('closing_stamp.closing_form') }}" class="px-6 py-2 m-3 bg-white border border-gray-400">退勤打刻</a>
            <a href="/paid_holiday_regstration" class="px-6 py-2 m-3 bg-white border border-gray-400">有休登録</a>
        </div>
        <div>
            <h1>現在の勤怠ステータス</h1>
            <p>{{ $latestWorkingStatus->working_status }}中</p>
        </div>
    </div>
</x-app-layout>
