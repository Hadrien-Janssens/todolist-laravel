
<x-app-layout>
    <div class="max-w-md mx-auto mt-10 ">

        <h1 class="font-bold text-gray-400 text-lg"><span class="text-emerald-500 text-2xl ">Todolist</span> with Laravel</h1>
        <form method="POST" action="{{route('todo.store' )}}" class="flex gap-3 my-3">
            @csrf
            <input type="text" name="name" placeholder="ex : faire les courses" class="rounded-md h-8 border-emerald-50">
            <button class=" px-4 bg-emerald-600  text-emerald-50 rounded-md ">Ajouter</button>
        </form>
        <ul class="flex flex-col gap-2 mt-4">
            @forelse ($users as $user )
            <li class="flex items-center w-full justify-between rounded border px-4 py-1">
                <input type="checkbox" class="rounded border-emerald-400">
                <p>{{ $user->name}}</p>
                <form method="POST" action="{{route('todo.destroy', $user)}}">
                    @csrf
                    @method('DELETE')
                    <button class=" px-4 bg-emerald-600 text-red-50 rounded-md ">delete</button>
                </form>
                </li>

                @empty
                <div class="p-4 py-3 rounded-sm bg-neutral-50 text-neutral-500 border border-neutral-500 text-center italic">Vous n'avez rien à faire</div>
            @endforelse
        </ul>
</div>
</x-app-layout>

