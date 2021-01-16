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
                    <a class="nav-link {{ (request()-> is('admin')) ? 'active' : '' }}" href="{{route('AdminIndex')}}">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()-> is('admin/destinasi*')) ? 'active' : '' }}" href="{{route('destinasi.index')}}">Destinasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()-> is('admin/galery*')) ? 'active' : '' }}" href="{{route('AdminGalery')}}">Galery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()-> is('admin/tentang*')) ? 'active' : '' }}" href="{{route('AdminTentang')}}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()-> is('admin/kontak*')) ? 'active' : '' }}" href="{{route('AdminKontak')}}">Kontak</a>
                </li>
            </ul>
            <span class="navbar-right">
                <a href="{{route('AdminLogout')}}" class="btn btn-sm btn-success">Logout</a>
            </span>
        </div>
    </div>
</nav>