@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Edit Surat Masuk</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.surat-masuk.update',$item->id) }}" method="post" class="needs-validation"
                        novalidate="" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label>No. Agenda</label>
                            <input type="number" class="form-control @error('no_agenda') is-invalid @enderror"
                                required="" name="no_agenda" value="{{ $item->no_agenda ?? old('no_agenda') }}">
                            @error('no_agenda')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pengirim</label>
                            <input type="text" class="form-control @error('pengirim') is-invalid @enderror"
                                required="" name="pengirim" value="{{ $item->pengirim ?? old('pengirim') }}">
                            @error('pengirim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No. Surat</label>
                            <input type="text" class="form-control @error('no_surat') is-invalid @enderror"
                                required="" name="no_surat" value="{{ $item->no_surat ?? old('no_surat') }}">
                            @error('no_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='isi' class='mb-2'>Isi</label>
                            <textarea name='isi' id='isi' cols='30' rows='3'
                                class='form-control @error('isi') is-invalid @enderror'>{{ $item->isi  ?? old('isi') }}</textarea>
                            @error('isi')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='keterangan' class='mb-2'>Keterangan</label>
                            <textarea name='keterangan' id='keterangan' cols='30' rows='3'
                                class='form-control @error('keterangan') is-invalid @enderror'>{{ $item->keterangan ?? old('keterangan') }}</textarea>
                            @error('keterangan')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror"
                                required="" name="tanggal_surat" value="{{ $item->tanggal_surat ?? old('tanggal_surat') }}">
                            @error('tanggal_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Diterima</label>
                            <input type="date" class="form-control @error('tanggal_diterima') is-invalid @enderror"
                                required="" name="tanggal_diterima" value="{{ $item->tanggal_diterima ? $item->tanggal_diterima : old('tanggal_diterima') }}">
                            @error('tanggal_diterima')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                required="" name="file" value="{{ old('file') }}">
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn float-right btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
