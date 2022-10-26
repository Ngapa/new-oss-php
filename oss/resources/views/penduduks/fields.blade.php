<!-- A Field -->
<div class="form-group col-sm-6">
    {!! Form::label('a', 'A:') !!}
    {!! Form::number('a', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- B Field -->
<div class="form-group col-sm-6">
    {!! Form::label('b', 'B:') !!}
    {!! Form::number('b', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- C Field -->
<div class="form-group col-sm-6">
    {!! Form::label('c', 'C:') !!}
    {!! Form::number('c', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- D Field -->
<div class="form-group col-sm-6">
    {!! Form::label('d', 'D:') !!}
    {!! Form::number('d', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- E Field -->
<div class="form-group col-sm-6">
    {!! Form::label('e', 'E:') !!}
    {!! Form::number('e', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- F Field -->
<div class="form-group col-sm-6">
    {!! Form::label('f', 'F:') !!}
    {!! Form::number('f', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- G Field -->
<div class="form-group col-sm-6">
    {!! Form::label('g', 'G:') !!}
    {!! Form::number('g', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- H Field -->
<div class="form-group col-sm-6">
    {!! Form::label('h', 'H:') !!}
    {!! Form::number('h', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- I Field -->
<div class="form-group col-sm-6">
    {!! Form::label('i', 'I:') !!}
    {!! Form::number('i', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- J Field -->
<div class="form-group col-sm-6">
    {!! Form::label('j', 'J:') !!}
    {!! Form::number('j', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- K Field -->
<div class="form-group col-sm-6">
    {!! Form::label('k', 'K:') !!}
    {!! Form::number('k', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- L Field -->
<div class="form-group col-sm-6">
    {!! Form::label('l', 'L:') !!}
    {!! Form::number('l', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- M Field -->
<div class="form-group col-sm-6">
    {!! Form::label('m', 'M:') !!}
    {!! Form::number('m', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- N Field -->
<div class="form-group col-sm-6">
    {!! Form::label('n', 'N:') !!}
    {!! Form::number('n', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- O Field -->
<div class="form-group col-sm-6">
    {!! Form::label('o', 'O:') !!}
    {!! Form::number('o', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- P Field -->
<div class="form-group col-sm-6">
    {!! Form::label('p', 'P:') !!}
    {!! Form::number('p', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control', 'required']) !!}
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