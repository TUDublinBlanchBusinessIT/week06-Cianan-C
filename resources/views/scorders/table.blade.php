<table class="table table-responsive" id="scorders-table">
    <thead>
        <th>Orderdate</th>
        <th>Deliverystreet</th>
        <th>Deliverycity</th>
        <th>Deliverycounty</th>
        <th>Ordertotal</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($scorders as $scorder)
        <tr>
            <td>{!! $scorder->orderdate !!}</td>
            <td>{!! $scorder->deliverystreet !!}</td>
            <td>{!! $scorder->deliverycity !!}</td>
            <td>{!! $scorder->deliverycounty !!}</td>
            <td>{!! $scorder->ordertotal !!}</td>
            <td>
                {!! Form::open(['route' => ['scorders.destroy', $scorder->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('scorders.show', [$scorder->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-eye"></i></i></a>
                    <a href="{!! route('scorders.edit', [$scorder->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-edit"></i></i></a>
                    {!! Form::button('<i class="far fa-trash-alt"></i></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>