@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Data Surat Masuk</h5>
                <a href="{{ route('admin.surat-masuk.create') }}" class="btn btn-sm btn-primary mb-3">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="dTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>No Agenda</th>
                                <th>No Surat</th>
                                <th style="min-width:220px;">Isi</th>
                                <th>Tanggal</th>
                                <th>File</th>
                                <th style="min-width:320px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->no_agenda }}</td>
                                    <td>{{ $item->no_surat }}</td>
                                    <td>{{ $item->isi }}</td>
                                    <td>{{ $item->tanggal_surat ? $item->tanggal_surat->translatedFormat('d-m-Y') : '-' }}</td>
                                    <td>
                                        @if ($item->file)
                                            <a href="{{ route('admin.surat-masuk.download',$item->kode) }}" target="_blank" class="btn btn-success btn-sm">Download</a>
                                        @else
                                            <button class="btn btn-sm btn-danger">Tidak Ada</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.surat-masuk.show', $item->id) }}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-eye"></i> Detail</a>
                                            <a href="{{ route('admin.disposisi-surat.index', $item->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Disposisi</a>
                                            <a href="{{ route('admin.surat-masuk.edit', $item->id) }}"
                                                class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="" method="post"
                                            class="d-inline" id="formDelete">
                                            @csrf
                                            @method('delete')
                                            <button data-action="{{ route('admin.surat-masuk.destroy',$item->id) }}" class="btn btn-sm btn-danger btnDelete"><i
                                                    class="fas fa-trash"></i> Hapus</button>
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
            $('body').on('click','.btnDelete', function(e) {
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
                        $('#formDelete').attr('action',action);
                        $('#formDelete').submit();
                    }
                })
            })
        })
    </script>
    @include('admin.layouts.partials.sweetalert')
@endpush
