@extends('panel.layout.main')

@section('content')
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addGaleri">
    <i class="fa fa-plus"></i>&nbsp; Tambah Galeri
</button>
<div class="row">
    @forelse($dataGaleri as $galeri)
    <div class="col-md-4">
        <div class="feed-box text-center">
            <section class="card">
                <div class="card-body">
                    <div class="corner-ribon blue-ribon">
                        <i class="fa fa-twitter"></i>
                    </div>
                    <a href="#">
                        <img class="align-self-center" alt="" src="{{ asset('galeri/'.$galeri->gambar_galeri) }}">
                    </a>
                </div>
                <div class="weather-category twt-category">
                    <a href="#" id="menu-edit-{{ $galeri->id }}" onClick="galeriEdit(this)" data-id="{{ $galeri->id }}"><span class="badge badge-primary"><h4><i class="fa fa-edit"></i></h4></span></a>
                    <a href="#" id="menu-del-{{ $galeri->id }}" onClick="galeriDel(this)" data-id="{{ $galeri->id }}"><span class="badge badge-danger"><h4><i class="fa fa-trash"></i></h4></span></a>
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
                        Data galeri belum tersedia.
                    </p>
                </div>
            </section>
        </div>
    </div>
    @endforelse
</div>

<div class="modal fade" id="addGaleri" tabindex="-1" role="dialog" aria-labelledby="addGaleriLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="modal-title" id="addGaleriLabel">Tambah Galeri</h5>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <form action="/dashboard/galeri-tambah" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="control-label mb-1">Gambar Galeri <strong><i>(Pastikan ukuran gambar 700px x 850px)</i></strong></label>
                            @error('gambar_galeri')
                                <p class="text-danger" style="margin-left: 30px;">{{ $message }}</p>
                            @enderror
                            <div id="dropzone1" style="width: 100%;height:250px;margin-top: 0px;">
                                <div style="width:40%;">Select Image</div>
                                <input type="file" name="gambar_galeri" accept="image/png, image/gif, image/jpeg" />
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

<!-- EDIT GALERI -->
<div class="modal fade" id="editGaleri" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="modal-title" id="editGaleriLabel">Edit Galeri</h5>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <form action="/dashboard/galeri/update" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label mb-1">Gambar Galeri  <strong><i>(Pastikan ukuran gambar 700px x 850px)</i></strong> </label>
                                @error('gambar_geleri')
                                    <p class="text-danger" style="margin-left: 30px;">{{ $message }}</p>
                                @enderror
                                <div id="dropzone1" style="width: 100%;height:250px;margin-top: 0px;">
                                    <div id="img" style="width:40%;"></div>
                                    <input type="file" name="gambar_galeri" accept="image/png, image/gif, image/jpeg" />
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

<!-- DELETE GALERI -->
<div class="modal fade" id="deleteGaleri" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="modal-title" id="deleteGaleriLabel">Hapus Galeri</h5>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <form action="/dashboard/galeri/delete" method="post">
            @csrf
            @method('delete')
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="control-label mb-1">Gambar Galeri</label>
                            <div id="dropzone1" style="width: 100%;height:250px;margin-top: 0px;z-index:9999;">
                                <div id="img-del" style="width:40%;"></div>
                            </div>
                            <p class="text-center"> Yakin akan menghapus gambar ini?</p>
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