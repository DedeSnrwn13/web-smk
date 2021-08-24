<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Materi, Kelas, Mapel};
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\{Storage, DB};

class MateriController extends Controller
{
    public function addMateri()
    {
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('materi.add', compact('kelas', 'mapel'));
    }

    public function postAddMateri(Request $request)
    {
        $materi = Materi::all();

        $this->validate($request,[
            'no'       => 'required|min:1|max:10',
            'judul'    => 'required|min:2|string',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
            'lampiran' => 'required|file|mimes:docx,pdf|max:5000',

        ]);

        // dd($request->all());
        $data = $request->all();

        // profile
        if ($request->lampiran) {
            $file = $request->file('lampiran');
            $lampiran = sha1($request->lampiran . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('lampiran/materi', $lampiran);
        } elseif ($materi->lampiran) {
            $lampiran = $materi->lampiran;
        } else {
            $lampiran = null;
        }

        // profile
        $data['no']       = $request->no;
        $data['judul']    = $request->judul;
        $data['kelas_id'] = $request->kelas_id;
        $data['mapel_id'] = $request->mapel_id;
        $data['lampiran'] = $lampiran;
        $data['link']     = $request->link;
        Materi::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableMateri()
    {
        $materi = Materi::all();

        return view('materi.table', compact('materi'));
    }

    public function detailMateri($id)
    {
        $materi = Materi::findOrFail($id);

        return view('materi.detail', compact('materi'));
    }

    public function editMateri($id)
    {
        $materi = Materi::findOrFail($id);
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('materi.edit', compact('materi', 'kelas', 'mapel'));
    }

    public function updateMateri(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $this->validate($request,[
            'no'         => 'required|min:1|max:10',
            'judul'      => 'required|min:2|string',
            'mapel_id'   => 'required',
            'kelas_id'   => 'required',
            'lampiran'   => 'file|mimes:docx,pdf|max:5000',
            'link'       => 'nullable'
        ]);

        // profile
        if ($request->lampiran) {
            Storage::delete($materi->lampiran);

            $file = $request->file('lampiran');
            $lampiran = sha1($request->nama . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('lampiran/materi', $lampiran);
        } elseif ($materi->lampiran) {
            $lampiran = $materi->lampiran;
        } else {
            $lampiran = null;
        }

        DB::table('materi')->where('id', $materi->id)->update([
            'no'         => $request->no,
            'judul'      => $request->judul,
            'kelas_id'   => $request->kelas_id,
            'mapel_id'   => $request->mapel_id,
            'lampiran'   => $lampiran,
            'link'       => $request->link,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyMateri($id)
    {
        $materi = Materi::findorFail($id);
        Storage::delete($materi->lampiran);
        $materi->delete();

        return redirect()->back()->with('success', 'Materi tersebut berhasil di hapus!');
    }
}
