<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    public function panel_master_galeri(){
        $dataGaleri = Galeri::all();

        return view('panel.page.galeri',[
            'dataGaleri'=>$dataGaleri
        ]);
    }

    public function panel_master_galeri_tambah(Request $request){
        try {
            $validatedData = $request->validate([
                'gambar_galeri' => 'required',
                'deskripsi' => '',
                'userlog' => ''
            ]);

            if ($request->hasFile('gambar_galeri')) {
                $image = $request->file('gambar_galeri');
                $name = date('mdYHis') . uniqid() . $image->getClientOriginalName();
                $image->move(public_path() . '/galeri/', $name);
                $validatedData['gambar_galeri'] = $name;
            }

            // $validatedData['userlog'] = auth()->user()->username;
            $validatedData['userlog'] = 'jamal';
            
            Galeri::create($validatedData);
            return redirect('/dashboard/galeri')->with('add-galeri', 'Galeri berhasil ditambahkan');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/galeri')->with('error-galeri', 'Error, silahkan ulangi proses!');
        }
    }

    public function panel_master_galeri_get_data($id){
        $gambarGaleri = Galeri::findOrFail($id);
        return response()->json($gambarGaleri);
    }

    public function panel_master_galeri_update(Request $request){
        try {
            $validatedData = $request->validate([
                'gambar_galeri'=>'',
                'deskripsi'=>'',
                'userlog'=>''
            ]);

            if ($request->hasFile('gambar_galeri')) {
                if ($request->oldImage) {
                    $gmbr = $request->oldImage;
                    $image_path = public_path() . '/galeri/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image = $request->file('gambar_galeri');
                $name = date('mdYHis') . uniqid() . $image->getClientOriginalName();
                $image->move(public_path() . '/galeri/', $name);
                $validatedData['gambar_galeri'] = $name;
            }
            $validatedData['userlog'] = 'jamal';
            Galeri::where('id', $request->id)
                ->update($validatedData);
                return redirect('/dashboard/galeri')->with('edit-galeri', 'Gambar berhasil diubah');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/galeri')->with('error-galeri', 'Error, silahkan ulangi proses!');
        }
    }

    public function panel_master_galeri_delete(Request $request)
    {
        try {
            $gmbr = $request->oldImage_del;
            $image_path = public_path() . '/galeri/' . $gmbr;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            Galeri::destroy($request->id_del);
            return redirect('/dashboard/galeri')->with('delete-galeri', 'Gambar berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/galeri')->with('error-galeri', 'Error, silahkan ulangi proses!');
        }
    }
}
