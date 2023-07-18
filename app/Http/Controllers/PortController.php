<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PortController extends Controller
{
    public function index()
    {
        $data = DB::select("SELECT siswa.id as 'id', siswa.nama_siswa, COUNT('portfolio.id') as 'jumlah' FROM siswa LEFT JOIN kelas ON siswa.kelas_id = kelas.id LEFT JOIN portofolio ON siswa.id = portofolio.siswa_id LEFT JOIN guru on kelas.guru_id = guru.id WHERE guru.id_card = '" . Auth::user()->id_card . "' GROUP BY siswa.id, siswa.nama_siswa");
        return view('guru.portofolio.index', compact('data'));
    }


}
