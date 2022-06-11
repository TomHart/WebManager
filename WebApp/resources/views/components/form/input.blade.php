<div class="mb-{{ $marginBottom ?? 6 }}">
    <label class="block text-grey-darker text-sm font-bold mb-2" for="{{ $name }}">
        {{ $label }}
    </label>
    <input
        class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3"
        id="{{ $name }}"
        @if(isset($wire) && $wire)
            wire:model="{{$name}}"
        @else
            name="{{ $name }}"
        @endif
        type="{{ $type ?? 'text' }}"
        placeholder="{{ $placeholder ?? '' }}">

    @if ($errors->has($name))
        @foreach ($errors->get($name) as $error)
            <p class="text-red-500 text-xs italic">{{ $error }}</p>
        @endforeach
    @endif
</div>
