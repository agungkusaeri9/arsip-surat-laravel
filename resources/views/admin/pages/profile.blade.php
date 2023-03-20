@extends('admin.layouts.app')
@section('content')
    <div class="row mt-sm-4 justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form method="post" class="needs-validation" action="{{ route('admin.profile.update') }}" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h5>Edit Profile</h5>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-center">
                       <div class="profile mb-5">

                       </div>
                      </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ auth()->user()->name ?? '-' }}" required="" name="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    value="{{ auth()->user()->username ?? '-' }}" required="" readonly name="username">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ auth()->user()->email ?? '-' }}" required="" readonly name="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Avatar</label>
                                <input type="file" name="avatar"
                                    class="form-control @error('avatar') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <style>
      .profile{
            background-image: url('{{ auth()->user()->avatar() }}');
            height:220px;
            width:220px;
            background-size: cover;
            background-position: center;
            border-radius: 50%;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    @include('admin.layouts.partials.sweetalert')
@endpush
