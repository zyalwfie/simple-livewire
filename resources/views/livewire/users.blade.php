<div class="max-w-3xl h-screen flex items-center justify-center flex-col gap-4 mx-auto">
    <h1 class="text-center text-3xl font-bold">Users List ({{ count($users) }})</h1>
    <div class="flex gap-2 items-center">
        <button type="button" wire:click="generateRandomUser" class="px-4 py-2 rounded border border-gray-300 bg-gray-300 text-gray-800 transition hover:bg-gray-600 hover:text-gray-200 cursor-pointer">Create new random user</button>
            <button type="button" wire:click="$refresh" class="px-4 py-2 rounded border border-blue-50 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 cursor-pointer">Reload</button>
    </div>
    <ul class="flex flex-col items-center gap-4 max-h-50 overflow-auto">
        @foreach ($users as $user)
            <li>
                <span>{{ $user->name }}</span>
                <span>|</span>
                <span>{{ $user->email }}</span>
            </li>
        @endforeach
    </ul>
</div>
