@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Edit Dokumentasi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.documentasi.update', $item->id) }}" method="post" class="needs-validation"
                        novalidate="">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role_id" id="role_id"
                                class="form-control @error('role_id') is-invalid @enderror">
                                <option value="" disabled selected>Pilih Role</option>
                                @foreach ($roles as $role)
                                    <option @selected($item->role_id == $role->id) value="{{ $role->id }}">{{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
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
                            <button class="btn float-right btn-primary">Update</button>
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
        // Define function to open filemanager window
        var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        // Define LFM summernote button
        var LFMButton = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function() {

                    lfm({
                        type: 'image',
                        prefix: '/admin/filemanager'
                    }, function(lfmItems, path) {
                        lfmItems.forEach(function(lfmItem) {
                            context.invoke('insertImage', lfmItem.url);
                        });
                    });

                }
            });
            return button.render();
        };

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
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['popovers', ['lfm']],
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
                height: 400,
                buttons: {
                    lfm: LFMButton
                }
            });
        });
    </script>
@endpush
