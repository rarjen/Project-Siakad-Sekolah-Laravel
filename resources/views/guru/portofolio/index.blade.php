@extends('template_backend.home')
@section('heading', 'Entry Data Portofolio')
@section('page')
<li class="breadcrumb-item active">Entry Data Portofolio</li>
@endsection
@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped">
          <thead>
            <tr class="text-center">
              <td class="align-middle" rowspan="2" style="width: 5%;">No</td>
              <td class="align-middle" rowspan="2">Nama Siswa</td>
              <td class="align-middle" rowspan="2">Sertifikat</td>
              <td class="align-middle" rowspan="2">Detail</td>
              <td class="align-middle" colspan="2">Aksi</td>
            </tr>
            <tr>
              <td>Ubah</td>
              <td>Hapus</td>
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
                <button class="btn btn-outline-primary">Lihat</button>
              </td>
              <td class="align-middle text-center">
                <button class="btn btn-warning">
                  <i class="fas fa-edit"></i>
                </button>
              </td>
              <td class="align-middle text-center">
                <button class="btn btn-danger">
                  <i class="fas fa-trash"></i>
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
@endsection