<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kontak;
use App\Models\MenuMakanan;
use App\Models\Slider;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function main_website()
    {
        $dataSlider = Slider::all();
        $dataGaleri = Galeri::all();
        $dataKontak = Kontak::all();
        $dataMenu = MenuMakanan::all();
        $daftarMakanan = MenuMakanan::where('jenis','=','Makanan')->get();
        $daftarMinuman = MenuMakanan::where('jenis','=','Minuman')->get();
        $daftarSnack = MenuMakanan::where('jenis','=','Snack')->get();
        return view('website.page.home',[
            'dataSlider' => $dataSlider,
            'dataGaleri' => $dataGaleri,
            'dataKontak' => $dataKontak,
            'dataMenu' => $dataMenu,
            'daftarMakanan'=> $daftarMakanan,
            'daftarMinuman'=> $daftarMinuman,
            'daftarSnack'=> $daftarSnack
        ]);
    }
}
