<form wire:submit.prevent="submit">

    @include('components/form/input', [
        'label' => 'Name',
        'name' => 'NAME',
        'wire'  => true
    ])

    @include('components/form/input', [
        'label' => 'Type',
        'name' => 'TYPE',
        'wire'  => true
    ])

    @include('components/form/input', [
        'label' => 'Position',
        'name' => 'COORDS',
        'wire'  => true
    ])

    @include('components/form/input', [
        'label' => 'Degrees',
        'name' => 'DEGREES',
        'wire'  => true
    ])

    @include('components/form/autocomplete-wire', [
        'label' => 'Character Model',
        'name' => 'TID',
        'textValue' => 'TYPENAME',
        'config' => [
            'route' => route('character-types.index'),
            'name' => 'NAME',
            'keyForValue'   => 'TID'
        ],
    ])

    <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
        Add
    </button>
</form>
