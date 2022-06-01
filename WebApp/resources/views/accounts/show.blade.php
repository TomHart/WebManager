@extends('layouts.dashboard')
@section('content')
@include('components/title-section', ['category' => 'Management', 'section' => 'Accounts'])
@include('components/hero-bar', ['title' => $account->CHARID])



<section class="section main-section">
  <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
    @include('components/card', ['title' => 'Level', 'content' => $account->LV, 'icon' => 'chart-bell-curve-cumulative'])
    @include('components/card', ['title' => 'Gold', 'content' => number_format($account->INVENMONEY), 'icon' => 'bitcoin'])
    @include('components/card', ['title' => 'Items', 'content' => number_format($account->items->count()), 'icon' => 'bag-personal'])
  </div>
</section>
@stop