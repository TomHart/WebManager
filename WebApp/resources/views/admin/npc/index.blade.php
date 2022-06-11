@extends('layouts.dashboard')
@section('content')
    @include('components/title-section', ['category' => 'Management', 'section' => 'NPCs'])
    @include('components/hero-bar', [
      'title' => 'NPCs',
      'buttons' => [
          [
            'text'  => 'Export',
            'link' => route('npc.export'),
            'colour' => 'blue'
          ],
          [
            'text'  => 'Add',
            'link' => route('npc.create'),
            'colour' => 'blue'
          ]
      ]
    ])



    <section class="section main-section">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
            @include('components/card', ['title' => 'NPCs', 'content' => $entries->total(), 'icon' => 'cart'])
        </div>

        @include('components/table', [
            'title' => [
                'text' => 'NPCs',
                'icon' => 'cart'
            ],
            'routeName' => 'npc.index',
            'content' => $entries,
            'columns' => [
                'ID',
                'Name',
                'Type',
                'Events',
                'Trades'
            ],
            'attributes' => [
                'NPCID',
                'NAME',
                'TYPE',
                'events_count',
                'trades_count'
            ],
            'actions' => [
                [
                    'route' => 'npc.show',
                    'attribute' => 'NPCID',
                    'icon' => 'eye',
                    'colour' => 'blue'
                ],
                [
                    'route' => 'npc.edit',
                    'attribute' => 'NPCID',
                    'icon' => 'pencil',
                    'colour' => 'blue'
                ],
                [
                    'route' => 'npc.destroy',
                    'attribute' => 'NPCID',
                    'icon' => 'trash-can',
                    'colour' => 'red',
                    '_method'   => 'DELETE'
                ]
            ]
        ])
    </section>

    <div id="sample-modal" class="modal">
        <div class="modal-background --jb-modal-close"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Sample modal</p>
            </header>
            <section class="modal-card-body">
                <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
                <p>This is sample modal</p>
            </section>
            <footer class="modal-card-foot">
                <button class="button --jb-modal-close">Cancel</button>
                <button class="button red --jb-modal-close">Confirm</button>
            </footer>
        </div>
    </div>
    <div id="sample-modal-2" class="modal">
        <div class="modal-background --jb-modal-close"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Sample modal</p>
            </header>
            <section class="modal-card-body">
                <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
                <p>This is sample modal</p>
            </section>
            <footer class="modal-card-foot">
                <button class="button --jb-modal-close">Cancel</button>
                <button class="button blue --jb-modal-close">Confirm</button>
            </footer>
        </div>
    </div>
@stop
