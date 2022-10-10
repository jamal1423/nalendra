@extends('panel.layout.main')

@section('content')
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#menuTambah">
    <i class="fa fa-plus"></i>&nbsp; Tambah Menu
</button>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Table</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga Barang</th>
                            <th class="text-center">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($daftarMenu as $menu)
                        <tr>
                            <td class="text-center"> {{ $loop->iteration }} </td>
                            <td> {{ $menu->nama_barang }} </td>
                            <td> {{ $menu->jenis }} </td>
                            <td>Rp. {{ number_format($menu->harga_barang) }} </td>
                            <td class="text-center">
                               <div>
                                    <a href="#" id="menu-edit-{{ $menu->id }}" onClick="menuEdit(this)" data-id="{{ $menu->id }}"><span class="badge badge-primary"><h4><i class="fa fa-edit"></i></h4></span></a>
                                    <a href="#" id="menu-del-{{ $menu->id }}" onClick="menuDel(this)" data-id="{{ $menu->id }}"><span class="badge badge-danger"><h4><i class="fa fa-trash"></i></h4></span></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="menuTambah" tabindex="-1" role="dialog" aria-labelledby="menuTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="modal-title" id="menuTambahLabel">Tambah Menu</h5>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <form action="/dashboard/menu-tambah" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label mb-1">Nama Barang</label>
                                <input name="nama_barang" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label mb-1">Kategori</label>
                                <select name="jenis" class="form-control">
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                    <option value="Snack">Snack</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label mb-1">Harga (Rp)</label>
                                <input name="harga_barang" type="number" class="form-control" aria-required="true" aria-invalid="false" required>
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

<!-- EDIT MENU -->
<div class="modal fade show" id="editMenu" tabindex="-1" role="dialog" aria-labelledby="menuEditlLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="modal-title" id="menuEditLabel">Edit Menu Makanan</h5>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <form action="/dashboard/menu/update" method="post">
            @csrf
            @method('patch')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="hidden" id="id-edit" name="id">
                                <label class="control-label mb-1">Nama Barang</label>
                                @error('nama_barang')
                                    <p class="text-danger" style="margin-left: 30px;">{{ $message }}</p>
                                @enderror
                                <input name="nama_barang" id="nmBarang-edit" type="text" class="form-control" autofocus>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label mb-1">Kategori</label>
                                <select name="jenis" id="jenis-edit" class="form-control">
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label mb-1">Harga Barang (Rp)</label>
                                @error('harga_barang')
                                    <p class="text-danger" style="margin-left: 30px;">{{ $message }}</p>
                                @enderror
                                <input name="harga_barang" id="hrgBarang-edit" type="number" class="form-control" autofocus>
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
<div class="modal fade show" id="deleteMenu" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="modal-title" id="deleteMenuLabel">Hapus Menu</h5>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <form action="/dashboard/menu/delete" method="post">
            @csrf
            @method('delete')
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <p class="text-center"> Yakin akan menghapus <strong id="nmBrgDel"></strong>?</p>
                        </div>
                        <input type="hidden" id="id-del" name="id_del">
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

@push('scripts')
<script src="{{ asset('panel/assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('panel/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/init/datatables-init.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    } );
</script>
@endpush