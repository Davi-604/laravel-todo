<div
    class="task {{ $done === 1 ? 'done_task' : 'pending_task' }} mt-10 flex flex-col items-start gap-4 rounded-lg bg-indigo-800 p-3 transition-all ease-in hover:bg-indigo-900 lg:flex-row lg:p-5">
    <div class="flex flex-1 items-center">
        <label class="flex items-center gap-1 lg:gap-3">
            <input type="checkbox" class="size-5 cursor-pointer" {{ $done ? 'checked' : '' }} onchange="checkTask(this)"
                data-id="{{ $id }}" />
            <div class="ml-3 text-xl font-bold lg:text-2xl">
                {{ $title }}
            </div>
        </label>
    </div>
    <div class="ml-3 flex flex-1 items-center">
        <div class="mr-3 h-5 w-5 rounded-full" style="background-color: {{ $priorityColor }}"></div>
        <p class="text-sm font-semibold text-gray-100">
            {{ $priorityLabel }}
        </p>
    </div>
    <div class="flex w-full items-center justify-end">
        <a href="{{ route('task.edit', ['id' => $id]) }}"
            class="fa-solid fa-pen-to-square mr-3 cursor-pointer rounded-full p-2 transition-colors ease-in hover:bg-indigo-600">
        </a>
        <a onclick="confirmDelete(event, '{{ route('task.delete', ['id' => $id]) }}', 'Tem certeza de que quer excluir esta tarefa?')"
            class="fa-solid fa-trash cursor-pointer rounded-full p-2 transition-colors ease-in hover:bg-indigo-600">
        </a>
    </div>
</div>
