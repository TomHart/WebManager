<div class="card">
    <div class="card-content">
        <div class="flex items-center justify-between">
            <div class="widget-label">
                <h3>
                    {{$title}}
                </h3>
                <h1>
                    {!!$content!!}
                </h1>
                @if(isset($subtitle))
                    <sub>
                        {{$subtitle}}
                    </sub>
                @endif
            </div>
            <span class="icon widget-icon text-green-500"><i class="mdi mdi-{{$icon}} mdi-48px"></i></span>
        </div>
    </div>
</div>
