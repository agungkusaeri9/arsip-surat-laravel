@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Dokumentasi</h5>
            </div>
            <div class="card-body">
                {!! $item->isi !!}
            </div>
        </div>
    </div>
</div>
@endsection
