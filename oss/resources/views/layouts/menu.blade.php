<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('inflasis.index') }}" class="nav-link {{ Request::is('inflasis*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Inflasis</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('inflasiKlmpkPengeluarans.index') }}" class="nav-link {{ Request::is('inflasiKlmpkPengeluarans*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Inflasi Klmpk Pengeluarans</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('kategoris.index') }}" class="nav-link {{ Request::is('kategoris*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Kategoris</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('pdrbs.index') }}" class="nav-link {{ Request::is('pdrbs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Pdrbs</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tenagaKerjas.index') }}" class="nav-link {{ Request::is('tenagaKerjas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Tenaga Kerjas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('kemiskinans.index') }}" class="nav-link {{ Request::is('kemiskinans*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Kemiskinans</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('ipms.index') }}" class="nav-link {{ Request::is('ipms*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Ipms</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('penduduks.index') }}" class="nav-link {{ Request::is('penduduks*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Penduduks</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('pendudukKecamatans.index') }}" class="nav-link {{ Request::is('pendudukKecamatans*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Penduduk Kecamatans</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('inflasiKotas.index') }}" class="nav-link {{ Request::is('inflasiKotas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Inflasi Kotas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('ketimpangans.index') }}" class="nav-link {{ Request::is('ketimpangans*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Ketimpangans</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('penganggurans.index') }}" class="nav-link {{ Request::is('penganggurans*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Penganggurans</p>
    </a>
</li>
