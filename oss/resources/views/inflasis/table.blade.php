<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="inflasis-table">
            <thead>
            <tr>
                <th>Kategori Id</th>
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
            @foreach($inflasis as $inflasi)
                <tr>
                    <td>{{ $inflasi->kategori_id }}</td>
                    <td>{{ $inflasi->sembako }}</td>
                    <td>{{ $inflasi->sandang }}</td>
                    <td>{{ $inflasi->perumahan }}</td>
                    <td>{{ $inflasi->perlengkapan }}</td>
                    <td>{{ $inflasi->kesehatan }}</td>
                    <td>{{ $inflasi->transportasi }}</td>
                    <td>{{ $inflasi->informasi }}</td>
                    <td>{{ $inflasi->rekreasi }}</td>
                    <td>{{ $inflasi->pendidikan }}</td>
                    <td>{{ $inflasi->penyedia_pangan }}</td>
                    <td>{{ $inflasi->perawatan_pribadi }}</td>
                    <td>{{ $inflasi->total_inflasi }}</td>
                    <td>{{ $inflasi->created }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['inflasis.destroy', $inflasi->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('inflasis.show', [$inflasi->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('inflasis.edit', [$inflasi->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $inflasis])
        </div>
    </div>
</div>
