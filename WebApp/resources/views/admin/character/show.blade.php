@extends('layouts.dashboard')
@section('title', $character->CHARID)
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
            Page {{++$index}}
            <table class="inventory--table">
                @foreach($page as $rowIndex => $row)
                    <tr>
                        @foreach($row as $item)
                            <td>
                                @if($item)
                                    <a href="#{{$item->pivot->POS}}" class="--jb-modal"
                                       data-target="inventory-POS-@if($item){{$item->pivot->POS}}@endif">
                                        <img src="{{asset('items/' . $item->id . '.jpg')}}" alt="Item image"/>

                                        @if($item->pivot->STACKCOUNT > 0)
                                            <span class="inventory--table--stackcount">
                                                {{$item->pivot->STACKCOUNT}}
                                              </span>
                                        @endif
                                    </a>

                                    @include('components/modal/item', ['item' => $item, 'idPrefix' => 'inventory-POS-'])
                                @else
                                    <img src="{{asset('items/_empty.png')}}" alt="Item image"/>
                                @endif
                            </td>
                        @endforeach

                    </tr>
                @endforeach
            </table>
        @endforeach
    </section>
@stop
