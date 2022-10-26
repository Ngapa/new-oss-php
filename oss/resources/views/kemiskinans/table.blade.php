<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="kemiskinans-table">
            <thead>
            <tr>
                <th>Pddk Mskn</th>
                <th>P0</th>
                <th>P1</th>
                <th>P2</th>
                <th>Gk</th>
                <th>Created</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($kemiskinans as $kemiskinan)
                <tr>
                    <td>{{ $kemiskinan->pddk_mskn }}</td>
                    <td>{{ $kemiskinan->p0 }}</td>
                    <td>{{ $kemiskinan->p1 }}</td>
                    <td>{{ $kemiskinan->p2 }}</td>
                    <td>{{ $kemiskinan->gk }}</td>
                    <td>{{ $kemiskinan->created }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['kemiskinans.destroy', $kemiskinan->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('kemiskinans.show', [$kemiskinan->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('kemiskinans.edit', [$kemiskinan->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $kemiskinans])
        </div>
    </div>
</div>
