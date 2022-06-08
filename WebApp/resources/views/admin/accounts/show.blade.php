@extends('layouts.dashboard')
@section('content')
    @include('components.title-section', ['category' => 'Management', 'section' => 'Account'])
    @include('components.hero-bar', ['title' => $account->ACCOUNTID])



    <section class="section main-section">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
            @include('components.card', [
                'title' => 'Characters',
                'content' => $account->characters->count(),
                'subtitle'  => $account->characters->pluck('CHARID')->join(', '),
                'icon' => 'account'
            ])
            @include('components.card', [
                'title' => 'Is Admin',
                'content' => $account->is_admin_html,
                'icon' => 'padlock'
            ])
            {{--            @include('components.card', ['title' => 'Gold', 'content' => number_format($account->INVENMONEY), 'icon' => 'bitcoin'])--}}
            {{--            @include('components.card', ['title' => 'Items', 'content' => number_format($account->items->count()), 'icon' => 'bag-personal'])--}}
        </div>
    </section>
@stop
