<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="penduduks-table">
            <thead>
            <tr>
                <th>A</th>
                <th>B</th>
                <th>C</th>
                <th>D</th>
                <th>E</th>
                <th>F</th>
                <th>G</th>
                <th>H</th>
                <th>I</th>
                <th>J</th>
                <th>K</th>
                <th>L</th>
                <th>M</th>
                <th>N</th>
                <th>O</th>
                <th>P</th>
                <th>Total</th>
                <th>Created</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($penduduks as $penduduk)
                <tr>
                    <td>{{ $penduduk->a }}</td>
                    <td>{{ $penduduk->b }}</td>
                    <td>{{ $penduduk->c }}</td>
                    <td>{{ $penduduk->d }}</td>
                    <td>{{ $penduduk->e }}</td>
                    <td>{{ $penduduk->f }}</td>
                    <td>{{ $penduduk->g }}</td>
                    <td>{{ $penduduk->h }}</td>
                    <td>{{ $penduduk->i }}</td>
                    <td>{{ $penduduk->j }}</td>
                    <td>{{ $penduduk->k }}</td>
                    <td>{{ $penduduk->l }}</td>
                    <td>{{ $penduduk->m }}</td>
                    <td>{{ $penduduk->n }}</td>
                    <td>{{ $penduduk->o }}</td>
                    <td>{{ $penduduk->p }}</td>
                    <td>{{ $penduduk->total }}</td>
                    <td>{{ $penduduk->created }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['penduduks.destroy', $penduduk->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('penduduks.show', [$penduduk->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('penduduks.edit', [$penduduk->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $penduduks])
        </div>
    </div>
</div>
