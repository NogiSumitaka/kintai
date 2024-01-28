<x-app-layout>
    @isset ($latestWorkingStatus->working_status)
    <div class="py-12">
        <div class="flex flex-col items-center max-w-7xl mx-auto sm:px-6 sm:rounded-lg lg:px-8 bg-white shadow-sm p-4">
            <a href="{{ route('attendance_stamp.attend_form') }}" class="px-6 py-2 m-3 bg-white border border-gray-400 hover:border-gray-800 hover:shadow text-2xl">出勤打刻</a>
            @if ($latestWorkingStatus->working_status == '休憩')
                <a href="{{ route('breaktime.breaktime_form') }}" class="px-6 py-2 m-3 bg-white border border-gray-400 hover:border-gray-800 hover:shadow text-2xl">休憩終了</a> 
            @else
                <a href="{{ route('breaktime.breaktime_form') }}" class="px-6 py-2 m-3 bg-white border border-gray-400 hover:border-gray-800 hover:shadow text-2xl">休憩開始</a> 
            @endif
            <a href="{{ route('closing_stamp.closing_form') }}" class="px-6 py-2 m-3 bg-white border border-gray-400 hover:border-gray-800 hover:shadow text-2xl">退勤打刻</a>
        </div>
        <div>
            <h1>現在の勤怠ステータス</h1>
            <p>{{ $latestWorkingStatus->working_status }}中</p>
        </div>
    </div>
    @endisset
    
    @empty ($latestWorkingStatus->working_status)
    <div class="py-12">
        <div class="flex flex-col items-center max-w-7xl mx-auto sm:px-6 sm:rounded-lg lg:px-8 bg-white shadow-sm">
            <a href="{{ route('attendance_stamp.attend_form') }}" class="px-6 py-2 m-3 bg-white border border-gray-400 hover:border-gray-800 hover:shadow text-2xl">出勤打刻</a>
            <a href="{{ route('breaktime.breaktime_form') }}" class="px-6 py-2 m-3 bg-white border border-gray-400 hover:border-gray-800 hover:shadow text-2xl">休憩開始</a>
            <a href="{{ route('closing_stamp.closing_form') }}" class="px-6 py-2 m-3 bg-white border border-gray-400 hover:border-gray-800 hover:shadow text-2xl">退勤打刻</a>
        </div>
    </div>
    @endempty
</x-app-layout>
