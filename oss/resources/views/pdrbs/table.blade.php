<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="pdrbs-table">
            <thead>
            <tr>
                <th>Kategori Id</th>
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
                <th>M N</th>
                <th>O</th>
                <th>P</th>
                <th>Q</th>
                <th>R S T U</th>
                <th>Total Pdrb</th>
                <th>Created</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pdrbs as $pdrb)
                <tr>
                    <td>{{ $pdrb->kategori_id }}</td>
                    <td>{{ $pdrb->a }}</td>
                    <td>{{ $pdrb->b }}</td>
                    <td>{{ $pdrb->c }}</td>
                    <td>{{ $pdrb->d }}</td>
                    <td>{{ $pdrb->e }}</td>
                    <td>{{ $pdrb->f }}</td>
                    <td>{{ $pdrb->g }}</td>
                    <td>{{ $pdrb->h }}</td>
                    <td>{{ $pdrb->i }}</td>
                    <td>{{ $pdrb->j }}</td>
                    <td>{{ $pdrb->k }}</td>
                    <td>{{ $pdrb->l }}</td>
                    <td>{{ $pdrb->m_n }}</td>
                    <td>{{ $pdrb->o }}</td>
                    <td>{{ $pdrb->p }}</td>
                    <td>{{ $pdrb->q }}</td>
                    <td>{{ $pdrb->r_s_t_u }}</td>
                    <td>{{ $pdrb->total_pdrb }}</td>
                    <td>{{ $pdrb->created }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['pdrbs.destroy', $pdrb->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('pdrbs.show', [$pdrb->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('pdrbs.edit', [$pdrb->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $pdrbs])
        </div>
    </div>
</div>
