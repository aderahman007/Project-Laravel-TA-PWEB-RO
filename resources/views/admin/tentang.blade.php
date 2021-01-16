@extends('admin.layout.template')
@push('css')

@endpush
@section('content')

<!-- end search -->
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Tentang</h5>
        <hr class="featurette-divider">
        <img class="my-3 mx-auto d-block" src="{{$tentang['foto']}}" alt="" height="300">
        <p class="text-justify">{{$tentang['descripsi']}}</p>
    </div>
</div>
@endsection
@push('js')

@endpush