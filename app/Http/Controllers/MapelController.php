<?php

namespace App\Http\Controllers;

use App\{Mapel, Kelas, NamaMapel};
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function addLesson()
    {
        $kelas = Kelas::all();
        $mapels = NamaMapel::all();
        return view('mapel.add', compact('kelas', 'mapels'));
    }

    public function postAddLesson(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'kelas_id'       => 'required',
            'kode_mapel'     => 'required|string',
            'mata_pelajaran' => 'required|string|min:2|max:50',
            'detail_mapel'   => 'required|min:10',
        ]);

        $lesson = new Mapel();
        $lesson->kelas_id       = $request->kelas_id;
        $lesson->kode_mapel     = $request->kode_mapel;
        $lesson->detail_mapel   = $request->detail_mapel;
        $lesson->mata_pelajaran = $request->mata_pelajaran;
        $lesson->save();

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableLesson()
    {
        $mapels = Mapel::all();

        return view('mapel.table', compact('mapels'));
    }

    public function editLesson($id)
    {
        $lesson = Mapel::findOrFail($id);
        $kelas  = Kelas::all();

        return view('mapel.edit', compact('lesson', 'kelas'));
    }

    public function updateLesson(Request $request, $id)
    {
        $lesson = Mapel::findOrFail($id);

        $this->validate($request,[
            'kelas_id'       => 'required',
            'kode_mapel'     => 'required|string',
            'mata_pelajaran' => 'required|string|min:2|max:50',
            'detail_mapel'   => 'required|min:10',
        ]);

        DB::table('mapel')->where('id', $lesson->id)->update([
            'kode_mapel'     => $request->kode_mapel,
            'kelas_id'       => $request->kelas_id,
            'mata_pelajaran' => $request->mata_pelajaran,
            'detail_mapel'   => $request->detail_mapel,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyLesson($id)
    {
        $lesson = Mapel::findorFail($id);
        $lesson->delete();

        return redirect()->back()->with('success', 'Mata Pelajaran tersebut berhasil di hapus!');
    }
}
