<!-- Nama Kota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_kota', 'Nama Kota:') !!}
    {!! Form::text('nama_kota', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Mtom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtom', 'Mtom:') !!}
    {!! Form::number('mtom', null, ['class' => 'form-control']) !!}
</div>

<!-- Ytod Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ytod', 'Ytod:') !!}
    {!! Form::number('ytod', null, ['class' => 'form-control']) !!}
</div>

<!-- Ytoy Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ytoy', 'Ytoy:') !!}
    {!! Form::number('ytoy', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
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