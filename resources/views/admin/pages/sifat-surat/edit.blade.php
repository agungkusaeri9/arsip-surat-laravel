@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Edit Sifat Surat</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.sifat-surat.update',$item->id) }}" method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Sifat</label>
                        <input type="text" class="form-control @error('sifat') is-invalid @enderror"
                            required="" name="sifat" value="{{ $item->sifat ?? old('sifat') }}">
                        @error('sifat')
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
