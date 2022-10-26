<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="inflasi-kotas-table">
            <thead>
            <tr>
                <th>Nama Kota</th>
                <th>Mtom</th>
                <th>Ytod</th>
                <th>Ytoy</th>
                <th>Total</th>
                <th>Created</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($inflasiKotas as $inflasiKota)
                <tr>
                    <td>{{ $inflasiKota->nama_kota }}</td>
                    <td>{{ $inflasiKota->mtom }}</td>
                    <td>{{ $inflasiKota->ytod }}</td>
                    <td>{{ $inflasiKota->ytoy }}</td>
                    <td>{{ $inflasiKota->total }}</td>
                    <td>{{ $inflasiKota->created }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['inflasiKotas.destroy', $inflasiKota->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('inflasiKotas.show', [$inflasiKota->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('inflasiKotas.edit', [$inflasiKota->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $inflasiKotas])
        </div>
    </div>
</div>
