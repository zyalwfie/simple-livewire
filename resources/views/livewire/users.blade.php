<div class="max-w-3xl h-screen flex items-center justify-center flex-col gap-4 mx-auto">
    <h1 class="text-center text-3xl font-bold">Users List ({{ count($users) }})</h1>
    <ul class="flex flex-col items-center gap-4">
        @foreach ($users as $user)
            <li>
                <span>{{ $user->name }}</span>
                <span>|</span>
                <span>{{ $user->email }}</span>
            </li>
        @endforeach
    </ul>
</div>
