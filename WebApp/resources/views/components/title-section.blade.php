<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>{{$category}}</li>
            <li>{{$section}}</li>
        </ul>
        @if(isset($button))
            <a href="{{$button['link']}}" class="button {{$button['colour'] ?? 'blue'}}">
                <span class="icon"><i class="mdi mdi-{{$button['icon']}}"></i></span>
                <span>{{$button['text']}}</span>
            </a>
        @endif
    </div>
</section>