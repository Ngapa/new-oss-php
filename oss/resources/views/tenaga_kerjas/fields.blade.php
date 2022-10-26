<!-- Angkatan Kerja Field -->
<div class="form-group col-sm-6">
    {!! Form::label('angkatan_kerja', 'Angkatan Kerja:') !!}
    {!! Form::number('angkatan_kerja', null, ['class' => 'form-control']) !!}
</div>

<!-- Pengangguran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pengangguran', 'Pengangguran:') !!}
    {!! Form::number('pengangguran', null, ['class' => 'form-control']) !!}
</div>

<!-- Bkn Angkatan Kerja Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bkn_angkatan_kerja', 'Bkn Angkatan Kerja:') !!}
    {!! Form::number('bkn_angkatan_kerja', null, ['class' => 'form-control']) !!}
</div>

<!-- Sekolah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sekolah', 'Sekolah:') !!}
    {!! Form::number('sekolah', null, ['class' => 'form-control']) !!}
</div>

<!-- Urus Ruta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('urus_ruta', 'Urus Ruta:') !!}
    {!! Form::number('urus_ruta', null, ['class' => 'form-control']) !!}
</div>

<!-- Tpak Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tpak', 'Tpak:') !!}
    {!! Form::number('tpak', null, ['class' => 'form-control']) !!}
</div>

<!-- Tkk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tkk', 'Tkk:') !!}
    {!! Form::number('tkk', null, ['class' => 'form-control']) !!}
</div>

<!-- Tpt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tpt', 'Tpt:') !!}
    {!! Form::number('tpt', null, ['class' => 'form-control']) !!}
</div>

<!-- Lainnya Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lainnya', 'Lainnya:') !!}
    {!! Form::number('lainnya', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::text('gender', null, ['class' => 'form-control', 'required']) !!}
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