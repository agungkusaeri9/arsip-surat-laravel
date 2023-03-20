@extends('admin.layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Galeri File</h1>
</div>
    <div class="row mt-sm-4">
        @foreach ($items as $item)
            <div class="col-md-4 mb-4">
                <a href="" class="text-dark text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <i class="fas fa-file-pdf text-danger fa-8x mb-3"></i>
                                <h5>{{ $item['kode'] }}</h5>
                            </div>
                            <p>
                                {{ $item['keterangan'] }}
                            </p>
                            <div class="text-center">
                                @if (\Str::substr($item['kode'],0,2) === 'SM')
                                @php
                                    $print = route('admin.surat-masuk.print',$item['kode']);
                                    $download = route('admin.surat-masuk.download',$item['kode']);
                                @endphp
                                @else
                                @php
                                    $print = route('admin.surat-keluar.print',$item['kode']);
                                    $download = route('admin.surat-keluar.download',$item['kode']);
                                @endphp
                                @endif

                                <a href="{{ $download }}" target="_blank" class="btn btn-success"><i class="fas fa-download"></i> Download</a>
                                <a href="{{ $print }}"  target="_blank"class="btn btn-danger"><i class="fas fa-print"></i> Cetak</a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <style>
        .profile {
            background-image: url('{{ auth()->user()->avatar() }}');
            height: 220px;
            width: 220px;
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
