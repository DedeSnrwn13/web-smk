<?php

namespace App\Http\Controllers;

use App\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
    public function addInfo()
    {
        return view('Info.add');
    }

    public function postAddInfo(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'judul'     => 'required|min:2',
            'deskripsi' => 'required|string|min:10',
            'lampiran'  => 'required|file|mimes:png,jpg,jpeg,docx,pdf,xlsx,xls|max:5000',
        ]);

        $data = $request->all();

        // profile
        if ($request->lampiran) {
            $file = $request->file('lampiran');
            $filenameLampiran = sha1($request->nama . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('lampiran/informasi', $filenameLampiran);
        }

        $data['judul']     = $request->judul;
        $data['deskripsi'] = $request->deskripsi;
        $data['lampiran']  = $filenameLampiran;
        Informasi::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableInfo()
    {

        $infos = Informasi::all();

        return view('info.table', compact('infos'));
    }

    public function detailInfo($id)
    {
        $info = Informasi::findOrFail($id);

        return view('info.detail', compact('info'));
    }

    public function editInfo($id)
    {
        $info = Informasi::findOrFail($id);

        return view('info.edit', compact('info'));
    }

    public function updateInfo(Request $request, $id)
    {
        $info = Informasi::findOrFail($id);

        $this->validate($request,[
            'judul'     => 'required|min:2',
            'deskripsi' => 'required|string|min:10',
            'lampiran'  => 'file|mimes:png,jpg,jpeg,docx,pdf,xlsx,xls|max:5000',
        ]);

        if ($request->lampiran) {
            Storage::delete($info->lampiran);

            $file = $request->file('lampiran');
            $lampiran = sha1($file->getClientOriginalName() . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('lampiran/informasi', $lampiran);
        } elseif ($info->lampiran) {
            $lampiran = $info->lampiran;
        } else {
            $lampiran = null;
        }

        DB::table('informasi')->where('id', $info->id)->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'lampiran'  => $lampiran,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyLesson($id)
    {
        $info = Informasi::findorFail($id);
        Storage::delete($info->lampiran);
        $info->delete();

        return redirect()->back()->with('success', 'Informasi tersebut berhasil di hapus!');
    }
}
