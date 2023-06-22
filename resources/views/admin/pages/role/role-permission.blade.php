@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Tambah Role</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.role-permissions.update') }}" method="post" class="d-inline"
                        enctype="multipart/form-data">
                        <div class="card-body row">
                            <div class="col-12">
                                <h4 class="card-title mb-5">Update Permisison</h4>
                            </div>
                            @csrf
                            <div class="col-md-12">
                                <div class='form-group mb-3'>
                                    <label for='role_name' class='mb-2'>Role</label>
                                    <input type='text' name='role_name'
                                        class='form-control @error('role_name') is-invalid @enderror'
                                        value='{{ $item->name }}' readonly>
                                    @error('role_name')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="">Permisisons</label>
                            </div>
                            @foreach ($item->permissions as $key => $role_permission)
                                <div class="col-md-6">
                                    <div class="form-group ml-4 my-0 py-0">
                                        <input checked class="form-check-input" type="checkbox"
                                            value="{{ $role_permission->name }}" id="{{ $role_permission->name }}"
                                            name="permission[]">
                                        <label class="form-check-label" for="{{ $role_permission->name }}">
                                            {{ $role_permission->name }}
                                        </label>
                                    </div>
                                </div>
                                @error('permissions')
                                    <div class='invalid-feedback'>
                                        {{ $message }}
                                    </div>
                                @enderror
                            @endforeach

                            @foreach ($permissions as $key => $permission)
                                <div class="col-md-6">
                                    <div class="form-group ml-4 my-0 py-0">
                                        <input class="form-check-input" type="checkbox" value="{{ $permission->name }}"
                                            id="{{ $permission->name }}" name="permission[]">
                                        <label class="form-check-label" for="{{ $permission->name }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                </div>
                                @error('permissions')
                                    <div class='invalid-feedback'>
                                        {{ $message }}
                                    </div>
                                @enderror
                            @endforeach

                            <div class="col-12 mt-3">
                                <div class="form-group d-flex justify-content-between">
                                    <a href="{{ route('admin.roles.index')}}"
                                    class="btn btn-warning">Kembali</a>
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
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
@endpush
@push('scripts')
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    @include('admin.layouts.partials.sweetalert')
@endpush
