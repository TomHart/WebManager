<div class="card has-table">
    <header class="card-header">
        <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-{{$title['icon']}}"></i></span>
            {{$title['text']}}
        </p>
        <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
    </header>
    <div class="card-content">
        <table>
            <thead>
                <tr>
                    @foreach($columns as $column)
                    <th>{{$column}}</th>
                    @endforeach
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($content as $row)
                <tr>

                    @foreach($attributes as $attribute)
                    <td>{{$row[$attribute]}}</td>
                    @endforeach

                    <td class="actions-cell">
                        <div class="buttons right nowrap">

                            @foreach($actions as $action)

                            <a href="{{route($action['route'], $row[$action['attribute']])}}" class="button small {{$action['colour']}}" type="button">
                                <span class="icon"><i class="mdi mdi-{{$action['icon']}}"></i></span>
                            </a>
                            @endforeach
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="table-pagination">
            <div class="flex items-center justify-between">
                <div class="buttons">
                    <button type="button" class="button active">1</button>
                    <button type="button" class="button">2</button>
                    <button type="button" class="button">3</button>
                </div>
                <small>Page 1 of 3</small>
            </div>
        </div>
    </div>
</div>