<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Jadwal, Kelas, Mapel, Guru};
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
     public function addJadwal()
    {
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $guru = guru::all();
        return view('jadwal.add', compact('kelas', 'mapel', 'guru'));
    }

    public function postAddJadwal(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        // profile
        $data['semester'] = $request->semester;
        $data['tahun']    = $request->tahun;
        $data['kelas_id'] = $request->kelas_id;
        $data['mapel_id'] = $request->mapel_id;
        $data['jam']      = $request->jam;
        $data['guru_id']  = $request->guru_id;
        Jadwal::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableJadwal()
    {
        $jadwal = Jadwal::all();

        return view('jadwal.table', compact('jadwal'));
    }

    public function editJadwal($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $guru = guru::all();

        return view('jadwal.edit', compact('jadwal', 'kelas', 'mapel', 'guru'));
    }

    public function updateJadwal(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        DB::table('jadwal')->where('id', $jadwal->id)->update([
            'semester' => $request->semester,
            'tahun'    => $request->tahun,
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
            'jam'      => $request->jam,
            'guru_id'  => $request->guru_id,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyJadwal($id)
    {
        $jadwal = Jadwal::findorFail($id);
        $jadwal->delete();

        return redirect()->back()->with('success', 'Jadwal tersebut berhasil di hapus!');
    }
}
