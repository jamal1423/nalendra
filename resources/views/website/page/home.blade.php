@extends('website.layout.main')

@section('content')
    <div class="mobile_header">
        <div class="inn-sub-header">
            <div class="logo">
                <a href="#"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Foholic Header Logo" class="img-fluid"></a> 
            </div>
            <div class="foholic-menubar">
                <div class="menu-ic">
                    <div class="line-menu line-half first-line"></div>
                    <div class="line-menu"></div>
                    <div class="line-menu line-half last-line"></div>
                </div>          
            </div>
        </div>
    </div>
    <section class="foholic_slider slider-style" id="home">
        <h1 class="d-none">Hidden</h1>
        <div class="swiper-container">
            <div class="swiper-wrapper">

                @foreach($dataSlider as $slider)
                <div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="slide-bg-image" style="background-image: url(gambar-slider/{{$slider->gambar_slider}});"></div>
                        <div class="parallax-overlay"></div>
                        <div class="slider_shape_img1">
                            <img src="assets/images/svg/shape-img1.svg" alt="shape-img1 img">
                        </div>
                        <div class="slider_shape_img2">
                            <img src="assets/images/svg/shape-img2.svg" alt="shape-img2 img">
                        </div>
                        <div class="container">
                            <div class="slide_inn_content text-center wow fadeIn" data-wow-duration="3s" data-wow-delay=".4s">
                                <span>Selamat Datang di Nalendra Cafe & Resto</span>
                                <div class="slide_title col-12 col-lg-10 col-md-12 m-auto"> {{ $slider->deskripsi }} </div>
                                <div class="foholic_button">
                                    <a href="#reservation" class="button-light">Reservasi Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- end slider section -->

    <!-- start menu section -->
    <section class="foholic_menu" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="table_menu wow fadeIn" data-wow-duration="2s" data-wow-delay=".4s">
                        <h6 class="dark_head">Daftar Menu Makanan & Minuman</h6>
                        <p>Kami menyediakan berbagai macam makanan dan minuman yang sengat menggugah seleran Anda semua. Silahkan pilih menu makanan dan minuman yang telah tersedia.</p>
                        <img src="assets/images/menu/menu-post1.png" alt="menu-post1" class="img-fluid">
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-6 wow fadeIn" data-wow-duration="2s" data-wow-delay=".4s">
                    <nav class="menu_nav">
                        <div class="food_menu_item nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="navs-tabs active" id="nav-makanan-tab" data-bs-toggle="tab" data-bs-target="#nav-makanan" type="button" role="tab" aria-controls="nav-makanan" aria-selected="true">Makanan</button>
                            <button class="navs-tabs" id="nav-minuman-tab" data-bs-toggle="tab" data-bs-target="#nav-minuman" type="button" role="tab" aria-controls="nav-minuman" aria-selected="false">Minuman</button>
                            <button class="navs-tabs" id="nav-snack-tab" data-bs-toggle="tab" data-bs-target="#nav-snack" type="button" role="tab" aria-controls="nav-snack" aria-selected="false">Snack</button>
                        </div>
                    </nav>
                    <div class="menu_content tab-content" id="nav-tabContent">
                        <div class="menu-visible tab-pane fade show active" id="nav-makanan" role="tabpanel" aria-labelledby="nav-makanan-tab">
                            <div class="menu_wrappe">
                                @foreach($daftarMakanan as $makanan)
                                <div class="dish_title d-flex">
                                    <span style="text-transform:capitalize;"> {{ $makanan->nama_barang }} </span>
                                    <div class="item-divider"></div>
                                    <span class="food_price" style="text-transform:capitalize;">Rp. {{ number_format($makanan->harga_barang) }} </span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="menu-visible tab-pane fade" id="nav-minuman" role="tabpanel" aria-labelledby="nav-minuman-tab">
                            <div class="menu_wrappe">
                                @foreach($daftarMinuman as $minuman)
                                <div class="dish_title d-flex">
                                    <span style="text-transform:capitalize;"> {{ $minuman->nama_barang }} </span>
                                    <div class="item-divider"></div>
                                    <span class="food_price" style="text-transform:capitalize;">Rp. {{ number_format($minuman->harga_barang) }} </span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="menu-visible tab-pane fade" id="nav-snack" role="tabpanel" aria-labelledby="nav-snack-tab">
                            <div class="menu_wrappe">
                                @foreach($daftarSnack as $snack)
                                <div class="dish_title d-flex">
                                    <span style="text-transform:capitalize;"> {{ $snack->nama_barang }} </span>
                                    <div class="item-divider"></div>
                                    <span class="food_price" style="text-transform:capitalize;">Rp. {{ number_format($snack->harga_barang) }} </span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end menu section -->

    <!-- start gallery section -->
    <section class="foholic_gallery" id="gallery">
        <h2 class="d-none">hidden</h2>
        <div class="container">
            <div class="divide_gallery text-center">
                <div class="foholic_title dark_head wow fadeInDown" data-wow-duration="1.2s" data-wow-delay=".2s">Galeri</div>
            </div>

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach($dataGaleri as $galeri)
                    <div class="col-12 col-md-4 col-lg-4 swiper-slide">
                        <div class="photo_gallery">
                            <div class="gallery_img hover-effect-img">
                                <div class="hover-icons">
                                    <a href="{{ asset('/galeri/'.$galeri->gambar_galeri) }}" class="ic-plus"><i class="fa-solid fa-plus"></i></a>
                                </div>
                                <div class="inside-img swipe_gallery_img">
                                    <img src="{{ asset('/galeri/'.$galeri->gambar_galeri) }}" alt="gallery-img-1" class="img-fluid">
                                </div>
                                <div class="hover-effect the-team"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-prev"><i class="fa-solid fa-angle-left"></i></div>
                <div class="swiper-button-next"><i class="fa-solid fa-angle-right"></i></div>
            </div>
        </div>
    </section>
    <!-- end gallery section -->

    <!-- start location section -->
    <section class="foholic-location text-center" id="reservation">
        <div class="container">
            <h3 class="location-title dark_head wow fadeInDown" data-wow-duration="1.2s" data-wow-delay=".2s">Lokasi Kami</h3>
            <div class="foholic_map wow fadeIn" data-wow-duration="3s" data-wow-delay=".4s">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d493.2941882621741!2d114.17104385122886!3d-8.464962499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd3ffd5c1cdb4f9%3A0x877c97568cfef19d!2sNALENDRA%20Cafe%20and%20Resto!5e0!3m2!1sen!2sid!4v1659971835170!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- end location section -->

    <!-- start footer section -->
    <footer class="footer-area text-center" id="footer">
        <div class="parallax-overlay"></div>
        <div class="background-shape1">
            <img src="assets/images/svg/background-shape1.svg" alt="background-shape1 img">
        </div>
        <div class="background-shape2">
            <img src="assets/images/svg/background-shape2.svg" alt="background-shape2 img">
        </div>
        <div class="container">
            <h4 class="wow fadeInDown" data-wow-duration="1.2s" data-wow-delay=".2s">Hubungi Kami</h4>
            <div class="row wow fadeIn" data-wow-duration="2s" data-wow-delay=".3s">
                @foreach($dataKontak as $kontak)
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="location-info">
                        <img src="assets/images/footer/location.png" alt="location-ic" class="img-fluid">
                        <p style="text-transform:capitalize;"> {{ $kontak->alamat }} </p>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="location-info">
                        <img src="assets/images/footer/call-info.png" alt="call-info-ic" class="img-fluid">
                        <p style="text-transform:capitalize;"><a href="tel:{{ $kontak->no_wa }}">  {{ $kontak->no_wa   }} </a></p>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="location-info">
                        <img src="assets/images/footer/message.png" alt="message-ic" class="img-fluid">
                        <p style="text-transform:lowercase;">{{ $kontak->email   }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="sub-footer text-center wow fadeIn" data-wow-duration="3s" data-wow-delay=".4s">
                <span style="text-transform:capitalize;"><strong id="nowYear"></strong> &copy; Nalendra. All rights reserved.</span>
            </div>
        </div>
    </footer>
@endsection
