<div class="card has-table">
    <header class="card-header">
        <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-{{$title['icon']}}"></i></span>
            {{$title['text']}}
        </p>
    </header>
    <div class="card-content">
        <table>
            <thead>
            <tr>
                @foreach($columns as $i => $column)
                    <th>
                        @if(isset($sortable[$i]))
                            <a
                                class="cursor-pointer hover:underline"
                                wire:click="sort('{{$sortable[$i]}}', '{{$order === 'asc' ? 'desc' : 'asc'}}')"
                                wire:loading.class="text-gray-400 cursor-wait">
                                {{$column}}
                            </a>
                            @if($sort === $sortable[$i])
                                <i class="mdi mdi-chevron-{{$order === 'desc' ? 'down' : 'up'}}"></i>
                            @endif
                        @else
                            {{$column}}
                        @endif
                    </th>
                @endforeach
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $row)
                <tr>

                    @foreach($attributes as $attribute)
                        <td>
                            {!!$row[$attribute]!!}
                        </td>
                    @endforeach

                    <td class="actions-cell">
                        <div class="buttons right nowrap">

                            @foreach($actions ?? [] as $action)

                                @if(isset($action['_method']))
                                    <form method="POST"
                                          action="{{route($action['route'], $row[$action['attribute']])}}">
                                        <input type="hidden" name="_method" value="{{$action['_method']}}"/>
                                        <button class="button small {{$action['colour']}}">
                                            <span class="icon"><i class="mdi mdi-{{$action['icon']}}"></i></span>
                                        </button>
                                        @csrf
                                    </form>
                                @else

                                    <a href="{{route($action['route'], $row[$action['attribute']])}}"
                                       class="button small {{$action['colour']}}" type="button">
                                        @if(isset($action['icon']))
                                            <span class="icon"><i class="mdi mdi-{{$action['icon']}}"></i></span>
                                        @endif
                                        @if(isset($action['text']))
                                            {{$action['text']}}
                                        @endif
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br/>
        {{ $items->links('components.table-pagination') }}
    </div>
</div>
