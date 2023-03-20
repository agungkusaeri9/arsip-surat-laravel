@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header d-flex justify-content-between">
                            <h6>Tentang Aplikasi</h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-inline ">
                                <li class="list-inline-item mb-3 d-flex justify-content-center">
                                    <div class="text-center">
                                        <img src="{{ $pengaturan->gambar() }}" alt="" class="img-fluid gambar_profile">
                                    </div>
                                </li>
                                <li class="list-inline-item mb-3 d-flex justify-content-between">
                                    <span class="font-weight-bold">Nama Aplikasi</span>
                                    <span>{{ $pengaturan->nama }}</span>
                                </li>
                                <li class="list-inline-item mb-3 d-flex justify-content-between">
                                    <span class="font-weight-bold">Deskripsi</span>
                                    <span class="text-right">{{ $pengaturan->deskripsi }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h6>Tentang Pembuat</h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-inline ">
                                <li class="list-inline-item mb-3 d-flex justify-content-center">
                                    <div class="text-center">
                                       <div class="profile-pembuat">

                                       </div>
                                    </div>
                                </li>
                                <li class="list-inline-item mb-3 d-flex justify-content-between">
                                    <span class="font-weight-bold">Nama</span>
                                    <span>{{ $pengaturan->nama_pembuat }}</span>
                                </li>
                                <li class="list-inline-item mb-3 d-flex justify-content-between">
                                    <span class="font-weight-bold">NIM</span>
                                    <span>{{ $pengaturan->nim_pembuat }}</span>
                                </li>
                                <li class="list-inline-item mb-3 d-flex justify-content-between">
                                    <span class="font-weight-bold">Prodi</span>
                                    <span>{{ $pengaturan->prodi_pembuat }}</span>
                                </li>
                                <li class="list-inline-item mb-3 d-flex justify-content-between">
                                    <span class="font-weight-bold">Email</span>
                                    <span>{{ $pengaturan->email_pembuat }}</span>
                                </li>
                                <li class="list-inline-item mb-3 d-flex justify-content-between">
                                    <span class="font-weight-bold">Nomor HP</span>
                                    <span>{{ $pengaturan->nomor_hp_pembuat }}</span>
                                </li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h6>Edit Pengaturan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.pengaturan.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h6 class="text-center mb-2">
                            Tentang Aplikasi
                        </h6>
                        <div class='form-group mb-3'>
                            <label for='nama' class='mb-2'>Nama</label>
                            <input type='text' name='nama' class='form-control @error('nama') is-invalid @enderror'
                                value='{{ $pengaturan->nama ?? old('nama') }}'>
                            @error('nama')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='deskripsi' class='mb-2'>Deskripsi</label>
                            <textarea name='deskripsi' id='deskripsi' cols='30' rows='3'
                                class='form-control @error('deskripsi') is-invalid @enderror'>{{ $pengaturan->deskripsi ?? old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='gambar' class='mb-2'>Gambar</label>
                            <input type='file' name='gambar' class='form-control @error('gambar') is-invalid @enderror'
                                value='{{ old('gambar') }}'>
                            @error('gambar')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <hr class="mt-4 mb-3">
                        <h6 class="text-center mb-2">Pembuat</h6>
                        <div class='form-group mb-3'>
                            <label for='nama_pembuat' class='mb-2'>Nama</label>
                            <input type='text' name='nama_pembuat'
                                class='form-control @error('nama_pembuat') is-invalid @enderror'
                                value='{{ $pengaturan->nama_pembuat ?? old('nama_pembuat') }}'>
                            @error('nama_pembuat')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='nim_pembuat' class='mb-2'>NIM</label>
                            <input type='text' name='nim_pembuat'
                                class='form-control @error('nim_pembuat') is-invalid @enderror'
                                value='{{ $pengaturan->nim_pembuat ?? old('nim_pembuat') }}'>
                            @error('nim_pembuat')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='prodi_pembuat' class='mb-2'>Prodi</label>
                            <input type='text' name='prodi_pembuat'
                                class='form-control @error('prodi_pembuat') is-invalid @enderror'
                                value='{{ $pengaturan->prodi_pembuat ?? old('prodi_pembuat') }}'>
                            @error('prodi_pembuat')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='email_pembuat' class='mb-2'>Email</label>
                            <input type='text' name='email_pembuat'
                                class='form-control @error('email_pembuat') is-invalid @enderror'
                                value='{{ $pengaturan->email_pembuat ?? old('email_pembuat') }}'>
                            @error('email_pembuat')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='nomor_hp_pembuat' class='mb-2'>Nomor HP</label>
                            <input type='text' name='nomor_hp_pembuat'
                                class='form-control @error('nomor_hp_pembuat') is-invalid @enderror'
                                value='{{ $pengaturan->nomor_hp_pembuat ?? old('nomor_hp_pembuat') }}'>
                            @error('nomor_hp_pembuat')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='foto_pembuat' class='mb-2'>Foto</label>
                            <input type='file' name='foto_pembuat'
                                class='form-control @error('foto_pembuat') is-invalid @enderror'
                                value='{{ old('foto_pembuat') }}'>
                            @error('foto_pembuat')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <style>
        .gambar_profile{
            max-height: 220px;
            max-width:220px;
            margin-bottom: 40px;
        }
        .profile-pembuat{
            background-image: url('{{ $pengaturan->foto_pembuat() }}');
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
