@extends('admin.layouts.app')
@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Filter Data</h1>
                </div>
                <form action="{{ route('admin.buku-agenda.surat-masuk.filter') }}" method="get">
                    <div class="card-body row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tanggal_awal">Tanggal Awal</label>
                                <input type="date" id="tanggal_awal" name="tanggal_awal" class="form-control" value="{{ request('tanggal_awal') ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md align-self-end">
                            <div class="form-group">
                                <button class="btn btn-info btn-sm mx-3 py-2 px-3 ">Filter</button>
                                <a href="{{ route('admin.buku-agenda.surat-masuk.pdf',[
                                    'tanggal_awal' => request('tanggal_awal'),
                                    'tanggal_akhir' => request('tanggal_akhir')
                                ]) }}" class="btn btn-danger btn-sm py-2 px-3"><i class="fas fa-file-pdf"></i> Export</a>
                                <a href="{{ route('admin.buku-agenda.surat-masuk.excel',[
                                    'tanggal_awal' => request('tanggal_awal'),
                                    'tanggal_akhir' => request('tanggal_akhir')
                                ]) }}" class="btn btn-secondary btn-sm py-2 px-3"><i class="fas fa-file-excel"></i> Export</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6>Buku Agenda Surat Masuk</h6>
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
                                                <a href="{{ route('admin.surat-masuk.download', $item->kode) }}"
                                                    target="_blank" class="btn btn-success btn-sm">Download</a>
                                            @else
                                                <button class="btn btn-sm btn-danger">Tidak Ada</button>
                                            @endif
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
        })
    </script>
    @include('admin.layouts.partials.sweetalert')
@endpush
