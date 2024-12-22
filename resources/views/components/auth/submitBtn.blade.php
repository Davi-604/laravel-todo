<button type="submit"
    class="{{ isset($filled) ? 'bg-indigo-900' : '' }} mx-3 rounded-md px-5 py-3 text-xl font-semibold transition-colors ease-in hover:bg-indigo-800">
    {{ $label }}
    @isset($icon)
        <div class="{{ $icon }} ml-3"></div>
    @endisset
</button>
