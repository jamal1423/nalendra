<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function main_panel_kontak(){
        $dataKontak = Kontak::all();
        return view('panel.page.kontak',[
            'dataKontak' => $dataKontak
        ]);
    }

    public function panel_master_kontak_update(Request $request){
        try {
            $validatedData = $request->validate([
                'no_wa'=>'',
                'email'=>'',
                'alamat'=>'',
                'link_fb'=>'',
                'link_ig'=>''
            ]);
            
            Kontak::where('id', $request->id)
                ->update($validatedData);
                return redirect('/dashboard/data-kontak')->with('edit-kontak', 'Kontak berhasil diubah');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/data-kontak')->with('error-kontak', 'Error, silahkan ulangi proses!');
        }
    }
}
