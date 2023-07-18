<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Portofolio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{ url('/portofolio') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-12 mb-3">
              <label for="nama_siswa">Nama: </label>
              <input type="hidden" id="siswa_id" name="siswa_id">
              <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-12 mb-3">
              <label for="file">File: </label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="file" name="file">
                <label class="custom-file-label" for="file">Choose file</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 mb-3">
              <label for="deskripsi">Deskripsi: </label>
              <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">
            <i class="bx bx-send"></i> Simpan
          </button>
        </div>
      </form>
    </div>

  </div>

</div>