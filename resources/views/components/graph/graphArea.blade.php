<section class="order-1 mt-10 lg:order-none lg:mt-0 lg:w-1/3">
    <div class="hidden lg:block">
        @include('components.default.dateBox', ['dateData' => $dateData])
    </div>
    <div class="mt-3 text-sm">
        Tarefas: <b><span id="done_tasks_count"></span>/{{ count($tasks) }}</b>
    </div>
    <div class="mt-10 flex flex-col items-center">
        @include('components.graph.graphItem')
        <p class="pending_tasks_count group mt-5 text-center text-lg text-gray-300"></p>
    </div>
</section>
