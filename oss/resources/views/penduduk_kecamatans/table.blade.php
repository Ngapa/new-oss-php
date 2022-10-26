<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="penduduk-kecamatans-table">
            <thead>
            <tr>
                <th>Kecamatan</th>
                <th>Lk</th>
                <th>Pr</th>
                <th>Total</th>
                <th>Rasio Jk</th>
                <th>Created</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pendudukKecamatans as $pendudukKecamatan)
                <tr>
                    <td>{{ $pendudukKecamatan->kecamatan }}</td>
                    <td>{{ $pendudukKecamatan->lk }}</td>
                    <td>{{ $pendudukKecamatan->pr }}</td>
                    <td>{{ $pendudukKecamatan->total }}</td>
                    <td>{{ $pendudukKecamatan->rasio_jk }}</td>
                    <td>{{ $pendudukKecamatan->created }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['pendudukKecamatans.destroy', $pendudukKecamatan->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('pendudukKecamatans.show', [$pendudukKecamatan->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('pendudukKecamatans.edit', [$pendudukKecamatan->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $pendudukKecamatans])
        </div>
    </div>
</div>
