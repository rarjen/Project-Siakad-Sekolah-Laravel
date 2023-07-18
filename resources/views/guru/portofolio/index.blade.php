@extends('template_backend.home')
@section('heading', 'Entry Data Portofolio')
@section('page')
<li class="breadcrumb-item active">Entry Data Portofolio</li>
@endsection
@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <div class="alert bg-info">
        <p class="text-white">
          Untuk menambah portofolio baru, klik tombol <strong class="text-dark">Tambah</strong>. Data yang sudah
          diinputkan tidak dapat dirubah. Jika terjadi kesalahan input, maka data harus dihapus dan diinput ulang.
        </p>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped" id="example1">
          <thead>
            <tr class="text-center">
              <th class="align-middle" style="width: 5%;">No</th>
              <th class="align-middle">Nama Siswa</th>
              <th class="align-middle">Sertifikat</th>
              <th class="align-middle">Detail</th>
              <th class="align-middle">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $item)
            <tr>
              <td class="align-middle text-center">{{$loop->iteration}}</td>
              <td class="align-middle">{{$item->nama_siswa}}</td>
              <td class="align-middle text-center">
                {{$item->jumlah}}
              </td>
              <td class="align-middle text-center">
                <button class="btn btn-sm btn-outline-dark" onclick="getSertifikat({{$item->id}})">
                  <i class="bx bx-search"></i>
                  Lihat
                </button>
              </td>
              <td class="text-center">
                <button class="btn btn-primary btn-sm" data-target="#modal-tambah" data-toggle="modal"
                  onclick="setId({{$item->id}})">
                  Tambah
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@include('guru.portofolio.modal_create')
@include('guru.portofolio.modal_sertifikat')
<script>
  async function getSertifikat(id) {
    const response = await fetch("{{ url('/portofolio') }}/" + id);
    const data = await response.json();
    // tampilkan data ke modal-edit dalam bentuk table
    let table = '';
    data.data.forEach((item, index) => {
      table += `
        <tr>
          <td>${index + 1}</td>
          <td>${item.deskripsi}</td>
          <td class="text-center">
            <a href="/${item.url}" target="__blank" class="btn btn-sm btn-outline-dark">
              <i class="bx bx-download"></i>
            </a>
          </td>
          <td class="text-center">
            <a href="{{ url('/portofolio/delete') }}/${item.id}/" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
              <i class="bx bx-trash"></i>
            </a>
          </td>
        </tr>
      `;
    });
    document.querySelector('#modal-sertifikat tbody').innerHTML = table;
    // tampilkan modal
    $('#modal-sertifikat').modal('show');

  }


  async function setId(id) {
    const response = await fetch("{{ url('/siswa/show') }}/"+id);
    const data = await response.json();
    document.getElementById('siswa_id').value = data.data.id;
    document.getElementById('nama_siswa').value = data.data.nama_siswa;
  }
</script>
@endsection