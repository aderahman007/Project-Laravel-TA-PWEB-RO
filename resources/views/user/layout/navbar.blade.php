<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="https://beritabaik.files.wordpress.com/2010/01/indonesia.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Parawisata
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ (request()-> is('/')) ? 'active' : '' }}" href="{{route('UserIndex')}}">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()-> is('destinasi*')) ? 'active' : '' }}" href="{{route('UserDestinasi')}}">Destinasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()-> is('galery*')) ? 'active' : '' }}" href="{{route('UserGalery')}}">Galery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()-> is('tentang*')) ? 'active' : '' }}" href="{{route('UserTentang')}}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()-> is('kontak*')) ? 'active' : '' }}" href="{{route('UserKontak')}}">Kontak</a>
                </li>
            </ul>
            <span class="navbar-right">
                <a class="btn btn-sm btn-success" href="{{route('login')}}" title="Anda admin? Silahkan login disini!">Login admin</a>
            </span>
        </div>
    </div>
</nav>