@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Edit Surat</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.surat.update',$item->id) }}" method="post" class="needs-validation" novalidate="">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" required=""
                                name="judul" value="{{ $item->judul ?? old('judul') }}">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nomor</label>
                            <input type="text" class="form-control @error('nomor') is-invalid @enderror" required=""
                                name="nomor" value="{{ $item->nomor ?? old('nomor') }}">
                            @error('nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tempat, Tanggal</label>
                            <input type="text" class="form-control @error('tempat_waktu') is-invalid @enderror"
                                required="" name="tempat_waktu" value="{{ $item->tempat_waktu ?? old('tempat_waktu') }}">
                            @error('tempat_waktu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='isi' class='mb-2'>Isi</label>
                            <textarea name='isi' id='isi' cols='30' rows='3'
                                class='form-control @error('isi') is-invalid @enderror'>{{ $item->isi ?? old('isi') }}</textarea>
                            @error('isi')
                                <div class='invalid-feedback'>
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
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#isi').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['fontsize', ['fontsize']],
                    ['font', ['clear', 'fontname', 'fontsize', 'fontsizeunit', 'forecolor', 'backcolor',
                        'strikethrough', 'superscript', 'subscript'
                    ]],
                    ['misc', ['undo', 'redo']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']]
                ],
                'fontNames': ['Courier', 'Franklin Gothic', 'Fran', 'Georgia', 'Jost', 'Helvetica',
                    'Impact', 'Merriweather', 'Tahoma', 'Times', 'Verdana', 'Times New Roman'
                ],
                'fontNamesIgnoreCheck': ['Courier', 'Franklin Gothic', 'Fran', 'Georgia', 'Jost',
                    'Helvetica', 'Impact', 'Merriweather', 'Tahoma', 'Times', 'Verdana',
                    'Times New Roman'
                ],

                'lineHeights': ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0',
                    '3.0'
                ],

                fontSizes: ['7', '8', '9', '10', '11', '12', '13', '14', '16', '18', '24', '36', '48', '64',
                    '82'
                ],
                height: 400
            });
        });
    </script>
@endpush
