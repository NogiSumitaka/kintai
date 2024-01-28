<x-app-layout>
    <!-- 勤務中社員一覧 -->
    <div class="flex flex-col items-center mb-10">
        <h1 class="text-xl">勤務中</h1>
        <div class="flex justify-center border border-gray-800 divide-x divide-gray-800 bg-white p-2 w-full">
            <p class="flex-1 text-center underline">社員名</p>
            <p class="flex-1 text-center underline">打刻時間</p>
            <p class="flex-1 text-center underline">勤務形態</p>
            <p class="flex-1 text-center underline">勤務場所</p>
            <p class="flex-1 text-center underline">勤怠データ</p>
        </div>
    @foreach ( $attend_users as $user )
        @php
            $work_time = $user->times()->orderBy('created_at', 'DESC')->first();
            $timestamp = $work_time->created_at->format('H:i');
        @endphp
        <div class="flex justify-center divide-x divide-gray-800 bg-white p-2 mt-2 rounded-lg w-full outline outline-2 {{ $user->style_id == 1 ? 'outline-blue-500' : ($user->style_id == 2 ? 'outline-green-500' : 'outline-red-500') }}">
            <div class="flex-1 text-center">{{ $user->name }}</div>
            <div class="flex-1 text-center">{{ $timestamp }}</div>
            <div class="flex-1 text-center">{{ $user->style->name }}</div>
            <div class="flex-1 text-center">{{ $user->place->name }}</div>
            <div class="flex-1 text-center"><a href="/manegement/employees/{{ $user->id }}" class="px-4 py-1 rounded-full bg-sky-300 hover:bg-sky-600 text-white">詳細</a></div>
        </div>
    @endforeach
    </div>
    
        <!-- 休憩中社員一覧 -->
    <div class="flex flex-col items-center mb-10">
        <h1 class="text-xl">休憩中</h1>
        <div class="flex justify-center border border-gray-800 divide-x divide-gray-800 bg-white p-2 w-full">
            <p class="flex-1 text-center underline">社員名</p>
            <p class="flex-1 text-center underline">打刻時間</p>
            <p class="flex-1 text-center underline">勤務形態</p>
            <p class="flex-1 text-center underline">勤務場所</p>
            <p class="flex-1 text-center underline">勤怠データ</p>
        </div>
    @foreach ( $break_users as $user )
        <div class="flex justify-center divide-x divide-gray-800 bg-white p-2 mt-2 rounded-lg w-full outline outline-2 outline-gray-400">
            <div class="flex-1 text-center">{{ $user->name }}</div>
            @php
                $work_time = $user->times()->orderBy('created_at', 'DESC')->first();
                $timestamp = $work_time->created_at->format('H:i');
            @endphp
            <div class="flex-1 text-center">{{ $timestamp }}</div>
            <div class="flex-1 text-center">{{ $user->style->name }}</div>
            <div class="flex-1 text-center">{{ $user->place->name }}</div>
            <div class="flex-1 text-center"><a href="/manegement/employees/{{ $user->id }}" class="px-4 py-1 rounded-full bg-sky-300 hover:bg-sky-600 text-white">詳細</a></div>
        </div>
    @endforeach
    </div>
    
    <!-- 退勤中社員一覧 -->
    <div class="flex flex-col items-center mb-10">
        <h1 class="text-xl">退勤中</h1>
        <div class="flex justify-center border border-gray-800 divide-x divide-gray-800 bg-white p-2 w-full">
            <p class="flex-1 text-center underline">社員名</p>
            <p class="flex-1 text-center underline">打刻時間</p>
            <p class="flex-1 text-center underline">勤務形態</p>
            <p class="flex-1 text-center underline">勤務場所</p>
            <p class="flex-1 text-center underline">勤怠データ</p>
        </div>
    @foreach ( $close_users as $user )
        <div class="flex justify-center divide-x divide-gray-800 bg-white p-2 mt-2 rounded-lg w-full">
            <div class="flex-1 text-center">{{ $user->name }}</div>
            @php
                $work_time = $user->times()->orderBy('created_at', 'DESC')->first();
                $timestamp = $work_time->created_at->format('H:i');
            @endphp
            <div class="flex-1 text-center">{{ $timestamp }}</div>
            <div class="flex-1 text-center">{{ $user->style->name }}</div>
            <div class="flex-1 text-center">{{ $user->place->name }}</div>
            <div class="flex-1 text-center"><a href="/manegement/employees/{{ $user->id }}" class="px-4 py-1 rounded-full bg-sky-300 hover:bg-sky-600 text-white">詳細</a></div>
        </div>
    @endforeach
    
    @isset ($new_users)
        @foreach ( $new_users as $user )
            <div class="flex justify-center divide-x divide-gray-800 bg-white p-2 mt-2 rounded-lg w-full">
                <div class="flex-1 text-center">{{ $user->name }}</div>
                <div class="flex-1 text-center">未登録</div>
                <div class="flex-1 text-center">{{ $user->style->name }}</div>
                <div class="flex-1 text-center">{{ $user->place->name }}</div>
                <div class="flex-1 text-center"><a href="/manegement/employees/{{ $user->id }}" class="px-4 py-1 rounded-full bg-sky-300 hover:bg-sky-600 text-white">詳細</a></div>
            </div>
        @endforeach
    @endisset
    </div>
</x-app-layout>