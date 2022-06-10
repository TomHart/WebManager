<div class="mb-{{ $marginBottom ?? 6 }} autocomplete--container" data-component-name="autocomplete"
    data-config="{{ json_encode($config) }}">
    <label class="block text-grey-darker text-sm font-bold mb-2" for="{{ $name }}">
        {{ $label }}
    </label>
    <input
        class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3 autocomplete--input"
        id="{{ $name }}" type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder ?? '' }}">

    <input class="autocomplete--value" name="{{ $name }}" type="hidden">
    <div class="autocomplete--list">
    </div>

    @if ($errors->has($name))
        @foreach ($errors->get($name) as $error)
            <p class="text-red-500 text-xs italic">{{ $error }}</p>
        @endforeach
    @endif
</div>
