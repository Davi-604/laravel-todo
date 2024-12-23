<div class="my-10">
    <label>
        <div class="my-2 text-left text-lg font-semibold">{{ $label ?? '' }}</div>
        <div class="flex items-center">
            <input name="{{ $name }}" value="{{ $value ?? 'text' }}"
                class="{{ $error ? 'border-red-500' : 'border-transparent' }} flex-1 rounded-lg border-2 bg-indigo-900 p-3 text-lg outline-none transition-colors ease-in-out focus:border-white"
                type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder ?? '' }}" {{ $required ? 'required' : '' }}
                onchange="cleanError(this)" />
            @if (!empty($type) && $type === 'password')
                <i class="show_btn fa-regular fa-eye fa-xl -ml-9 cursor-pointer text-black/80"></i>
            @endif
        </div>
    </label>
</div>
