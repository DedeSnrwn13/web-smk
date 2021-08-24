<?php

namespace App\Http\Controllers;

use App\{Kelas, Jurusan};
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function addClass()
    {
        $jurusan = Jurusan::all();

        return view('kelas.add', compact('jurusan'));
    }

    public function postAddClass(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'kelas' => 'required|string|min:1|max:50|unique:kelas,kelas,',
            'jurusan_id' => 'required',
            'jumlah_siswa' => 'required',
        ]);

        $class = new Kelas();
        $class->kelas        = $request->kelas;
        $class->jurusan_id   = $request->jurusan_id;
        $class->jumlah_siswa = $request->jumlah_siswa;
        $class->save();

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableClass()
    {
        $kelas = Kelas::all();

        return view('kelas.table', compact('kelas'));
    }

    public function editClass($id)
    {
        $class = Kelas::findOrFail($id);
        $jurusan = Jurusan::all();

        return view('kelas.edit', compact('class', 'jurusan'));
    }

    public function updateClass(Request $request, $id)
    {
        $class = Kelas::findOrFail($id);

        $this->validate($request,[
            'kelas' => 'required|string|min:1|max:50',
            'jurusan_id' => 'required|string',
            'jumlah_siswa' => 'required',
        ]);

        DB::table('kelas')->where('id', $class->id)->update([
            'jurusan_id' => $request->jurusan_id,
            'kelas'        => $request->kelas,
            'jumlah_siswa' => $request->jumlah_siswa,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyClass($id)
    {
        $class = Kelas::findorFail($id);
        $class->delete();

        return redirect()->back()->with('success', 'Kelas tersebut berhasil di hapus!');
    }
}
