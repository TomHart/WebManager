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
                @foreach($columns as $column)
                    <th>
                        @if(isset($routeName))
                            <a href="{{route($routeName, array_merge(
                                        Request::except(['page']),
                                        [
                                            'sort' => Str::slug($column),
                                            'order' => ($order ?? null) === 'desc' || ($sort ?? null) !== Str::slug($column) ? 'asc' : 'desc'
                                        ]
                                  ))}}">
                                {{$column}}
                            </a>
                            @if(($sort ?? null) === Str::slug($column))
                                <i class="mdi mdi-chevron-{{(($order ?? null) === 'desc') ? 'down' : 'up'}}"></i>
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
            @foreach($content as $row)
                <tr>

                    @foreach($attributes as $attribute)
                        <td>
                            {!!$row[$attribute]!!}
                        </td>
                    @endforeach

                    <td class="actions-cell">
                        <div class="buttons right nowrap">

                            @foreach($actions ?? [] as $action)
                                <a href="{{route($action['route'], $row[$action['attribute']])}}"
                                   class="button small {{$action['colour']}}" type="button">
                                    @if(isset($action['icon']))
                                        <span class="icon"><i class="mdi mdi-{{$action['icon']}}"></i></span>
                                    @endif
                                    @if(isset($action['text']))
                                        {{$action['text']}}
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br/>
        @if(method_exists($content, 'appends'))
            {{ $content->appends(Request::except('page'))->links() }}
        @endif
    </div>
</div>
