<!-- Sembako Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sembako', 'Sembako:') !!}
    {!! Form::number('sembako', null, ['class' => 'form-control']) !!}
</div>

<!-- Sandang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sandang', 'Sandang:') !!}
    {!! Form::number('sandang', null, ['class' => 'form-control']) !!}
</div>

<!-- Perumahan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('perumahan', 'Perumahan:') !!}
    {!! Form::number('perumahan', null, ['class' => 'form-control']) !!}
</div>

<!-- Perlengkapan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('perlengkapan', 'Perlengkapan:') !!}
    {!! Form::number('perlengkapan', null, ['class' => 'form-control']) !!}
</div>

<!-- Kesehatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kesehatan', 'Kesehatan:') !!}
    {!! Form::number('kesehatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Transportasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transportasi', 'Transportasi:') !!}
    {!! Form::number('transportasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Informasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('informasi', 'Informasi:') !!}
    {!! Form::number('informasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Rekreasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rekreasi', 'Rekreasi:') !!}
    {!! Form::number('rekreasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Pendidikan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pendidikan', 'Pendidikan:') !!}
    {!! Form::number('pendidikan', null, ['class' => 'form-control']) !!}
</div>

<!-- Penyedia Pangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penyedia_pangan', 'Penyedia Pangan:') !!}
    {!! Form::number('penyedia_pangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Perawatan Pribadi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('perawatan_pribadi', 'Perawatan Pribadi:') !!}
    {!! Form::number('perawatan_pribadi', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Inflasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_inflasi', 'Total Inflasi:') !!}
    {!! Form::number('total_inflasi', null, ['class' => 'form-control']) !!}
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