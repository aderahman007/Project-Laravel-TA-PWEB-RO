@extends('user.layout.template')
@push('css')

@endpush
@section('content')
<div class="card mt-4">
    <div class="card-body">
        <h2 class="card-title text-center">{{$destinasi['wisata']}}</h2>
        <hr class="featurette-divider">
        <img class="my-3 mx-auto d-block" src="{{asset('image_upload/' . $destinasi['foto'])}}" alt="" height="300">
        <p class="text-justify">{{$destinasi['descripsi']}}</p>
    </div>
</div>
@endsection
@push('js')

@endpush