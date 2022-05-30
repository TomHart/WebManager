<div id="{{$idPrefix}}{{$item->pivot->POS}}" class="modal">
    <div class="modal-background --jb-modal-close"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">{{$item->ITEMNAME}} ID: {{$item->id}}</p>
        </header>
        <section class="modal-card-body">

            @if($item->pivot->STACKCOUNT > 0)
            <p><em>Count</em>: {{$item->pivot->STACKCOUNT}}</p>
            @endif

            @if($item->slotCount !== null)
            <p><em>Slots</em>: {{$item->slotCount}}</p>
            @endif

            <p><em>Stats</em>:</p>

            @foreach($item->stats as $stat)
            <p>{{$stat}}</p>
            @endforeach

            <p><em>Item Attributes</em>:</p>

            @foreach($item->attributes as $attr)
            <p>{{$attr->ATTRIBUTENAME}}: {{$attr->pivot->VALUE}}</p>
            @endforeach
        </section>
        <footer class="modal-card-foot">
            <button class="button blue --jb-modal-close">Close</button>
        </footer>
    </div>
</div>