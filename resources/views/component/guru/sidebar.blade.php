<div class="l-sidebar">
    <div class="logo">
        <img src="../img/sma1.jpg"  width="35" class="">
        <div class="text-logo" style="animation-delay: 1s">
            <span>BK SMERTI</span>
        </div>
    </div>

    <div class="l-sidebar__content">
        <nav class="c-menu js-menu">
            <ul class="u-list">

                <li class="c-menu__item {{ request()->is('home*', 'ubah-pass*') ? 'is-active' : '' }} has-submenu"
                    data-toggle="tooltip" title="Dashboard">
                    <a class="c-menu__item__inner" href="/home">
                        <div class="ic">
                            <i class='fas fa-tachometer-alt text-light'></i>
                        </div>
                        <div class="c-menu-item__title"><span>Dasbor</span></div>
                    </a>
                </li>

                <li class="c-menu__item {{ request()->is('guru/daftar-siswa*') ? 'is-active' : '' }} has-submenu"
                    data-toggle="tooltip" title="Daftar Siswa">
                    <a class="c-menu__item__inner" href="/guru/daftar-siswa">
                        <div class="ic">
                            <i class="fas fa-exclamation-triangle text-dange"></i>
                        </div>
                        <div class="c-menu-item__title"><span>Pelanggaran</span></div>
                    </a>
                </li>
                <li class="c-menu__item {{ request()->is('guru/penanganan*') ? 'is-active' : '' }} has-submenu"
                    data-toggle="tooltip" title="Penanganan">
                    <a class="c-menu__item__inner" href="/guru/penanganan">
                        <div class="ic">
                            <i class="fas fa-gavel text-light"></i>
                        </div>
                        <div class="c-menu-item__title"><span>Penanganan</span></div>
                    </a>
                </li>
            </ul>

        </nav>
    </div>
</div>
