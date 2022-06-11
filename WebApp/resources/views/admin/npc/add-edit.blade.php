@extends('layouts.dashboard')
@section('content')
    @include('components/title-section', ['category' => 'Management', 'section' => 'NPCs'])
    @include('components/hero-bar', [
        'title' => 'Add',
    ])

    <section class="section main-section">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
            <livewire:admin.npc.add-edit-form :npc="$npc"/>
        </div>
    </section>
@stop
