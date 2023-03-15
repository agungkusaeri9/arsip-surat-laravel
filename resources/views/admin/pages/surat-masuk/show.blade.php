@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Detail Surat Masuk</h5>
                </div>
                <div class="card-body">
                    <form action="javascript:void(0)" method="post"
                        class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label>Kode</label>
                            <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                required="" name="kode" value="{{ $item->kode ?? old('kode') }}" disabled>
                            @error('kode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No. Agenda</label>
                            <input type="number" class="form-control @error('no_agenda') is-invalid @enderror"
                                required="" name="no_agenda" value="{{ $item->no_agenda ?? old('no_agenda') }}" disabled>
                            @error('no_agenda')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pengirim</label>
                            <input type="text" class="form-control @error('pengirim') is-invalid @enderror"
                                required="" name="pengirim" value="{{ $item->pengirim ?? old('pengirim') }}" disabled>
                            @error('pengirim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No. Surat</label>
                            <input type="text" class="form-control @error('no_surat') is-invalid @enderror"
                                required="" name="no_surat" value="{{ $item->no_surat ?? old('no_surat') }}" disabled>
                            @error('no_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='isi' class='mb-2'>Isi</label>
                            <textarea name='isi' id='isi' cols='30' rows='3'
                                class='form-control @error('isi') is-invalid @enderror' disabled>{{ $item->isi ?? old('isi') }}</textarea>
                            @error('isi')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='keterangan' class='mb-2'>Keterangan</label>
                            <textarea name='keterangan' id='keterangan' cols='30' rows='3'
                                class='form-control @error('keterangan') is-invalid @enderror' disabled>{{ $item->keterangan ?? old('keterangan') }}</textarea>
                            @error('keterangan')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror"
                                required="" name="tanggal_surat"
                                value="{{ $item->tanggal_surat ?? old('tanggal_surat') }}" disabled>
                            @error('tanggal_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Diterima</label>
                            <input type="date" class="form-control @error('tanggal_diterima') is-invalid @enderror"
                                required="" name="tanggal_diterima"
                                value="{{ $item->tanggal_diterima ? $item->tanggal_diterima : old('tanggal_diterima') }}"
                                disabled>
                            @error('tanggal_diterima')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            @if ($item->file)
                                <a href="{{ route('admin.surat-masuk.download', $item->kode) }}" target="_blank"
                                    class="btn btn-success btn-sm ml-4">Download</a>
                            @else
                                <button class="btn btn-sm btn-danger">Tidak Ada</button>
                            @endif
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <a href="{{ route('admin.surat-masuk.index') }}"
                                class="btn float-right btn-primary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
