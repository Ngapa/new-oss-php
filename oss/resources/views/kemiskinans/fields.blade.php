<!-- Pddk Mskn Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pddk_mskn', 'Pddk Mskn:') !!}
    {!! Form::number('pddk_mskn', null, ['class' => 'form-control']) !!}
</div>

<!-- P0 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('p0', 'P0:') !!}
    {!! Form::number('p0', null, ['class' => 'form-control']) !!}
</div>

<!-- P1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('p1', 'P1:') !!}
    {!! Form::number('p1', null, ['class' => 'form-control']) !!}
</div>

<!-- P2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('p2', 'P2:') !!}
    {!! Form::number('p2', null, ['class' => 'form-control']) !!}
</div>

<!-- Gk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gk', 'Gk:') !!}
    {!! Form::number('gk', null, ['class' => 'form-control']) !!}
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