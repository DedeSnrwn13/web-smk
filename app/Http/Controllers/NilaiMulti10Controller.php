<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Siswa, Kelas, Ekskul, NilaiMulti10};
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class NilaiMulti10Controller extends Controller
{
    public function nilaiMulti10()
    {
        $nama_kelas = ['10 E2', '10 E1'];

        $siswa = Siswa::whereHas('kelas', function ($query) use($nama_kelas) {
            $query->whereIn('kelas', $nama_kelas);
        })->get();

        $kelas = Kelas::where('kelas', '10 E1')->orWhere('kelas', '10 E2')->get();
        $ekskul = Ekskul::all();

        return view('nilai.add-multi10', compact('siswa', 'kelas', 'ekskul'));
    }

    public function postNilainilaiMulti10(Request $request)
    {
        // dd($request->all());
        $data = $this->validate($request,[
            'nis'      => 'required|unique:nilai_multi10,nis',
            'siswa_id' => 'required|unique:nilai_multi10,siswa_id',
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

        $data['psiskom'] = $request->psiskom;
        $data['ksiskom'] = $request->ksiskom;

        $data['pjaringan'] = $request->pjaringan;
        $data['kjaringan'] = $request->kjaringan;

        $data['ppemrograman'] = $request->ppemrograman;
        $data['kpemrograman'] = $request->kpemrograman;

        $data['pdesain'] = $request->pdesain;
        $data['kdesain'] = $request->kdesain;

        $data['akademik']      = $request->akademik;
        $data['integritas']    = $request->integritas;
        $data['religius']      = $request->religius;
        $data['nasionalis']    = $request->nasionalis;
        $data['mandiri']       = $request->mandiri;
        $data['gotong_royong'] = $request->gotong_royong;
        $data['catatan']       = $request->catatan;

        $data['ekskul']            = $request->ekskul;
        $data['keterangan_ekskul'] = $request->keterangan_ekskul;

        NilaiMulti10::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function detailNilai($id)
    {
        $rapot = NilaiMulti10::findOrFail($id);

        return view('rapot.multi10.detail', compact('rapot'));
    }

    public function editNilai($id)
    {
        $nilai = NilaiMulti10::findOrFail($id);
        $nama_kelas = ['10 E2', '10 E1'];

        $siswa = Siswa::whereHas('kelas', function ($query) use($nama_kelas) {
            $query->whereIn('kelas', $nama_kelas);
        })->get();

        $kelas = Kelas::where('kelas', '10 E1')->orWhere('kelas', '10 E2')->get();
        $ekskul = ekskul::all();

        return view('rapot.multi10.edit', compact('nilai', 'siswa', 'kelas', 'ekskul'));
    }

    public function updateNilai(Request $request, $id)
    {
        // dd($request->all());
        $nilai = NilaiMulti10::findOrFail($id);

        DB::table('nilai_multi10')->where('id', $nilai->id)->update([
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

            'psiskom' => $request->psiskom,
            'ksiskom' => $request->ksiskom,

            'pjaringan' => $request->pjaringan,
            'kjaringan' => $request->kjaringan,

            'ppemrograman' => $request->ppemrograman,
            'kpemrograman' => $request->kpemrograman,

            'pdesain' => $request->pdesain,
            'kdesain' => $request->kdesain,

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

    public function cetakRapotMulti10($id)
    {
    	$rapot = NilaiMulti10::find($id);

    	$pdf = PDF::loadview('rapot.multi10.cetak', compact('rapot'));
    	return $pdf->stream();
    }

    public function destroyNilai($id)
    {
        $nilai = NilaiMulti10::findorFail($id);
        $nilai->delete();

        return redirect()->back()->with('success', 'Nilai tersebut berhasil di hapus!');
    }
}
