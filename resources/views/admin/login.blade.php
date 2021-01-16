<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/floating-labels.css')}}">

    <title>Login || Admin</title>


    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    <!-- <link href="floating-labels.css" rel="stylesheet"> -->
</head>

<body>
    <div class="flash-data-success" data-flashdata="{{Session::has('success')}}"></div>
    <div class="flash-data-error" data-flashdata="{{Session::has('error')}}"></div>
    <form class="form-signin" action="{{route('AksiLogin')}}" method="post">
        {{csrf_field()}}
        <div class="text-center mb-4">
            <img class="mb-4" src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Login Admin</h1>
        </div>

        <div class="form-label-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autofocus>
            <label for="email">Email address</label>
        </div>

        <div class="form-label-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            <label for="password">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Ingat saya!
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2020-<?= date("Y"); ?></p>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        const flashDataSeccess = $('.flash-data-success').data('flashdata');
        const flashDataError = $('.flash-data-error').data('flashdata');

        if (flashDataSeccess) {
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: "{{Session::get('success')}}",
            });

        }
        if (flashDataError) {
            Swal.fire({
                icon: 'Error',
                title: 'Gagal',
                text: "{{Session::get('error')}}",
            });

        }
    </script>
</body>

</html>