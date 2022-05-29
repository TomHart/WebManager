<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            {{$title}}
        </h1>
        @if(isset($button))
        <button class="button light">Button</button>
        @endif
    </div>
</section>