<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('layout.css')
    @stack('css')
    <title>Parawisata</title>
</head>

<body>
    @include('admin.layout.navbar')
    <!-- main container -->
    <main role="main" class="container">
        <div class="flash-data" data-flashdata="{{Session::has('success')}}"></div>

        <!-- search -->
        <div class="col-md-6 mx-auto">
            <form class="form-inline justify-content-center">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <!-- end search -->
        @yield('content')

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <hr class="featurette-divider">
            <p class="float-right"><a href="#">Back to top</a></p>
            <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </div>
    </footer>
    @include('layout.js');
    @stack('js')
</body>

</html>