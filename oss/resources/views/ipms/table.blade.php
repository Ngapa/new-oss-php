<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="ipms-table">
            <thead>
            <tr>
                <th>Uhh</th>
                <th>Rls</th>
                <th>Hls</th>
                <th>Ppp</th>
                <th>Ipm</th>
                <th>Pertumbuhan</th>
                <th>Created</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ipms as $ipm)
                <tr>
                    <td>{{ $ipm->uhh }}</td>
                    <td>{{ $ipm->rls }}</td>
                    <td>{{ $ipm->hls }}</td>
                    <td>{{ $ipm->ppp }}</td>
                    <td>{{ $ipm->ipm }}</td>
                    <td>{{ $ipm->pertumbuhan }}</td>
                    <td>{{ $ipm->created }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['ipms.destroy', $ipm->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('ipms.show', [$ipm->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('ipms.edit', [$ipm->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $ipms])
        </div>
    </div>
</div>
