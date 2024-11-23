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
                        <div class="c-menu-item__title"><span>Dasbor</span></div>
                    </a>
                </li>
                {{-- pelanggaran --}}
                <li class="c-menu__item {{ request()->is('osis/daftar-siswa*', 'osis/pelanggaran*') ? 'is-active' : '' }} has-submenu"
                    data-toggle="tooltip" title="Daftar Siswa">
                    <a class="c-menu__item__inner" href="/osis/daftar-siswa">
                        <div class="ic">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="c-menu-item__title">
                            <span>Pelanggaran</span>
                        </div>
                    </a>
                </li>
            </ul>

        </nav>
    </div>
</div>
