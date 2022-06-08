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
                'content' => $account->is_admin,
                'icon' => 'lock',
                'toggle'    => [
                    'allowed'   => $account->is_admin,
                    'route' => route('accounts.toggle-admin', $account->ACCOUNTID)
                ]
            ])
            @include('components.card', [
                'title' => 'Email',
                'content' => $account->master->EMAIL,
                'icon' => 'email'
            ])
            {{--            @include('components.card', ['title' => 'Items', 'content' => number_format($account->items->count()), 'icon' => 'bag-personal'])--}}
        </div>
    </section>
@stop
