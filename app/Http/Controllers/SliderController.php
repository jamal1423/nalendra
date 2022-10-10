<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function panel_master_slider()
    {
        $dataSliders = Slider::all();
        return view('panel.page.slider',[
            'dataSliders'=>$dataSliders
        ]);
    }
    public function panel_master_slider_tambah(Request $request){
        try {
            $validatedData = $request->validate([
                'gambar_slider' => 'required',
                'deskripsi' => '',
                'userlog' => ''
            ]);

            if ($request->hasFile('gambar_slider')) {
                $image = $request->file('gambar_slider');
                $name = date('mdYHis') . uniqid() . $image->getClientOriginalName();
                $image->move(public_path() . '/gambar-slider/', $name);
                $validatedData['gambar_slider'] = $name;
            }

            // $validatedData['userlog'] = auth()->user()->username;
            $validatedData['userlog'] = 'jamal';
            
            Slider::create($validatedData);
            return redirect('/dashboard/slider')->with('add-slider', 'Slider berhasil ditambahkan');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/slider')->with('error-slider', 'Error, silahkan ulangi proses!');
        }
    }

    public function panel_master_slider_get_data($id)
    {
        $sliders = Slider::findOrFail($id);
        return response()->json($sliders);
    }

    public function panel_master_slider_update(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'gambar_slider' => '',
                'deskripsi' => '',
                'userlog' => ''
            ]);

            if ($request->hasFile('gambar_slider')) {
                if ($request->oldImage) {
                    $gmbr = $request->oldImage;
                    $image_path = public_path() . '/gambar-slider/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image = $request->file('gambar_slider');
                $name = date('mdYHis') . uniqid() . $image->getClientOriginalName();
                $image->move(public_path() . '/gambar-slider/', $name);
                $validatedData['gambar_slider'] = $name;
            }
            $validatedData['userlog'] = 'jamal';
            
            Slider::where('id', $request->id)
                ->update($validatedData);
                return redirect('/dashboard/slider')->with('edit-slider', 'Slider berhasil diubah');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/slider')->with('error-slider', 'Error, silahkan ulangi proses!');
        }
    }

    public function panel_master_slider_delete(Request $request)
    {
        try {
            $gmbr = $request->oldImage_del;
            $image_path = public_path() . '/gambar-slider/' . $gmbr;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            Slider::destroy($request->id_del);
            return redirect('/dashboard/slider')->with('delete-slider', 'Slider berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/slider')->with('error-slider', 'Error, silahkan ulangi proses!');
        }
    }
}
