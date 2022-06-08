<div id="{{$idPrefix}}{{$item->pivot->POS}}" class="modal">
    <div class="modal-background --jb-modal-close"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">{{$item->ITEMNAME}} ID: {{$item->id}}</p>
        </header>
        <section class="modal-card-body">
            <p data-iframe-loaded="remove">Loading</p>
            <iframe data-src="{{route('items.iframe', $item->pivot->ITEMSEQ)}}" style="width:100%; height:100%;visibility: hidden"></iframe>
        </section>
        <footer class="modal-card-foot">
            <button class="button blue --jb-modal-close">Close</button>
        </footer>
    </div>
</div>
