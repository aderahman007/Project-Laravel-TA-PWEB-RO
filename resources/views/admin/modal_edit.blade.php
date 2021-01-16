<!-- Modal -->
<div class="modal bd-example-modal-lg fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Tempat Wisata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="action" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label for="destinasi">Nama Destinasi</label>
                        <input type="text" class="form-control destinasi" name="destinasi" id="destinasi" placeholder="Nama wisata">
                    </div>

                    <div class="form-group">
                        <label for="descripsi">Descripsi</label>
                        <textarea type="text" class="form-control descripsi ckeditor" name="descripsi" id="descripsi" placeholder="Descripsi" cols="20" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="descripsi">Alamat</label>
                        <textarea type="text" class="form-control alamat" name="alamat" id="id_wisata" placeholder="alamat" cols="20" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categori">foto</label>
                        <img src="" class="d-block foto mb-2" alt="" width="100" height="75">
                        <input type="file" class="form-control-file foto" id="foto" name="foto">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>