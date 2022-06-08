@extends('layouts.dashboard')
@section('content')
    @include('components/title-section', ['category' => 'Management', 'section' => 'NPCs'])
    @include('components/hero-bar', [
      'title' => 'NPCs', 
      'button' => [
        'text'  => 'Export',
        'link' => route('npc.export'),
        'colour' => 'blue'
      ]
    ])
    
    
    
      <section class="section main-section">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
          @include('components/card', ['title' => 'NPCs', 'content' => $entries->count(), 'icon' => 'cart'])
        </div>
    
        @include('components/table', [
            'title' => [
                'text' => 'NPCs',
                'icon' => 'cart'
            ],
            'content' => $entries,
            'columns' => [
                'Name',
                'Type',
                'Trades'
            ],
            'attributes' => [
                'NAME',
                'TYPE',
                'TradeCount'
            ],
            'actions' => [
                [
                    'route' => 'npc.show',
                    'attribute' => 'NPCID',
                    'icon' => 'eye',
                    'colour' => 'blue'        
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
    </div>
@stop