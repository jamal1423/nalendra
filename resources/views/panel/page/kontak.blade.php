@extends('panel.layout.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Kontak</strong>
            </div>
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Detail Informasi</h3>
                        </div>
                        <hr>
                        <form action="/dashboard/kontak/update" method="post">
                            @csrf
                            @method('patch')
                            @foreach($dataKontak as $kontak)
                            @endforeach
                            <div class="form-group">
                                <label class="control-label mb-1">No. WA</label>
                                <input name="no_wa" type="text" class="form-control" value="{{ old('no_wa',$kontak->no_wa) }}" aria-required="true" aria-invalid="false">
                                <input name="id" type="hidden" class="form-control" value="{{ $kontak->id }}" aria-required="true" aria-invalid="false">
                            </div>
                            <div class="form-group has-success">
                                <label  class="control-label mb-1">Email</label>
                                <input name="email" value="{{ old('email',$kontak->email) }}" type="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Alamat</label>
                                <textarea name="alamat" rows="3" class="form-control">{{ old('no_wa',$kontak->alamat) }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Link Facebook</label>
                                        <textarea name="link_fb" rows="2" class="form-control">{{ old('no_wa',$kontak->link_fb) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Link Instagram</label>
                                        <textarea name="link_ig" rows="2" class="form-control">{{ old('no_wa',$kontak->link_ig) }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock fa-save"></i>&nbsp;
                                    <span id="payment-button-amount">Simpan Data</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div> <!-- .card -->

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