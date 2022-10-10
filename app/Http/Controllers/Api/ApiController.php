<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuMakanan;
use App\Models\Kontak;
use App\Models\Galeri;
use App\Models\Slider;

class ApiController extends Controller
{
    public function get_data_menu(){
        $dataMenu = MenuMakanan::all();
        //return response()->json($dataMenu);
        return response()->json([
            'message'=> 'Parsing data berhasil',
            'status'=> 'Sukses',
            'result'=> $dataMenu,
        ]);
    }

    public function get_data_galeri(){
        $dataGaleri = Galeri::all();
        return response()->json([
            'message' => 'Parsing data berhasil',
            'status' => 'Sukses',
            'result' => $dataGaleri
        ]);
    }

    public function get_data_kontak(){
        $dataKontak = Kontak::all();
        return response()->json([
            'message' => 'Parsing data berhasil',
            'status' => 'Sukses',
            'result' => $dataKontak
        ]);
    }
    
    public function get_data_slider(){
        $dataSlider = Slider::all();
        return response()->json([
            'message' => 'Parsing data berhasil',
            'status' => 'Sukses',
            'result' => $dataSlider
        ]);
    }
}
