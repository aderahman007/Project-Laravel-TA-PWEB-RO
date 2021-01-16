@extends('user.layout.template')
@push('css')

@endpush
@section('content')
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Destinasi</h5>
        <hr class="featurette-divider">
        <div class="row mt-4">
            @foreach($destinasi as $d)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap" src="{{asset('image_upload/' . $d->foto)}}">
                    <div class="card-body">
                        <h5 class="card-text">
                            {{$d->wisata}}
                            <?php
                            $i = 1;
                            for ($i = 1; $i < 5; $i++) {
                                echo '<i class="fa fa-star" aria-hidden="true"></i>';
                            }
                            ?>
                            </i>
                        </h5>

                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <a href="{{route('ShowDestinasi', $d->id)}}" class="btn btn-sm btn-outline-success text-success">Lihat selengkapnya...</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        {{$destinasi->links()}}
    </div>
</div>
@endsection
@push('js')

@endpush