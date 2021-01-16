@extends('user.layout.template')
@push('css')

@endpush
@section('content')
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Kontak</h5>
        <hr class="featurette-divider">
        <div class="row">
            <div class="col-md-6">
                <label for="saran">
                    <h5>Beri kami masukan</h5>
                </label>
                <form action="{{route('UserSaran')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="Kritik">Kritik</label>
                        <textarea class="form-control" name="kritik" id="kritik" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="saran">Saran</label>
                        <textarea class="form-control" name="saran" id="saran" rows="3"></textarea>
                    </div>
                    <button class="btn btn-success">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <label for="saran" class="mb-3">
                    <h5>Hubungi kami</h5>
                </label>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Admin 1</h5>
                        <hr class="featurette-divider">
                        <p class="card-text"><span class="fa fa-phone"></span> {{$kontak['admin1']}}</p>
                        <p class="card-text"><span class="fa fa-whatsapp"></span> {{$kontak['admin1']}}</p>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Admin 2</h5>
                        <hr class="featurette-divider">
                        <p class="card-text"><span class="fa fa-phone"></span> {{$kontak['admin2']}}</p>
                        <p class="card-text"><span class="fa fa-whatsapp"></span> {{$kontak['admin2']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: "{{Session::get('success')}}",
        });

    }
</script>
@endpush