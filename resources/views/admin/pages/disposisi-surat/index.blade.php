@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Detail Surat Masuk</h5>
                    <a href="{{ route('admin.surat-masuk.index') }}"
                        class="btn btn-sm btn-warning mb-3">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" required=""
                            name="kode" value="{{ $item->kode ?? old('kode') }}" disabled>
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
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Disposisi Surat</h5>
                    <a href="{{ route('admin.disposisi-surat.create', $item->id) }}"
                        class="btn btn-sm btn-primary mb-3">Tambah Data</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover" id="dTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Klasifikasi</th>
                                <th>Sifat Surat</th>
                                <th>Catatan</th>
                                <th>Batas Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->disposisis as $disposisi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($disposisi->klasifikasi)
                                            {{ $disposisi->klasifikasi->nama . ' | ' . $disposisi->klasifikasi->jabatan }}
                                        @endif
                                    </td>
                                    <td>{{ $disposisi->sifat->sifat }}</td>
                                    <td>{{ $disposisi->catatan }}</td>
                                    <td>{{ $disposisi->batas_waktu->translatedFormat('d-m-Y') }}</td>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.disposisi-surat.edit', $disposisi->id) }}"
                                            class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="" method="post" class="d-inline" id="formDelete">
                                            @csrf
                                            @method('delete')
                                            <button
                                                data-action="{{ route('admin.disposisi-surat.destroy', $disposisi->id) }}"
                                                class="btn btn-sm btn-danger btnDelete"><i class="fas fa-trash"></i>
                                                Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(function() {
            $('#dTable').DataTable();
            $('body').on('click', '.btnDelete', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let action = $(this).data('action');
                        $('#formDelete').attr('action', action);
                        $('#formDelete').submit();
                    }
                })
            })
        })
    </script>
    @include('admin.layouts.partials.sweetalert')
@endpush
