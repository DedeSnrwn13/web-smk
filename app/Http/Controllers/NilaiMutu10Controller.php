<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Siswa, Kelas, Ekskul, NilaiMutu10};
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class NilaiMutu10Controller extends Controller
{
    public function nilaiMutu10()
    {
        $nama_kelas = ['10 A2', '10 A1'];

        $siswa = Siswa::whereHas('kelas', function ($query) use($nama_kelas) {
            $query->whereIn('kelas', $nama_kelas);
        })->get();

        $kelas = Kelas::where('kelas', '10 A1')->orWhere('kelas', '10 A2')->get();
        $ekskul = Ekskul::all();

        return view('nilai.add-mutu10', compact('siswa', 'kelas', 'ekskul'));
    }

    public function postNilainilaiMutu10(Request $request)
    {
        // dd($request->all());
        $data = $this->validate($request,[
            'nis'      => 'required|unique:nilai_mutu10,nis',
            'siswa_id' => 'required|unique:nilai_mutu10,siswa_id',
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

        $data['pkimia'] = $request->pkimia;
        $data['kkimia'] = $request->kkimia;

        $data['pfisika'] = $request->pfisika;
        $data['kfisika'] = $request->kfisika;

        $data['psunda'] = $request->psunda;
        $data['ksunda'] = $request->ksunda;

        $data['psejarah'] = $request->psejarah;
        $data['ksejarah'] = $request->ksejarah;

        $data['psbk'] = $request->psbk;
        $data['ksbk'] = $request->ksbk;

        $data['psimdig'] = $request->psimdig;
        $data['ksimdig'] = $request->ksimdig;

        $data['pbiologi'] = $request->pbiologi;
        $data['kbiologi'] = $request->kbiologi;

        $data['ppenanganan'] = $request->ppenanganan;
        $data['kpenanganan'] = $request->kpenanganan;

        $data['ppengolahan'] = $request->ppengolahan;
        $data['kpengolahan'] = $request->kpengolahan;

        $data['ppertanian'] = $request->ppertanian;
        $data['kpertanian'] = $request->kpertanian;

        $data['ppengendalian'] = $request->ppengendalian;
        $data['kpengendalian'] = $request->kpengendalian;

        $data['akademik']      = $request->akademik;
        $data['integritas']    = $request->integritas;
        $data['religius']      = $request->religius;
        $data['nasionalis']    = $request->nasionalis;
        $data['mandiri']       = $request->mandiri;
        $data['gotong_royong'] = $request->gotong_royong;
        $data['catatan']       = $request->catatan;

        $data['ekskul']            = $request->ekskul;
        $data['keterangan_ekskul'] = $request->keterangan_ekskul;

        NilaiMutu10::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function detailNilai($id)
    {
        $rapot = NilaiMutu10::findOrFail($id);

        return view('rapot.mutu10.detail', compact('rapot'));
    }

    public function editNilai($id)
    {
        $nilai = NilaiMutu10::findOrFail($id);
        $nama_kelas = ['10 A2', '10 A1'];

        $siswa = Siswa::whereHas('kelas', function ($query) use($nama_kelas) {
            $query->whereIn('kelas', $nama_kelas);
        })->get();

        $kelas = Kelas::where('kelas', '10 A1')->orWhere('kelas', '10 A2')->get();
        $ekskul = ekskul::all();

        return view('rapot.mutu10.edit', compact('nilai', 'siswa', 'kelas', 'ekskul'));
    }

    public function updateNilai(Request $request, $id)
    {
        // dd($request->all());
        $nilai = NilaiMutu10::findOrFail($id);

        DB::table('nilai_mutu10')->where('id', $nilai->id)->update([
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

            'pkimia' => $request->pkimia,
            'kkimia' => $request->kkimia,

            'pfisika' => $request->pfisika,
            'kfisika' => $request->kfisika,

            'psunda' => $request->psunda,
            'ksunda' => $request->ksunda,

            'psejarah' => $request->psejarah,
            'ksejarah' => $request->ksejarah,

            'psbk' => $request->psbk,
            'ksbk' => $request->ksbk,

            'psimdig' => $request->psimdig,
            'ksimdig' => $request->ksimdig,

            'pbiologi' => $request->pbiologi,
            'kbiologi' => $request->kbiologi,

            'ppenanganan' => $request->ppenanganan,
            'kpenanganan' => $request->kpenanganan,

            'ppengolahan' => $request->ppengolahan,
            'kpengolahan' => $request->kpengolahan,

            'ppertanian' => $request->ppertanian,
            'kpertanian' => $request->kpertanian,

            'ppengendalian' => $request->ppengendalian,
            'kpengendalian' => $request->kpengendalian,

            'akademik'          => $request->akademik,
            'integritas'        => $request->integritas,
            'religius'          => $request->religius,
            'nasionalis'        => $request->nasionalis,
            'mandiri'           => $request->mandiri,
            'gotong_royong'     => $request->gotong_royong,
            'catatan'           => $request->catatan,

            'ekskul'            => $request->ekskul,
            'keterangan_ekskul' => $request->keterangan_ekskul,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function cetakRapotMutu10($id)
    {
    	$rapot = NilaiMutu10::find($id);

    	$pdf = PDF::loadview('rapot.mutu10.cetak', compact('rapot'));
    	return $pdf->stream();
    }

    public function destroyNilai($id)
    {
        $nilai = NilaiMutu10::findorFail($id);
        $nilai->delete();

        return redirect()->back()->with('success', 'Nilai tersebut berhasil di hapus!');
    }
}
