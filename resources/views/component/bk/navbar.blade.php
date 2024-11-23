<header class="l-header">
    <div class="l-header__inner clearfix">
        <div class="c-header-icon lol logo" style="border-left: 0; border-right: 1px solid #fff;">
            <img src="../img/sma1.jpg" width="35">
        </div>

        <div class="c-title">
            <h1>@yield('title')</h1>
        </div>

        <div class="ms-auto navbar-nav">
            <!-- Authentication Links -->
            <div class="nav-item dropdown px-3">
                <a id="navbarDropdown" class="name-tag nav-link dropdown-toggle c-header-icon userDropdown me-2"
                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    v-pre>
                    <div class="text-small d-inline-flex ms-1">{{ strtok(auth()->user()->name, ' ') }}</div>
                </a>

                <div class="dropdown-menu dropdown-menu-end me-2" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item py-2" href="/bk/edit-pass">
                        {{ __('Ubah Password') }}
                    </a>

                    <a class="dropdown-item py-2" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <div class="none c-header-icon-hp">
            <i class='bx bx-menu-alt-right' id="btn"></i>
        </div>

    </div>
</header>

<input type="checkbox" id="checki" class="ch">
<ul class="hp-ul" for=checki style="z-index: 1;">
    <a href="/home">
        <li class="{{ request()->is('home*') ? 'active' : '' }} hp-li" title="Dashboard">
            <i class='bx bxs-grid-alt'></i>
            Dasbor
        </li>
    </a>
    <a href="/master-user">
        <li class="{{ request()->is('master-user*') ? 'active' : '' }} hp-li" title="Master User">
            <i class="fas fa-users"></i>
            Pengguna
        </li>
    </a>
    <a href="/master-guru">
        <li class="{{ request()->is('master-guru*') ? 'active' : '' }} hp-li" title="Master Guru">
            <i class="fas fa-user-tie"></i>
            Data Guru
        </li>
    </a>
    <a href="/master-kelas">
        <li class="{{ request()->is('master-kelas*') ? 'active' : '' }} hp-li" title="Master Kelas">
            <i class='fas fa-user-graduate'></i>
            Data Kelas
        </li>
    </a>
    <a href="/master-siswa">
        <li class="{{ request()->is('master-siswa*', 'pelanggaran*') ? 'active' : '' }} hp-li" title="Master Siswa">
            <i class='fas fa-user-graduate'></i>
            Data Siswa
        </li>
    </a>

    <a href="/master-histori">
        <li class="{{ request()->is('master-histori*') ? 'active' : '' }} hp-li" title="Master Histori">
            <i class="fas fa-calendar-alt"></i>
            Data Histori
        </li>
    </a>
    <a href="/penanganan">
        <li class="{{ request()->is('penanganan*') ? 'active' : '' }} hp-li" title="Penanganan">
            <i class="fas fa-user-cog"></i>
            Penanganan
        </li>
    </a>
    <a href="/master-peraturan">
        <li class="{{ request()->is('master-peraturan*') ? 'active' : '' }} hp-li" title="Master Peraturan">
            <i class='fas fa-user-graduate'></i>
            Peraturan
        </li>
    </a>
</ul>
