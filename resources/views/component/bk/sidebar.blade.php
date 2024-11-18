<div class="l-sidebar">
    <div class="logo">
        <img src="../img/sma1.jpg" width="35" class="">
        <div class="text-logo" style="animation-delay: 1s">
            <span>BK SMERTI</span>
        </div>
    </div>

    <div class="l-sidebar__content">
        <nav class="c-menu js-menu">
            <ul class="u-list">
                {{-- dashboard --}}
                <li class="c-menu__item {{ request()->is('home*') ? 'is-active' : '' }} has-submenu"
                    data-toggle="tooltip" title="Dashboard">
                    <a class="c-menu__item__inner" href="/home">
                        <div class="ic">
                            <i class='bx bxs-grid-alt'></i>
                        </div>
                        <div class="c-menu-item__title">
                            <span>Dasbor</span>
                        </div>
                    </a>
                </li>

                {{-- master user --}}
                <li class="c-menu__item {{ request()->is('master-user*') ? 'is-active' : '' }} has-submenu"
                    data-toggle="tooltip" title="Master User">
                    <a class="c-menu__item__inner" href="/master-user">
                        <div class="ic">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="c-menu-item__title">
                            <span>Pengguna</span>
                        </div>
                    </a>
                </li>

                {{-- master guru --}}
                <li class="c-menu__item {{ request()->is('master-guru*') ? 'is-active' : '' }} has-submenu"
                    data-toggle="tooltip" title="Master Guru">
                    <a class="c-menu__item__inner" href="/master-guru">
                        <div class="ic">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="c-menu-item__title">
                            <span>Data Guru</span>
                        </div>
                    </a>
                </li>

                {{-- master kelas --}}
                <li class="c-menu__item {{ request()->is('master-kelas*') ? 'is-active' : '' }} has-submenu"
                    data-toggle="tooltip" title="Master Kelas">
                    <a class="c-menu__item__inner" href="/master-kelas">
                        <div class="ic">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="c-menu-item__title">
                            <span>Data Kelas</span>
                        </div>
                    </a>
                </li>

                {{-- master siswa --}}
                <li class="c-menu__item {{ request()->is('master-siswa*', 'pelanggaran*') ? 'is-active' : '' }} has-submenu"
                    data-toggle="tooltip" title="Master Siswa">
                    <a class="c-menu__item__inner" href="/master-siswa">
                        <div class="ic">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="c-menu-item__title">
                            <span>Data Siswa</span>
                        </div>
                    </a>
                </li>

                {{-- master histori --}}
                <li class="c-menu__item {{ request()->is('master-histori*') ? 'is-active' : '' }} has-submenu"
                    data-toggle="tooltip" title="Master Histori">
                    <a class="c-menu__item__inner" href="/master-histori">
                        <div class="ic">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="c-menu-item__title">
                            <span>Data Histori</span>
                        </div>
                    </a>
                </li>

                 {{-- master penanganan --}}
                <li class="c-menu__item {{ request()->is('penanganan*') ? 'is-active' : '' }} has-submenu"
                    data-toggle="tooltip" title="Penanganan">
                    <a class="c-menu__item__inner" href="/penanganan">
                        <div class="ic">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="c-menu-item__title">
                            <span>Penanganan</span>
                        </div>
                    </a>
                </li>

                {{-- master peraturan --}}
                <li class="c-menu__item {{ request()->is('master-peraturan*') ? 'is-active' : '' }} has-submenu"
                    data-toggle="tooltip" title="Peraturan">
                    <a class="c-menu__item__inner" href="/master-peraturan">
                        <div class="ic">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="c-menu-item__title">
                            <span>Peraturan</span>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
