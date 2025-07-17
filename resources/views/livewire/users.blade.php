<div class="max-w-lg h-screen flex items-center justify-center flex-col gap-4 mx-auto">

    @if (session('success'))
        <div class="p-4 w-full text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Success!</span>
            {{ session('success') }}
        </div>
    @endif

    <div class="w-full mb-8">
        <div>
            <h2 class="mt-4 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Create New User</h2>
        </div>

        <div class="mt-4">
            <form wire:submit="createNewUser" action="#" method="POST" class="space-y-6">
                <div>
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                    <div class="mt-2">
                        <input wire:model="name" id="name" type="name" name="name" autocomplete="name"
                            class="@error('name') outline-red-300 @enderror block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        @error('name')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500"><span
                                    class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input wire:model="email" id="email" type="email" name="email" autocomplete="email"
                            class="@error('name') outline-red-300 @enderror block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        @error('email')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500"><span
                                    class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input wire:model="password" id="password" type="password" name="password"
                            autocomplete="current-password"
                            class="@error('password') outline-red-300 @enderror block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        @error('password')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500"><span
                                    class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button wire:click.prevent="createNewUser" type="button"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer">Create</button>
                </div>
            </form>
        </div>
    </div>

    <h1 class="text-center text-3xl font-bold">Users List ({{ count($users) }})</h1>
    <div class="flex gap-2 items-center">
        <button type="button" wire:click="generateRandomUser"
            class="px-4 py-2 rounded border border-gray-300 bg-gray-300 text-gray-800 transition hover:bg-gray-600 hover:text-gray-200 cursor-pointer">
            Create new random user
        </button>
        <button type="button" wire:click="$refresh"
            class="px-4 py-2 rounded border border-blue-50 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 cursor-pointer">
            Reload
        </button>
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
