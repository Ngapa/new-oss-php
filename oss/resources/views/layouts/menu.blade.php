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
