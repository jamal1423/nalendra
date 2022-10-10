<?php

namespace App\Http\Controllers;

use App\Models\MenuMakanan;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function panel_master_menu()
    {
        $daftarMenu = MenuMakanan::orderBy('jenis')->get();
        return view('panel.page.data-menu',[
            'daftarMenu'=> $daftarMenu
        ]);    
    }

    public function panel_master_menu_tambah(Request $request){
        try {
            $validatedData = $request->validate([
                'nama_barang' => 'required',
                'harga_barang' => '',
                'userlog' => '',
                'jenis' => ''
            ]);

            // $validatedData['userlog'] = auth()->user()->username;
            $validatedData['userlog'] = 'jamal';
            
            MenuMakanan::create($validatedData);
            return redirect('/dashboard/data-menu')->with('add-menu', 'Menu berhasil ditambahkan');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/data-menu')->with('error-menu', 'Error, silahkan ulangi proses!');
        }
    }

    public function panel_master_menu_get_data($id){
        $menuMakanan = MenuMakanan::findOrFail($id);
        return response()->json($menuMakanan);
    }
    
    public function panel_master_menu_update(Request $request){
        try {
            $validatedData = $request->validate([
                'nama_barang' => '',
                'harga_barang' => '',
                'userlog' => '',
                'jenis' => ''
            ]);

            $validatedData['userlog'] = 'jamal';
            
            MenuMakanan::where('id', $request->id)
                ->update($validatedData);
            return redirect('/dashboard/data-menu')->with('edit-menu', 'Menu berhasil diubah');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/data-menu')->with('error-menu', 'Error, silahkan ulangi proses!');
        }
    }

    public function panel_master_menu_delete(Request $request)
    {
        try {
            MenuMakanan::destroy($request->id_del);
            return redirect('/dashboard/data-menu')->with('delete-menu', 'Menu berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/data-menu')->with('error-menu', 'Error, silahkan ulangi proses!');
        }
    }
}
