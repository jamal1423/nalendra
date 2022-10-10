@extends('panel.layout.main')

@section('content')
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addSlider">
    <i class="fa fa-plus"></i>&nbsp; Tambah Slider
</button>
<div class="row">
    @forelse($dataSliders as $slider)
        <div class="col-md-4">
            <div class="feed-box text-center">
                <section class="card">
                    <div class="card-body">
                        <div class="corner-ribon blue-ribon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <a href="#">
                            <img class="align-self-center" alt="" src="{{ asset('gambar-slider/'.$slider->gambar_slider) }}">
                        </a>
                        <p class="mt-2">
                            {{ $slider->deskripsi }}
                        </p>
                    </div>
                    <div class="weather-category twt-category">
                        <a href="#" id="slider-edit-{{ $slider->id }}" onClick="sliderEdit(this)" data-id="{{ $slider->id  }}"><span class="badge badge-primary"><h4><i class="fa fa-edit"></i></h4></span></a>
                        <a href="#" id="slider-del-{{ $slider->id }}" onClick="sliderDel(this)" data-id="{{ $slider->id }}"><span class="badge badge-danger"><h4><i class="fa fa-trash"></i></h4></span></a>
                    </div>
                </section>
            </div>
        </div>
    @empty
        <div class="col-md-12">
            <div class="feed-box text-center">
                <section class="card">
                    <div class="card-body">
                        <div class="corner-ribon blue-ribon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <p class="mt-2">
                            Data slider belum tersedia.
                        </p>
                    </div>
                </section>
            </div>
        </div>
    @endforelse
</div>

<!-- ADD SLIDER -->
<div class="modal fade" id="addSlider" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="modal-title" id="addSliderLabel">Tambah Slider</h5>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <form action="/dashboard/slider-tambah" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label mb-1">Gambar Slider <strong><i>(Pastikan ukuran gambar 1540px x 940px)</i></strong></label>
                                @error('gambar_slider')
                                    <p class="text-danger" style="margin-left: 30px;">{{ $message }}</p>
                                @enderror
                                <div id="dropzone1" style="width: 100%;height:200px;margin-top: 0px;">
                                    <div style="width:40%;">Select Image</div>
                                    <input type="file" name="gambar_slider" accept="image/png, image/gif, image/jpeg" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label mb-1">Deskripsi</label>
                                @error('deskripsi')
                                    <p class="text-danger" style="margin-left: 30px;">{{ $message }}</p>
                                @enderror
                                <textarea name="deskripsi" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Tambakan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT SLIDER -->
<div class="modal fade" id="editSlider" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="modal-title" id="editSliderLabel">Edit Slider</h5>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <form action="/dashboard/slider/update" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label mb-1">Gambar Slider <strong><i>(Pastikan ukuran gambar 1540px x 940px)</i></strong></label>
                                @error('gambar_slider')
                                    <p class="text-danger" style="margin-left: 30px;">{{ $message }}</p>
                                @enderror
                                <div id="dropzone1" style="width: 100%;height:200px;margin-top: 0px;">
                                    <div id="img"></div>
                                    <input type="file" name="gambar_slider" accept="image/png, image/gif, image/jpeg" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="hidden" id="id" name="id">
                                <input type="hidden" name="oldImage" id="oldImage">
                                <label class="control-label mb-1">Deskripsi</label>
                                @error('deskripsi')
                                    <p class="text-danger" style="margin-left: 30px;">{{ $message }}</p>
                                @enderror
                                <textarea name="deskripsi" id="desk-edit" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DELETE SLIDER -->
<div class="modal fade" id="deleteSlider" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="modal-title" id="deleteSliderLabel">Hapus Slider</h5>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <form action="/dashboard/slider/delete" method="post">
            @csrf
            @method('delete')
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="control-label mb-1">Gambar Slider</label>
                            <div id="dropzone1" style="width: 100%;height:200px;margin-top: 0px;z-index:9999;">
                                <div id="img-del"></div>
                            </div>
                            <p class="text-center"> Yakin akan menghapus slide ini?</p>
                        </div>
                        <input type="hidden" id="id-del" name="id_del">
                        <input type="hidden" id="oldImage-del" name="oldImage_del">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection