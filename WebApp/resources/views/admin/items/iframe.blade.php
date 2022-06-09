@extends('layouts.iframe')

<p>{!! str_replace(PHP_EOL, '<br />', $item->item->DESCRIPTION) !!}</p>

@if($item->STACKCOUNT > 0)
    <p><em>Count</em>: {{$item->STACKCOUNT}}</p>
@endif

@if($item->slotCount !== null)
    <p><em>Slots</em>: {{$item->slotCount}}</p>
@endif

@if($item->stats)
    <p><em>Stats</em>:</p>

    @foreach($item->stats as $stat)
        <p>{{$stat}}</p>
    @endforeach
@endif

@if($item->item->attributes)
    <p><em>Item Attributes</em>:</p>

    @foreach($item->item->attributes as $attr)
        @if($attr->pivot->VALUE == 0)
            @continue
        @endif
        
        <p>{{$attr->ATTRIBUTENAME}}: {{$attr->pivot->VALUE}}</p>
    @endforeach
@endif
