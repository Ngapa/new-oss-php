<!-- Uhh Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uhh', 'Uhh:') !!}
    {!! Form::number('uhh', null, ['class' => 'form-control']) !!}
</div>

<!-- Rls Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rls', 'Rls:') !!}
    {!! Form::number('rls', null, ['class' => 'form-control']) !!}
</div>

<!-- Hls Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hls', 'Hls:') !!}
    {!! Form::number('hls', null, ['class' => 'form-control']) !!}
</div>

<!-- Ppp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ppp', 'Ppp:') !!}
    {!! Form::number('ppp', null, ['class' => 'form-control']) !!}
</div>

<!-- Ipm Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ipm', 'Ipm:') !!}
    {!! Form::number('ipm', null, ['class' => 'form-control']) !!}
</div>

<!-- Pertumbuhan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pertumbuhan', 'Pertumbuhan:') !!}
    {!! Form::number('pertumbuhan', null, ['class' => 'form-control']) !!}
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