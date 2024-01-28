<x-app-layout>
    <div class="flex flex-col items-center">
        <h1>勤怠データ</h1>
        <div class="p-4 border rounded-lg bg-white">
            <h2>基本情報</h2>
            <p>所属　： {{ $user->department->name }}</p>
            <p>氏名　： {{ $user->name }}</p>
            <p>email　： {{ $user->email }}</p>
            <p>電話番号： {{ $user->phone }}</p>
        </div>
    </div>
</x-app-layout>