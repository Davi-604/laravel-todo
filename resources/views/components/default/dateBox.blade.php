<div class="flex items-center">
    <h3 class="text-xl font-semibold">
        Progresso do dia
    </h3>
    <hr class="mx-5 mt-1 w-full" />
    <div class="flex flex-1 items-center">
        <a href="{{ route('home', ['date' => $dateData['prevDate']]) }}">
            <i class="fa-solid fa-angle-left"></i>
        </a>
        <span id="date-span" class="mx-5 w-16 cursor-pointer text-sm font-semibold text-gray-200">
            {{ $dateData['currentDate'] }}
        </span>
        <a href="{{ route('home', ['date' => $dateData['nextDate']]) }}">
            <i class="fa-solid fa-angle-right"></i>
        </a>
    </div>
</div>
