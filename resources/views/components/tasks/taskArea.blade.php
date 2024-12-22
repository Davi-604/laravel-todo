<section class="mx-1 flex-1 lg:mx-5">
    <div class="mb-10 lg:mb-0 lg:hidden">
        @include('components.default.dateBox', ['dateData' => $dateData])
    </div>

    <select onchange="filterTask(this)"
        class="cursor-pointer rounded-md bg-indigo-800 p-2 outline-none transition-all ease-in-out hover:font-bold">
        <option value="all_tasks">Todas as tarefas</option>
        <option value="pending_tasks">Tarefas pendentes</option>
        <option value="performed_tasks">Tarefas realizadas</option>
    </select>
    <div class="flex h-full w-full flex-col">
        @foreach ($tasks as $task)
            @include('components.tasks.taskItem', [
                'id' => $task->id,
                'title' => $task->title,
                'priorityLabel' => $task->category->title,
                'priorityColor' => $task->category->color,
                'done' => $task->is_done,
            ])
        @endforeach

        <div class="without_tasks hidden flex-1 flex-wrap items-center justify-center gap-4 p-10">
            <p class="text-xl font-bold lg:text-3xl">Não há nenhuma tarefa por aqui ...</p>
            <i class="fa-solid fa-ghost fa-3x"></i>
        </div>
        <div class="mt-10 lg:hidden">
            @include('components.default.linkBtn', [
                'label' => 'Adicionar  tarefa',
                'icon' => 'fa-solid fa-plus',
                'url' => 'task.create',
                'filled' => true,
            ])
        </div>
    </div>
</section>
