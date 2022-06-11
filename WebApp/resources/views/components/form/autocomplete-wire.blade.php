<div class="mb-{{ $marginBottom ?? 6 }} autocomplete--container" data-component-name="autocomplet"
     data-config="{{ json_encode($config) }}">
    <label class="block text-grey-darker text-sm font-bold mb-2" for="{{ $name }}">
        {{ $label }}
    </label>
    <input
        class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3 autocomplete--input"
        id="{{ $name }}"
        type="{{ $type ?? 'text' }}"
        @if(isset($textValue))
            wire:model="{{$textValue}}"
        @endif
        placeholder="{{ $placeholder ?? '' }}">

    <input
        class="autocomplete--value"
        wire:model="{{$name}}"
        type="hidden">

    <div class="autocomplete--list">
        @if(isset($textValue) && isset($autocompleteSearch[$textValue]))
            @foreach($autocompleteSearch[$textValue] as $item)
                <div wire:click="autocompleteSelect('{{$textValue}}', {{$item[$config['keyForValue'] ?? 'id']}})">
                    {{$item[$config['name'] ?? 'NAME']}}
                </div>
            @endforeach
        @endif
    </div>

    @error($name)<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
</div>
