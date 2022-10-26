<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="inflasi-klmpk-pengeluarans-table">
            <thead>
            <tr>
                <th>Sembako</th>
                <th>Sandang</th>
                <th>Perumahan</th>
                <th>Perlengkapan</th>
                <th>Kesehatan</th>
                <th>Transportasi</th>
                <th>Informasi</th>
                <th>Rekreasi</th>
                <th>Pendidikan</th>
                <th>Penyedia Pangan</th>
                <th>Perawatan Pribadi</th>
                <th>Total Inflasi</th>
                <th>Created</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($inflasiKlmpkPengeluarans as $inflasiKlmpkPengeluaran)
                <tr>
                    <td>{{ $inflasiKlmpkPengeluaran->sembako }}</td>
                    <td>{{ $inflasiKlmpkPengeluaran->sandang }}</td>
                    <td>{{ $inflasiKlmpkPengeluaran->perumahan }}</td>
                    <td>{{ $inflasiKlmpkPengeluaran->perlengkapan }}</td>
                    <td>{{ $inflasiKlmpkPengeluaran->kesehatan }}</td>
                    <td>{{ $inflasiKlmpkPengeluaran->transportasi }}</td>
                    <td>{{ $inflasiKlmpkPengeluaran->informasi }}</td>
                    <td>{{ $inflasiKlmpkPengeluaran->rekreasi }}</td>
                    <td>{{ $inflasiKlmpkPengeluaran->pendidikan }}</td>
                    <td>{{ $inflasiKlmpkPengeluaran->penyedia_pangan }}</td>
                    <td>{{ $inflasiKlmpkPengeluaran->perawatan_pribadi }}</td>
                    <td>{{ $inflasiKlmpkPengeluaran->total_inflasi }}</td>
                    <td>{{ $inflasiKlmpkPengeluaran->created }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['inflasiKlmpkPengeluarans.destroy', $inflasiKlmpkPengeluaran->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('inflasiKlmpkPengeluarans.show', [$inflasiKlmpkPengeluaran->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('inflasiKlmpkPengeluarans.edit', [$inflasiKlmpkPengeluaran->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $inflasiKlmpkPengeluarans])
        </div>
    </div>
</div>
