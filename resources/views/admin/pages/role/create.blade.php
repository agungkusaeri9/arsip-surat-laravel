@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Tambah Role</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.roles.store') }}" method="post" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" required=""
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
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
