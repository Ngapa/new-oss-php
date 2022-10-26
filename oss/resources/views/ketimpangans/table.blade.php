<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="ketimpangans-table">
            <thead>
            <tr>
                <th>Pddk</th>
                <th>Jumlah</th>
                <th>Created</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ketimpangans as $ketimpangan)
                <tr>
                    <td>{{ $ketimpangan->pddk }}</td>
                    <td>{{ $ketimpangan->jumlah }}</td>
                    <td>{{ $ketimpangan->created }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['ketimpangans.destroy', $ketimpangan->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('ketimpangans.show', [$ketimpangan->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('ketimpangans.edit', [$ketimpangan->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $ketimpangans])
        </div>
    </div>
</div>
