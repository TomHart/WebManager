@extends('layouts.iframe')
@if($item->STACKCOUNT > 0)
    <p><em>Count</em>: {{$item->STACKCOUNT}}</p>
@endif

@if($item->slotCount !== null)
    <p><em>Slots</em>: {{$item->slotCount}}</p>
@endif

<p><em>Stats</em>:</p>

@foreach($item->stats as $stat)
    <p>{{$stat}}</p>
@endforeach

<p><em>Item Attributes</em>:</p>

@foreach($item->item->attributes as $attr)
    <p>{{$attr->ATTRIBUTENAME}}: {{$attr->pivot->VALUE}}</p>
@endforeach
