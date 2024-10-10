
<x-app-layout>
    <div class="max-w-md mx-auto mt-10 ">
        <h1 class="text-2xl font-bold">Todolist with Laravel</h1>
        <ul class="flex flex-col gap-2 mt-4">
            @foreach ($users as $user )
            <li class="flex items-center w-full justify-between rounded border px-4 py-1">
                <input type="checkbox" class="rounded border-gray-300">
                <p>{{ $user->name}}</p>
                <button>delete</button>
                </li>
            @endforeach
        </ul>
</div>
</x-app-layout>

