<header class="foholic-fixed-sidebar sidebar-right" id="header">
    <div class="header-container">
        <div class="menu-wrap">
            <div class="header-logo">
                <a href="index-2.html"><img src="assets/images/logo/logo.png" alt="Foholic Header Logo" class="img-fluid"></a>
            </div>
            <nav class="fixed-menu-wrap" id="top-nav">
                <ul class="navbar-navs">
                    <li class="menu-list"><a class="nav-links active" href="#home">Home</a></li>
                    <li class="menu-list"><a class="nav-links" href="#menu">Menu</a></li>
                    <li class="menu-list"><a class="nav-links" href="#gallery">Galeri</a></li>
                    <li class="menu-list"><a class="nav-links" href="#reservation">Kontak</a></li>
                </ul>
            </nav>
            <div class="menu-table">
                <span class="table-detail">Reservasi Disini</span>
                <div class="booking-number"><a href="tel:{{ $kontak->no_wa }}">{{ $kontak->no_wa }}</a></div>
            </div>
            <div class="foholic-social-ic">
                <a href="{{ $kontak->link_fb }}" class="social-ic" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="{{ $kontak->link_ig }}" class="social-ic" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </div>
</header>