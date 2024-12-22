<div
    class="mt-10 flex flex-row items-center justify-between rounded-lg bg-indigo-800 p-5 transition-all ease-in hover:bg-indigo-900">
    <div class="flex items-center gap-5">
        <div class="size-5 rounded-full" style="background-color: {{ $color }}"></div>
        <p class="text-lg font-semibold">{{ $title }}</p>
    </div>
    <div class="flex items-center">
        <a href="{{ route('category.edit', ['id' => $id]) }}"
            class="fa-solid fa-pen-to-square mr-3 cursor-pointer rounded-full p-2 transition-colors ease-in hover:bg-indigo-600">
        </a>
        <a onclick="confirmDelete(event, '{{ route('category.delete', ['id' => $id]) }}', 'Tem certeza de que quer excluir esta categoria?')"
            class="fa-solid fa-trash cursor-pointer rounded-full p-2 transition-colors ease-in hover:bg-indigo-600">
        </a>
    </div>
</div>
