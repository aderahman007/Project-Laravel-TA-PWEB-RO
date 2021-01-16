@extends('user.layout.template')
@push('css')

@endpush
@section('content')

<!-- Carousel -->
<div id="myCarousel" class="carousel slide mt-4" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($carousel as $cs => $sl)
        <li data-target="#myCarousel" data-slide-to="{{$cs}}" class="{{$cs==0 ? 'active' : ''}}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($carousel as $c => $slider)
        <div class="carousel-item {{$c==0 ? 'active' : ''}}">
            <img src="{{asset('image_upload/' . $slider->foto)}}" alt="First slide" width="100%" height="500">
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- end carousel -->

<section class="jumbotron text-center mt-2">
    <div class="container">
        <h1 class="jumbotron-heading text-success">Yakin gak mau?</h1>
        <p class="lead text-success">Liburan bersama keluarga tentu menjadi momen yang ditunggu setiap tahunnya. ... harus dipertimbangkan bersama, agar
            seluruh anggota keluarga bisa menikmati ... akan membuat kegiatan liburan kamu semakin aman dan menyenangkan.</p>
        <p>
            <a href="#" class="btn btn-success my-2">Pesan Sekarang</a>
        </p>
    </div>
</section>
</div>
@endsection
@push('js')

@endpush