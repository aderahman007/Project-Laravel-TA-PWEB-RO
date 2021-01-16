@extends('user.layout.template')
@push('css')

@endpush
@section('content')
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Galery</h5>
        <hr class="featurette-divider">
        <div class="row mt-4">
            @foreach($galery as $g)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap" src="{{asset('image_upload/' . $g->foto)}}">
                    <div class="card-body">
                        <h5 class="card-text">{{$g->wisata}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$galery->links()}}
    </div>
</div>
@endsection
@push('js')

@endpush