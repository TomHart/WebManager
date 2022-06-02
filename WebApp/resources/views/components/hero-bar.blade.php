<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            {{$title}}
        </h1>
        @if(isset($button))
            <a href="{{$button['link']}}" class="button {{$button['colour'] ?? ''}}">{{$button['text']}}</a>
        @endif
    </div>
</section>