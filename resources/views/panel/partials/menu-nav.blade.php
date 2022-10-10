<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{Request::is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Master</li><!-- /.menu-title -->
                <li class="menu-item-has-children {{Request::is('dashboard/slider') ? 'active' : '' }}">
                    <a href="/dashboard/slider"> <i class="menu-icon fa fa-tasks"></i>Slider</a>
                </li>
                <li class="menu-item-has-children {{Request::is('dashboard/data-menu') ? 'active' : '' }}">
                    <a href="/dashboard/data-menu"> <i class="menu-icon fa fa-table"></i>Data Menu</a>
                </li>
                <li class="menu-item-has-children {{Request::is('dashboard/galeri') ? 'active' : '' }}">
                    <a href="/dashboard/galeri"> <i class="menu-icon fa fa-th"></i>Galeri</a>
                </li>

                <li class="menu-title">Pengaturan</li><!-- /.menu-title -->
                <li class="menu-item-has-children {{Request::is('dashboard/data-kontak') ? 'active' : '' }}">
                    <a href="/dashboard/data-kontak"> <i class="menu-icon fa fa-book"></i>Kontak</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>