<?php

namespace App\Http\Controllers;


use App\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PortController extends Controller
{
    public function index()
    {
        $data = DB::select("SELECT siswa.id as 'id', siswa.nama_siswa, COUNT(portofolio.id) as 'jumlah' FROM siswa LEFT JOIN kelas ON siswa.kelas_id = kelas.id LEFT JOIN portofolio ON siswa.id = portofolio.siswa_id LEFT JOIN guru on kelas.guru_id = guru.id GROUP BY siswa.id, siswa.nama_siswa");
        return view('guru.portofolio.index', compact('data'));
    }

    public function getSertifikat($id)
    {
        try {
            $exist = Portofolio::where('siswa_id', $id)->get();
            return response()->json([
                'status' => true,
                'data' => $exist
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'data' => $th->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $file = $request->file('file');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'sertifikat';
            $file->move($tujuan_upload, $nama_file);
            Portofolio::create([
                'siswa_id' => $request->siswa_id,
                'url'   => 'sertifikat/' . $nama_file,
                'deskripsi' => $request->deskripsi,
            ]);
            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = Portofolio::findOrFail($id);
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
