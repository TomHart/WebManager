@extends('layouts.dashboard')
@section('content')
@include('components/title-section', ['category' => 'Management', 'section' => 'NPCs'])
@include('components/hero-bar', ['title' => $npc->NAME])



<section class="section main-section">
  <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
    @include('components/card', ['title' => 'Trades', 'content' => number_format($npc->trades->count()), 'icon' => 'cart'])
  </div>
 
  @include('components/table', [
      'title' => [
          'text' => 'Trades',
          'icon' => 'cart'
      ],
      'content' => $npc->trades,
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