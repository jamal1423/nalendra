<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nalendra Cafe and Resto</title>
    <link href="{{ asset('assets/images/logo/fav-icon.png') }}" rel="icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/all.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/swiper.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/media-query.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/floating-whatsapp.css') }}"/>

    <style>
        @media(max-width:820px)
		{
			.jarak-bawah-mobile
			{
				margin-bottom:-15px;
			}	
		}
        @media(min-width:870px)
		{
			.jarak-bawah-desktop
            {
                margin-bottom:75px;
            }	
		}
        
    </style>
</head>

<body>

    <!-- Preloader -->
    <div class="preloader">
        <div class="loader">
            <div class="box">
                <div class="box-inner-1">
                    <div class="box-1"></div>
                    <div class="box-2"></div>
                </div>
                <div class="box-inner-2">
                    <div class="box-3"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Preloader -->

    <!-- Page Wrapper -->
    <div id="main-wrap">
        <!-- start sidebar header -->
        @include('website.partials.header')
        <!-- end sidebar header -->

        <!-- start content -->
        <div class="foholic_content">
            @yield('content')
        </div>
            <!-- end content -->

        <!-- video section Modal -->
        <div class="modal fade video_modal" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <video width="727" height="410" controls="" autoplay="">
                            <source src="{{ asset('assets/video/food_video.mp4') }}" type="video/mp4">
                        </video> 
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->

        <!-- Scroll Bottom to Top -->
        <span class="scroll-top" data-scroll="up">
            <i class="fa-solid fa-angle-up"></i>
        </span>

        <!--WA chat-->
        <div style="z-index:999;" class="jarak-bawah-mobile jarak-bawah-desktop" id="WAButton"></div>
    </div>
    <!-- end Page Wrapper -->

    <script src="{{ asset('assets/js/jquery-min-3.6.0.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/all.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/floating-wpp.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    <script>
        let tahun = new Date().getFullYear();
        document.getElementById('nowYear').innerHTML=tahun
    </script>
   
   @foreach($dataKontak as $kontak)
   @endforeach
    <script>
        $(function() {
            $('#WAButton').floatingWhatsApp({
                phone: '{{ $kontak->no_wa }}',
                headerTitle: 'Reservasi', //Popup Title
                popupMessage: 'Hi, Anda butuh bantuan?', //Popup Message
                message:'Hi, Saya pelanggan dari nalendracafe.com : \n',
                showPopup: true, //Enables popup display
                buttonImage: '<img src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/whatsapp.svg" />', //Button Image
                position: "right"    
            });
        });
    </script>
    </body>
</html>