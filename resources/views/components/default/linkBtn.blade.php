<a href="{{ !empty($url) ? route($url) : url()->previous() }}" type="{{ $type ?? '' }}"
    class="{{ isset($filled) ? 'bg-indigo-900' : '' }} {{ isset($small) ? 'text-sm px-3 py-2' : 'text-lg px-5 py-3' }} inline-flex items-center gap-3 rounded-md font-semibold transition-colors ease-in hover:bg-indigo-800">
    <p class="{{ isset($iconLeftSide) ? 'order-1' : '' }}">{{ $label }}</p>
    @isset($icon)
        <div class="{{ $icon }} fa-lg lg:fa-md"></div>
    @endisset
</a>
