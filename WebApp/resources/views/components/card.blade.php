<div class="card">
    <div class="card-content relative">
        <div class="flex items-center justify-between">
            <div class="widget-label">
                <h3>
                    {{$title}}
                </h3>
                <h1>
                    @if(is_bool($content))
                        <i class="mdi mdi-{{$content ? 'check' : 'close'}}"></i>

                        @if(isset($toggle) && ($toggle['allowed'] ?? true))
                            <a
                                href="#"
                                data-link="{{$toggle['route']}}"
                                class="toggle-link text-sm hover:underline hover:text-blue-500 absolute bottom-2 right-4"
                                data-data="{{json_encode($toggle['data'] ?? [])}}"
                                data-wait-text="{{$toggle['text'] ?? 'Toggling'}}">
                                {{$toggle['text'] ?? 'Toggle'}}
                            </a>
                        @endif
                    @else
                        {!!$content!!}
                    @endif
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
