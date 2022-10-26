<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="tenaga-kerjas-table">
            <thead>
            <tr>
                <th>Angkatan Kerja</th>
                <th>Pengangguran</th>
                <th>Bkn Angkatan Kerja</th>
                <th>Sekolah</th>
                <th>Urus Ruta</th>
                <th>Tpak</th>
                <th>Tkk</th>
                <th>Tpt</th>
                <th>Lainnya</th>
                <th>Gender</th>
                <th>Created</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tenagaKerjas as $tenagaKerja)
                <tr>
                    <td>{{ $tenagaKerja->angkatan_kerja }}</td>
                    <td>{{ $tenagaKerja->pengangguran }}</td>
                    <td>{{ $tenagaKerja->bkn_angkatan_kerja }}</td>
                    <td>{{ $tenagaKerja->sekolah }}</td>
                    <td>{{ $tenagaKerja->urus_ruta }}</td>
                    <td>{{ $tenagaKerja->tpak }}</td>
                    <td>{{ $tenagaKerja->tkk }}</td>
                    <td>{{ $tenagaKerja->tpt }}</td>
                    <td>{{ $tenagaKerja->lainnya }}</td>
                    <td>{{ $tenagaKerja->gender }}</td>
                    <td>{{ $tenagaKerja->created }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['tenagaKerjas.destroy', $tenagaKerja->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('tenagaKerjas.show', [$tenagaKerja->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('tenagaKerjas.edit', [$tenagaKerja->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $tenagaKerjas])
        </div>
    </div>
</div>
