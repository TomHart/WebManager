<div class="carousel">
    <button class="carousel__nav carousel__nav--left" wire:click="move('left')">
        <i class="mdi mdi-chevron-left"></i>
    </button>
    <button class="carousel__nav carousel__nav--right" wire:click="move('right')">
        <i class="mdi mdi-chevron-right"></i>
    </button>
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
    <script>
        document.addEventListener('livewire:load', function () {
            let timer;
            @this.on('moved', () => {
                clearTimeout(timer);
                timer = setTimeout(() => {
                    @this.move('right');
                }, 5000);
            });

            timer = setTimeout(() => {
                @this.move('right');
            }, 5000);
        });
    </script>
</div>
