<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Siswa, Kelas, Ekskul, NilaiMutu12};
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class NilaiMutu12Controller extends Controller
{
    public function nilaiMutu12()
    {
        $nama_kelas = ['12 A2', '12 A1'];

        $siswa = Siswa::whereHas('kelas', function ($query) use($nama_kelas) {
            $query->whereIn('kelas', $nama_kelas);
        })->get();

        $kelas = Kelas::where('kelas', '12 A1')->orWhere('kelas', '12 A2')->get();
        $ekskul = Ekskul::all();

        return view('nilai.add-mutu12', compact('siswa', 'kelas', 'ekskul'));
    }

    public function postNilainilaiMutu12(Request $request)
    {
        // dd($request->all());
        $data = $this->validate($request,[
            'nis'      => 'required|unique:nilai_mutu12,nis',
            'siswa_id' => 'required|unique:nilai_mutu12,siswa_id',
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

        $data['ppkk'] = $request->ppkk;
        $data['kpkk'] = $request->kpkk;

        $data['pmekanis'] = $request->pmekanis;
        $data['kmekanis'] = $request->kmekanis;

        $data['pbiologis'] = $request->pbiologis;
        $data['kbiologis'] = $request->kbiologis;

        $data['pinstrumental'] = $request->pinstrumental;
        $data['kinstrumental'] = $request->kinstrumental;

        $data['ppengujian'] = $request->ppengujian;
        $data['kpengujian'] = $request->kpengujian;

        $data['ppertanian'] = $request->ppertanian;
        $data['kpertanian'] = $request->kpertanian;

        $data['pkeamanan'] = $request->pkeamanan;
        $data['kkeamanan'] = $request->kkeamanan;

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

        NilaiMutu12::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function detailNilai($id)
    {
        $rapot = NilaiMutu12::findOrFail($id);

        return view('rapot.mutu12.detail', compact('rapot'));
    }

    public function editNilai($id)
    {
        $nilai = NilaiMutu12::findOrFail($id);
        $nama_kelas = ['12 A2', '12 A1'];

        $siswa = Siswa::whereHas('kelas', function ($query) use($nama_kelas) {
            $query->whereIn('kelas', $nama_kelas);
        })->get();

        $kelas = Kelas::where('kelas', '12 A1')->orWhere('kelas', '12 A2')->get();
        $ekskul = ekskul::all();

        return view('rapot.mutu12.edit', compact('nilai', 'siswa', 'kelas', 'ekskul'));
    }

    public function updateNilai(Request $request, $id)
    {
        // dd($request->all());
        $nilai = NilaiMutu12::findOrFail($id);

        DB::table('nilai_mutu12')->where('id', $nilai->id)->update([
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

            'ppkk' => $request->ppkk,
            'kpkk' => $request->kpkk,

            'pmekanis' => $request->pmekanis,
            'kmekanis' => $request->kmekanis,

            'pbiologis' => $request->pbiologis,
            'kbiologis' => $request->kbiologis,

            'pinstrumental' => $request->pinstrumental,
            'kinstrumental' => $request->kinstrumental,

            'ppengujian' => $request->ppengujian,
            'kpengujian' => $request->kpengujian,

            'ppertanian' => $request->ppertanian,
            'kpertanian' => $request->kpertanian,

            'pkeamanan' => $request->pkeamanan,
            'kkeamanan' => $request->kkeamanan,

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

    public function cetakRapotMutu12($id)
    {
    	$rapot = NilaiMutu12::find($id);

    	$pdf = PDF::loadview('rapot.mutu12.cetak', compact('rapot'));
    	return $pdf->stream();
    }

    public function destroyNilai($id)
    {
        $nilai = NilaiMutu12::findorFail($id);
        $nilai->delete();

        return redirect()->back()->with('success', 'Nilai tersebut berhasil di hapus!');
    }
}
