@extends('layouts.dashboard')
@section('content')
    @include('components/title-section', ['category' => 'Management', 'section' => 'NPC Event'])
    @include('components/hero-bar', ['title' => sprintf('%s - %s', $event->npc->NAME, $event->functionNameHuman)])

    <section class="section main-section">
        {{--        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">--}}
        {{--            @include('components/card', ['title' => 'Trades', 'content' => number_format($npc->trades->count()), 'icon' => 'cart'])--}}
        {{--            @include('components/card', ['title' => 'Events', 'content' => number_format($npc->events->count()), 'icon' => 'cursor-default-click'])--}}
        {{--        </div>--}}

        @switch($event->eventType())
            @case(\App\NPCEventFunctionTypes::NPCTRADE)
                Trade
                @break
        @endswitch


        @include('components/table', [
            'title' => [
                'text' => 'Trades',
                'icon' => 'cart'
            ],
            'content' => $event->trades,
            'columns' => [
                'Item',
                'Count',
                'Cost'
            ],
            'attributes' => [
                'imgHtml',
                'COUNT',
                'cost'
            ]
        ])
    </section>
@stop
