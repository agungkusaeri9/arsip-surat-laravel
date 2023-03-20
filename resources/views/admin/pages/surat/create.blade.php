@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Tambah Surat</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.surat.store') }}" method="post" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" required=""
                                name="judul" value="{{ old('judul') }}">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nomor</label>
                            <input type="text" class="form-control @error('nomor') is-invalid @enderror" required=""
                                name="nomor" value="{{ old('nomor') }}">
                            @error('nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tempat, Tanggal</label>
                            <input type="text" class="form-control @error('tempat_waktu') is-invalid @enderror"
                                required="" name="tempat_waktu" value="{{ old('tempat_waktu') }}">
                            @error('tempat_waktu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='isi' class='mb-2'>Isi</label>
                            <textarea name='isi' id='isi' cols='30' rows='3'
                                class='form-control @error('isi') is-invalid @enderror'>{{ old('isi') }}</textarea>
                            @error('isi')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn float-right btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
    $(function(){
        CKEDITOR.replace( 'isi' );
    })
</script>
@endpush
