@extends('layouts.dashboard')
@section('content')
    @include('components/title-section', ['category' => 'Management', 'section' => 'Characters'])
    @include('components/hero-bar', ['title' => $character->CHARID])
    
    
    
      <section class="section main-section">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
          @include('components/card', ['title' => 'Level', 'content' => $character->LV, 'icon' => 'chart-bell-curve-cumulative'])
          @include('components/card', ['title' => 'Gold', 'content' => number_format($character->INVENMONEY), 'icon' => 'bitcoin'])
          @include('components/card', ['title' => 'Items', 'content' => number_format($character->items->count()), 'icon' => 'bag-personal'])
        </div>

        @foreach($items as $index => $page)
          Page {{$index}}<br />
          @foreach($page as $rowIndex => $row)
            Row {{$rowIndex}}<br />
            @foreach($row as $item)
              @if($item)
                {{$item->ITEMNAME}}<br />
                <img src="{{asset('items/' . $item->id . '.jpg')}}" /><br />
              @else
                Nothing<br />
              @endif
            @endforeach
          @endforeach
        @endforeach
     
        {{--@include('components/table', [
            'title' => [
                'text' => 'Characters',
                'icon' => 'account-multiple'
            ],
            'content' => $characters,
            'columns' => [
                'Name',
                'Gold'
            ],
            'attributes' => [
                'CHARID',
                'INVENMONEY'
            ],
            'actions' => [
                [
                    'route' => 'characters.show',
                    'attribute' => 'CHARID',
                    'icon' => 'eye',
                    'colour' => 'blue'        
                ]    
            ]
        ])--}}
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