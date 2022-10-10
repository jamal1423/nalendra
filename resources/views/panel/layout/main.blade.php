<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Panel Admin | Nalendra Cafe & Resto</title>
    <meta name="description" content="Nalendra Cafe & Resto">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('panel/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/assets/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
    <!-- Left Panel -->
    
    @include('panel.partials.menu-nav')
    
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('panel.partials.header')
        <!-- /#header -->
        @if(!Request::is('dashboard'))
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>
                                @if(Request::is('dashboard/slider'))
                                    Slider
                                @elseif(Request::is('dashboard/data-menu'))
                                    Daftar Menu
                                @elseif(Request::is('dashboard/galeri'))
                                    Galeri
                                @elseif(Request::is('dashboard/data-kontak'))
                                    Kontak
                                @endif
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li>
                                        <a href="#">
                                            @if(Request::is('dashboard/slider'))
                                                Slider
                                            @elseif(Request::is('dashboard/data-menu'))
                                                Daftar Menu
                                            @elseif(Request::is('dashboard/galeri'))
                                                Galeri
                                            @elseif(Request::is('dashboard/data-kontak'))
                                                Kontak
                                            @endif
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                @yield('content')
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="{{ asset('panel/assets/js/jquery-3.2.1.min.js') }}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        function sliderEdit(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/slider/get-data/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var imgElement = $('#img');
					imgElement.empty();

					$('#id').val(data.id);
					$('#desk-edit').val(data.deskripsi);
					$('#oldImage').val(data.gambar_slider);
					$('#editSlider').modal('show');

					var imgs = data.gambar_slider;
					var elem = document.createElement("img");
					elem.setAttribute("src", "/gambar-slider/" + imgs);
					document.getElementById("img").appendChild(elem);
				}
			});
		}

        function sliderDel(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/slider/get-data/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
                    // console.log(data)
                    var imgElement = $('#img-del');
					imgElement.empty();

					$('#id-del').val(data.id);
					$('#oldImage-del').val(data.gambar_slider);
					$('#deleteSlider').modal('show');

                    var imgs_del = data.gambar_slider;
					var elem_del= document.createElement("img");
					elem_del.setAttribute("src", "/gambar-slider/" + imgs_del);
					document.getElementById("img-del").appendChild(elem_del);
				}
			});
		}

        function menuEdit(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/menu/get-data/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
                    var selectElement = $('#jenis-edit')
                    $('#id-edit').val(data.id);
					$('#nmBarang-edit').val(data.nama_barang);
					$('#hrgBarang-edit').val(data.harga_barang);
					//$('#jenis-edit').val(data.jenis);
                    selectElement.empty();
                    selectElement.append(`
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Snack">Snack</option>
                    `)
                    $("#jenis-edit option[value='" + data.jenis + "']").attr("selected", "selected");
                    $('#editMenu').modal('show');
				}
			});
		}

        function menuDel(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/menu/get-data/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
                    //console.log(data)
                    $('#id-del').val(data.id);
					$('#nmBrgDel').html(data.nama_barang);
					$('#deleteMenu').modal('show');
				}
			});
		}

        function galeriEdit(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/galeri/get-data/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
                    console.log(data)
                    var imgElement = $('#img');
					imgElement.empty();

					$('#id').val(data.id);
					$('#desk-edit').val(data.deskripsi);
					$('#oldImage').val(data.gambar_galeri);
					$('#editGaleri').modal('show');

					var imgs = data.gambar_galeri;
					var elem = document.createElement("img");
					elem.setAttribute("src", "/galeri/" + imgs);
					document.getElementById("img").appendChild(elem);
				}
			});
		}

        function galeriDel(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/galeri/get-data/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
                    console.log(data)
                    var imgElement = $('#img-del');
					imgElement.empty();

					$('#id-del').val(data.id);
					$('#oldImage-del').val(data.gambar_galeri);
					$('#deleteGaleri').modal('show');

                    var imgs_del = data.gambar_galeri;
					var elem_del= document.createElement("img");
					elem_del.setAttribute("src", "/galeri/" + imgs_del);
					document.getElementById("img-del").appendChild(elem_del);
				}
			});
		}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('panel/assets/js/dropzone.js') }}"></script>
    <script src="{{ asset('panel/assets/js/main.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')

    <!-- ADD SLIDER -->
    @if(Session::has('add-slider'))
	<script>
		$(document).ready(function() {
			Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Slider berhasil ditambahkan.',
            })
		});
	</script>
    @endif
    
    <!-- EDIT SLIDER -->
    @if(Session::has('edit-slider'))
	<script>
		$(document).ready(function() {
			Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Slider berhasil diubah.',
            })
		});
	</script>
    @endif
    
    <!-- DELETE SLIDER -->
    @if(Session::has('delete-slider'))
	<script>
		$(document).ready(function() {
			Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Slider berhasil dihapus.',
            })
		});
	</script>
    @endif

    <!-- ERROR SLIDER -->
    @if(Session::has('error-slider'))
	<script>
		$(document).ready(function() {
			Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Proses tidak dapat dilanjutkan.',
            })
		});
	</script>
    @endif
    
    <!-- ADD MENU -->
    @if(Session::has('add-menu'))
	<script>
		$(document).ready(function() {
			Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Menu berhasil ditambahkan.',
            })
		});
	</script>
	@endif

    <!-- EDIT MENU -->
    @if(Session::has('edit-menu'))
	<script>
		$(document).ready(function() {
			Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Menu berhasil diubah.',
            })
		});
	</script>
	@endif

    <!-- HAPUS MENU -->
    @if(Session::has('delete-menu'))
	<script>
		$(document).ready(function() {
			Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Menu berhasil dihapus.',
            })
		});
	</script>
	@endif

    <!-- ERROR MENU -->
    @if(Session::has('error-menu'))
	<script>
		$(document).ready(function() {
			Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Proses tidak dapat dilanjutkan.',
            })
		});
	</script>
    @endif
    
    <!-- ADD GALERI -->
    @if(Session::has('add-galeri'))
	<script>
		$(document).ready(function() {
			Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data galeri berhasil ditambahkan.',
            })
		});
	</script>
	@endif
    
    <!-- EDIT GALERI -->
    @if(Session::has('edit-galeri'))
	<script>
		$(document).ready(function() {
			Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data galeri berhasil diubah.',
            })
		});
	</script>
	@endif
    
    <!-- DELETE GALERI -->
    @if(Session::has('delete-galeri'))
	<script>
		$(document).ready(function() {
			Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data galeri berhasil dihapus.',
            })
		});
	</script>
	@endif

    <!-- ERROR GALERI -->
    @if(Session::has('error-galeri'))
	<script>
		$(document).ready(function() {
			Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Proses tidak dapat dilanjutkan.',
            })
		});
	</script>
    @endif

    <!-- EDIT KONTAK -->
    @if(Session::has('edit-kontak'))
	<script>
		$(document).ready(function() {
			Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data kontak berhasil diubah.',
            })
		});
	</script>
	@endif
    
    <!-- ERROR KONTAK -->
    @if(Session::has('error-kontak'))
	<script>
		$(document).ready(function() {
			Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Proses tidak dapat dilanjutkan.',
            })
		});
	</script>
    @endif
</body>
</html>
