@extends('admin.layout.template')
@push('css')

@endpush
@section('content')
<div class="d-flex justify-content-end">
    <a href="#" class="btn btn-success" onclick="tambah()">Tambah destinasi</a>
</div>
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Destinasi</h5>
        <hr class="featurette-divider">
        <div class="row mt-4">
            @foreach($destinasi as $d)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" alt="Card image cap" src="{{asset('image_upload/' . $d->foto)}}">
                    <div class="card-body">
                        <h5 class="card-text">
                            {{$d->wisata}}
                            <?php
                            $i = 1;
                            for ($i = 1; $i < 5; $i++) {
                                echo '<i class="fa fa-star" aria-hidden="true"></i>';
                            }
                            ?>
                        </h5>

                        <div class="row d-flex justify-content-end align-items-center mt-3">
                            <a href="{{route('destinasi.show', $d->id)}}" class="btn btn-sm btn-outline-success text-success mr-1 mb-1">Lihat selengkapnya...</a>
                            <button type="button" class="btn btn-sm btn-outline-warning text-warning mr-1" onclick="edit('+{{$d->id}}+')">Edit</button>
                            <form action="{{route('destinasi.destroy', $d->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-sm btn-outline-danger text-danger mr-1">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        {{$destinasi->links()}}
    </div>
</div>
@include('admin.modal_tambah')
@include('admin.modal_edit')
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

    function tambah() {
        $('#modaltambah').modal({
            keyboard: false,
            backdrop: 'static',
            show: true,
        });
        $('#modaltambah form')[0].reset();
    }

    function edit(id) {
        $('#modaledit').modal({
            keyboard: false,
            backdrop: 'static',
            show: true
        });
        $.ajax({
            url: "{{url('admin/destinasi')}}" + '/' + id + '/edit',
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.destinasi').val(data.wisata);
                // $('.descripsi').val(data.descripsi);
                CKEDITOR.instances.descripsi.setData(data.descripsi);
                // CKEDITOR.instances.alamat.setData(data.alamat);
                $('.alamat').val(data.alamat);
                $('.foto').attr('src', '{{asset("image_upload")}}' + '/' + data.foto);
                $('.action').attr('action', '{{url("admin/destinasi")}}' + '/' + data.id);

            },
            error: function() {
                alert("Noting Data");
            }
        });
    }
</script>

@endpush