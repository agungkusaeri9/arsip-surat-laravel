@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Edit Klasifikasi</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.klasifikasi.update',$item->id) }}" method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                            required="" name="nama" value="{{ $item->nama ?? old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                            required="" name="jabatan" value="{{ $item->jabatan ?? old('jabatan') }}">
                        @error('jabatan')
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
