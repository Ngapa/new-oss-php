<!-- Kecamatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kecamatan', 'Kecamatan:') !!}
    {!! Form::text('kecamatan', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Lk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lk', 'Lk:') !!}
    {!! Form::number('lk', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Pr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pr', 'Pr:') !!}
    {!! Form::number('pr', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Rasio Jk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rasio_jk', 'Rasio Jk:') !!}
    {!! Form::number('rasio_jk', null, ['class' => 'form-control', 'required']) !!}
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