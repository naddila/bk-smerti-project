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

                <li class="c-menu__item {{ request()->is('home*', 'ubah-pass*') ? 'is-active' : '' }}  has-submenu"
                    data-toggle="tooltip" title="Dashboard">
                    <a class="c-menu__item__inner" href="/home">
                        <div class="ic">
                            <i class='fas fa-tachometer-alt text-light'></i>
                        </div>
                        <div class="c-menu-item__title"><span>Dasbor</span></div>
                    </a>
                </li>

                <li class="c-menu__item {{ request()->is('pesan*') ? 'is-active' : '' }}  has-submenu"
                    data-toggle="tooltip" title="Pesan">
                    <a class="c-menu__item__inner" href="/pesan">
                        <div class="ic">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="c-menu-item__title"><span>Sanksi</span></div>
                    </a>
                </li>

                <li class="c-menu__item {{ request()->is('histori*') ? 'is-active' : '' }}  has-submenu"
                    data-toggle="tooltip" title="Histori">
                    <a class="c-menu__item__inner" href="/histori">
                        <div class="ic">
                            <i class="fas fa-history text-light"></i>
                        </div>
                        <div class="c-menu-item__title"><span>Pelanggaran</span></div>
                    </a>
                </li>
            </ul>

        </nav>
    </div>
</div>
