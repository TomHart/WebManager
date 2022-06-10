@extends('layouts.dashboard')
@section('content')
    @include('components/title-section', ['category' => 'Management', 'section' => $npc->NAME])
    @include('components/hero-bar', [
        'title' => 'Add Trade',
    ])

    <section class="section main-section">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">

            <form method="POST" action="{{route('npc.trades.add-trade.submit', $npc)}}">

                @include('components/form/autocomplete', [
                    'label' => 'Items',
                    'name' => 'ITEM_ID',
                    'config' => [
                        'route' => route('items.index'),
                        'name' => 'ITEMNAME',
                        'keyForValue'   => 'id',
                        'img' => [
                            'path' => '/img/items/%s.png',
                        ],
                    ],
                ])

                @include('components/form/input', [
                    'label' => 'Count',
                    'name' => 'COUNT',
                    'type' => 'number',
                ])

                @csrf
                <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                    Add
                </button>
            </form>
        </div>
    </section>
@stop
