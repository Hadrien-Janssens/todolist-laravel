<x-app-layout>
    <div class="max-w-md mx-auto mt-10 ">

        <h1 class="font-bold text-gray-400 text-lg"><span class="text-emerald-500 text-2xl ">Todolist</span> with Laravel
        </h1>
        <form method="POST" action="{{ route('todo.store') }}" class="flex gap-2 justify-between my-3">
            @csrf
            <div class="grow">
                <input type="text" name="name" placeholder="ex : go running"
                    class=" italic rounded-md h-8 border-emerald-50 w-full">
            </div>
            <button class=" px-4 bg-emerald-600  text-emerald-50 rounded-md ">Add</button>
        </form>
        @error('name')
            <div class="text-red-400 italic">* {{ $message }}</div>
        @enderror
        <hr>
        <h2 class="mt-4 mb-2 font-bold text-xl text-gray-500">List :</h2>
        <ul class="flex flex-col gap-2 ">
            @forelse ($todos as $todo)
                <li class="flex items-center w-full justify-between rounded border px-2 py-1">

                    <form action="{{ route('todo.update', $todo->id) }} " class="{{ 'form-' . $todo->id }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <input name="is-check" type="checkbox" @checked($todo->is_check)
                            class="rounded border-emerald-400"
                            onchange="document.querySelector('.form-{{ $todo->id }}').submit()">
                    </form>
                    <p>{{ $todo->name }}</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="px-4 bg-emerald-600 text-red-50 rounded-md" data-bs-toggle="modal"
                        data-bs-target="#exampleModal-{{ $todo->id }}">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal-{{ $todo->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel-{{ $todo->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete todo</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="px-4 bg-gray-400 text-emerald-50 rounded-md"
                                        data-bs-dismiss="modal">Close</button>

                                    <form method="POST" action="{{ route('todo.destroy', $todo->id) }}"
                                        class="{{ 'formdelete-' . $todo->id }}">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="
                                        px-4 bg-emerald-600 text-red-50 rounded-md ">delete</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>


                </li>

            @empty
                <div
                    class="p-4 py-3 rounded-md bg-neutral-50 text-neutral-500 border border-neutral-500 text-center italic">
                    You haven't todo</div>
            @endforelse
        </ul>
    </div>
</x-app-layout>
