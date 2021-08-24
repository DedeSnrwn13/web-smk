<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Siswa, Kelas, Ekskul, NilaiMulti12};
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class NilaiMulti12Controller extends Controller
{
    public function nilaiMulti12()
    {
        $nama_kelas = ['12 E2', '12 E1'];

        $siswa = Siswa::whereHas('kelas', function ($query) use($nama_kelas) {
            $query->whereIn('kelas', $nama_kelas);
        })->get();

        $kelas = Kelas::where('kelas', '12 E1')->orWhere('kelas', '12 E2')->get();
        $ekskul = Ekskul::all();

        return view('nilai.add-multi12', compact('siswa', 'kelas', 'ekskul'));
    }

    public function postNilainilaiMulti12(Request $request)
    {
        // dd($request->all());
        $data = $this->validate($request,[
            'nis'      => 'required|unique:nilai_multi12,nis',
            'siswa_id' => 'required|unique:nilai_multi12,siswa_id',
        ]);

        $data['nis']      = $request->nis;
        $data['siswa_id'] = $request->siswa_id;
        $data['kelas_id'] = $request->kelas_id;

        $data['pmtk'] = $request->pmtk;
        $data['kmtk'] = $request->kmtk;

        $data['ppai'] = $request->ppai;
        $data['kpai'] = $request->kpai;

        $data['pindonesia'] = $request->pindonesia;
        $data['kindonesia'] = $request->kindonesia;

        $data['ppkn'] = $request->ppkn;
        $data['kpkn'] = $request->kpkn;

        $data['pinggris'] = $request->pinggris;
        $data['kinggris'] = $request->kinggris;

        $data['pjepang'] = $request->pjepang;
        $data['kjepang'] = $request->kjepang;

        $data['ppkk'] = $request->ppkk;
        $data['kpkk'] = $request->kpkk;

        $data['pinteraktif'] = $request->pinteraktif;
        $data['kinteraktif'] = $request->kinteraktif;

        $data['paudio'] = $request->paudio;
        $data['kaudio'] = $request->kaudio;

        $data['akademik']      = $request->akademik;
        $data['integritas']    = $request->integritas;
        $data['religius']      = $request->religius;
        $data['nasionalis']    = $request->nasionalis;
        $data['mandiri']       = $request->mandiri;
        $data['gotong_royong'] = $request->gotong_royong;
        $data['catatan']       = $request->catatan;

        $data['mitra_pkl']  = $request->mitra_pkl;
        $data['lokasi']     = $request->lokasi;
        $data['lama_pkl']   = $request->lama_pkl;
        $data['keterangan'] = $request->keterangan;

        $data['ekskul']            = $request->ekskul;
        $data['keterangan_ekskul'] = $request->keterangan_ekskul;

        NilaiMulti12::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function detailNilai($id)
    {
        $rapot = NilaiMulti12::findOrFail($id);

        return view('rapot.multi12.detail', compact('rapot'));
    }

    public function editNilai($id)
    {
        $nilai = NilaiMulti12::findOrFail($id);
        $nama_kelas = ['12 E2', '12 E1'];

        $siswa = Siswa::whereHas('kelas', function ($query) use($nama_kelas) {
            $query->whereIn('kelas', $nama_kelas);
        })->get();

        $kelas = Kelas::where('kelas', '12 E1')->orWhere('kelas', '12 E2')->get();
        $ekskul = ekskul::all();

        return view('rapot.multi12.edit', compact('nilai', 'siswa', 'kelas', 'ekskul'));
    }

    public function updateNilai(Request $request, $id)
    {
        // dd($request->all());
        $nilai = NilaiMulti12::findOrFail($id);

        DB::table('nilai_multi12')->where('id', $nilai->id)->update([
            'nis'      => $request->nis,
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,

            'pmtk' => $request->pmtk,
            'kmtk' => $request->kmtk,

            'ppai' => $request->ppai,
            'kpai' => $request->kpai,

            'pindonesia' => $request->pindonesia,
            'kindonesia' => $request->kindonesia,

            'ppkn' => $request->ppkn,
            'kpkn' => $request->kpkn,

            'pinggris' => $request->pinggris,
            'kinggris' => $request->kinggris,

            'pjepang' => $request->pjepang,
            'kjepang' => $request->kjepang,

            'ppkk' => $request->ppkk,
            'kpkk' => $request->kpkk,

            'pinteraktif' => $request->pinteraktif,
            'kinteraktif' => $request->kinteraktif,

            'paudio' => $request->paudio,
            'kaudio' => $request->kaudio,

            'akademik'          => $request->akademik,
            'integritas'        => $request->integritas,
            'religius'          => $request->religius,
            'nasionalis'        => $request->nasionalis,
            'mandiri'           => $request->mandiri,
            'gotong_royong'     => $request->gotong_royong,
            'catatan'           => $request->catatan,

            'mitra_pkl' => $request->mitra_pkl,
            'lokasi' => $request->lokasi,
            'lama_pkl' => $request->lama_pkl,
            'keterangan' => $request->keterangan,

            'ekskul'            => $request->ekskul,
            'keterangan_ekskul' => $request->keterangan_ekskul,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function cetakRapotMulti12($id)
    {
    	$rapot = NilaiMulti12::find($id);

    	$pdf = PDF::loadview('rapot.multi12.cetak', compact('rapot'));
    	return $pdf->stream();
    }

    public function destroyNilai($id)
    {
        $nilai = NilaiMulti12::findorFail($id);
        $nilai->delete();

        return redirect()->back()->with('success', 'Nilai tersebut berhasil di hapus!');
    }
}
