@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Edit Disposisi Surat Masuk</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.disposisi-surat.update', $item->id) }}" method="post"
                        class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="klasifikasi_id">Klasifikasi</label>
                            <select name="klasifikasi_id" id="klasifikasi_id"
                                class="form-control @error('') is-invalid @enderror">
                                <option value="" selected disabled>Pilih Klasifikasi</option>
                                @foreach ($klasifikasis as $klasifikasi)
                                    <option @selected($klasifikasi->id == $item->klasifikasi_id) value="{{ $klasifikasi->id }}">
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
                                    <option @selected($sifat->id == $item->sifat_surat_id ) value="{{ $sifat->id }}">
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
                                class='form-control @error('catatan') is-invalid @enderror'>{{ $item->catatan ?? old('catatan') }}</textarea>
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
                                value='{{ $item->batas_waktu->translatedFormat('Y-m-d') ?? old('batas_waktu') }}'>
                            @error('batas_waktu')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <a href="{{ route('admin.disposisi-surat.index',$item->surat_masuk_id) }}" class="btn btn-sm btn-warning">Kembali</a>
                            <button class="btn float-right btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
