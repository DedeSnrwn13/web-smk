<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Rpp,Guru, Mapel};
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class RppController extends Controller
{
    public function addRpp()
    {
        $guru = Guru::all();
        $mapel = Mapel::all();
        return view('rpp.add', compact('guru', 'mapel'));
    }

    public function postAddRpp(Request $request)
    {
        $rpp = Rpp::all();

        $this->validate($request,[
            'lampiran'  => 'required|file|mimes:docx,pdf|max:5000',
        ]);

        // dd($request->all());
        $data = $request->all();

        if ($request->lampiran) {
            $file = $request->file('lampiran');
            $lampiran = sha1($request->lampiran . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('lampiran/rpp', $lampiran);
        } elseif ($rpp->lampiran) {
            $lampiran = $rpp->lampiran;
        } else {
            $lampiran = null;
        }

        $data['no']       = $request->no;
        $data['nik']      = $request->nik;
        $data['guru_id']  = $request->guru_id;
        $data['mapel_id'] = $request->mapel_id;
        $data['ki']       = $request->ki;
        $data['kd']       = $request->kd;
        $data['lampiran'] = $lampiran;
        Rpp::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableRpp()
    {
        $rpp = Rpp::all();

        return view('rpp.table', compact('rpp'));
    }

    public function detailRpp($id)
    {
        $rpp = Rpp::findOrFail($id);

        return view('rpp.detail', compact('rpp'));
    }

    public function editRpp($id)
    {
        $rpp = Rpp::findOrFail($id);
        $guru = Guru::all();
        $mapel = Mapel::all();

        return view('rpp.edit', compact('rpp', 'guru', 'mapel'));
    }

    public function updateRpp(Request $request, $id)
    {
        $rpp = Rpp::findOrFail($id);

        $this->validate($request,[
            'lampiran'  => 'file|mimes:docx,pdf|max:5000',
        ]);

        if ($request->lampiran) {
            Storage::delete($rpp->lampiran);

            $file = $request->file('lampiran');
            $lampiran = sha1($request->lampiran . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('lampiran/rpp', $lampiran);
        } elseif ($rpp->lampiran) {
            $lampiran = $rpp->lampiran;
        } else {
            $lampiran = null;
        }

        DB::table('rpp')->where('id', $rpp->id)->update([
            'no'       => $request->no,
            'nik'      => $request->nik,
            'guru_id'  => $request->guru_id,
            'mapel_id' => $request->mapel_id,
            'ki'       => $request->ki,
            'kd'       => $request->kd,
            'lampiran' => $lampiran,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyRpp($id)
    {
        $rpp = Rpp::findorFail($id);
        Storage::delete($rpp->lampiran);
        $rpp->delete();

        return redirect()->back()->with('success', 'RPP tersebut berhasil di hapus!');
    }
}
