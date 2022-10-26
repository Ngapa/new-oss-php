<!-- Tpak Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tpak', 'Tpak:') !!}
    {!! Form::number('tpak', null, ['class' => 'form-control']) !!}
</div>

<!-- Tpt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tpt', 'Tpt:') !!}
    {!! Form::number('tpt', null, ['class' => 'form-control']) !!}
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