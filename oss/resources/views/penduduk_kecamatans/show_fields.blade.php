<!-- Kecamatan Field -->
<div class="col-sm-12">
    {!! Form::label('kecamatan', 'Kecamatan:') !!}
    <p>{{ $pendudukKecamatan->kecamatan }}</p>
</div>

<!-- Lk Field -->
<div class="col-sm-12">
    {!! Form::label('lk', 'Lk:') !!}
    <p>{{ $pendudukKecamatan->lk }}</p>
</div>

<!-- Pr Field -->
<div class="col-sm-12">
    {!! Form::label('pr', 'Pr:') !!}
    <p>{{ $pendudukKecamatan->pr }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-12">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $pendudukKecamatan->total }}</p>
</div>

<!-- Rasio Jk Field -->
<div class="col-sm-12">
    {!! Form::label('rasio_jk', 'Rasio Jk:') !!}
    <p>{{ $pendudukKecamatan->rasio_jk }}</p>
</div>

<!-- Created Field -->
<div class="col-sm-12">
    {!! Form::label('created', 'Created:') !!}
    <p>{{ $pendudukKecamatan->created }}</p>
</div>

