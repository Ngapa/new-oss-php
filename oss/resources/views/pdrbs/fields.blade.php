<!-- Kategori Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori_id', 'Kategori Id:') !!}
    {!! Form::number('kategori_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- A Field -->
<div class="form-group col-sm-6">
    {!! Form::label('a', 'A:') !!}
    {!! Form::number('a', null, ['class' => 'form-control']) !!}
</div>

<!-- B Field -->
<div class="form-group col-sm-6">
    {!! Form::label('b', 'B:') !!}
    {!! Form::number('b', null, ['class' => 'form-control']) !!}
</div>

<!-- C Field -->
<div class="form-group col-sm-6">
    {!! Form::label('c', 'C:') !!}
    {!! Form::number('c', null, ['class' => 'form-control']) !!}
</div>

<!-- D Field -->
<div class="form-group col-sm-6">
    {!! Form::label('d', 'D:') !!}
    {!! Form::number('d', null, ['class' => 'form-control']) !!}
</div>

<!-- E Field -->
<div class="form-group col-sm-6">
    {!! Form::label('e', 'E:') !!}
    {!! Form::number('e', null, ['class' => 'form-control']) !!}
</div>

<!-- F Field -->
<div class="form-group col-sm-6">
    {!! Form::label('f', 'F:') !!}
    {!! Form::number('f', null, ['class' => 'form-control']) !!}
</div>

<!-- G Field -->
<div class="form-group col-sm-6">
    {!! Form::label('g', 'G:') !!}
    {!! Form::number('g', null, ['class' => 'form-control']) !!}
</div>

<!-- H Field -->
<div class="form-group col-sm-6">
    {!! Form::label('h', 'H:') !!}
    {!! Form::number('h', null, ['class' => 'form-control']) !!}
</div>

<!-- I Field -->
<div class="form-group col-sm-6">
    {!! Form::label('i', 'I:') !!}
    {!! Form::number('i', null, ['class' => 'form-control']) !!}
</div>

<!-- J Field -->
<div class="form-group col-sm-6">
    {!! Form::label('j', 'J:') !!}
    {!! Form::number('j', null, ['class' => 'form-control']) !!}
</div>

<!-- K Field -->
<div class="form-group col-sm-6">
    {!! Form::label('k', 'K:') !!}
    {!! Form::number('k', null, ['class' => 'form-control']) !!}
</div>

<!-- L Field -->
<div class="form-group col-sm-6">
    {!! Form::label('l', 'L:') !!}
    {!! Form::number('l', null, ['class' => 'form-control']) !!}
</div>

<!-- M N Field -->
<div class="form-group col-sm-6">
    {!! Form::label('m_n', 'M N:') !!}
    {!! Form::number('m_n', null, ['class' => 'form-control']) !!}
</div>

<!-- O Field -->
<div class="form-group col-sm-6">
    {!! Form::label('o', 'O:') !!}
    {!! Form::number('o', null, ['class' => 'form-control']) !!}
</div>

<!-- P Field -->
<div class="form-group col-sm-6">
    {!! Form::label('p', 'P:') !!}
    {!! Form::number('p', null, ['class' => 'form-control']) !!}
</div>

<!-- Q Field -->
<div class="form-group col-sm-6">
    {!! Form::label('q', 'Q:') !!}
    {!! Form::number('q', null, ['class' => 'form-control']) !!}
</div>

<!-- R S T U Field -->
<div class="form-group col-sm-6">
    {!! Form::label('r_s_t_u', 'R S T U:') !!}
    {!! Form::number('r_s_t_u', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Pdrb Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_pdrb', 'Total Pdrb:') !!}
    {!! Form::number('total_pdrb', null, ['class' => 'form-control']) !!}
</div>

<!-- Created Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created', 'Created:') !!}
    {!! Form::text('created', null, ['class' => 'form-control','id'=>'created']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#created').datepicker()
    </script>
@endpush