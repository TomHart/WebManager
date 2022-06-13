<div class="carousel">
    <a wire:click="move('left')">Left</a>
    <a wire:click="move('right')">Right</a>
    <div class="carousel__wrapper" style="width: {{count($files)}}00vw; transform: translate({{$offset}}vw, 0);">
        @foreach($files as $file)
            <div class="carousel__slide" style="background-image: url({{asset($file)}})">
                <a href="/" class="carousel__slide__link">
                    <h2 class="carousel__slide__title">Slide Title</h2>
                    <p class="carousel__slide__description">This is a slide description</p>
                </a>
            </div>
        @endforeach
    </div>
</div>
