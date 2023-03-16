@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Tambah Disposisi Surat Masuk</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.disposisi-surat.store', $item->id) }}" method="post"
                        class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="klasifikasi_id">Klasifikasi</label>
                            <select name="klasifikasi_id" id="klasifikasi_id"
                                class="form-control @error('') is-invalid @enderror">
                                <option value="" selected disabled>Pilih Klasifikasi</option>
                                @foreach ($klasifikasis as $klasifikasi)
                                    <option @selected($klasifikasi->id == old('klasifikasi_id')) value="{{ $klasifikasi->id }}">
                                        {{ $klasifikasi->nama . ' | ' . $klasifikasi->jabatan }}</option>
                                @endforeach
                            </select>
                            @error('klasifikasi_id')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sifat_surat_id">Sifat Surat</label>
                            <select name="sifat_surat_id" id="sifat_surat_id"
                                class="form-control @error('') is-invalid @enderror">
                                <option value="" selected disabled>Pilih Sifat Surat</option>
                                @foreach ($sifatSurats as $sifat)
                                    <option @selected($sifat->id == old('sifat_surat_id')) value="{{ $sifat->id }}">
                                        {{ $sifat->sifat }}</option>
                                @endforeach
                            </select>
                            @error('sifat_surat_id')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='catatan' class='mb-2'>Catatan</label>
                            <textarea name='catatan' id='catatan' cols='30' rows='3'
                                class='form-control @error('catatan') is-invalid @enderror'>{{ old('catatan') }}</textarea>
                            @error('catatan')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='batas_waktu' class='mb-2'>Batas Waktu</label>
                            <input type='date' name='batas_waktu'
                                class='form-control @error('batas_waktu') is-invalid @enderror'
                                value='{{ old('batas_waktu') }}'>
                            @error('batas_waktu')
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
