<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Siswa, Kelas, Ekskul, NilaiMulti11};
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class NilaiMulti11Controller extends Controller
{
    public function nilaiMulti11()
    {
        $nama_kelas = ['11 E2', '11 E1'];

        $siswa = Siswa::whereHas('kelas', function ($query) use($nama_kelas) {
            $query->whereIn('kelas', $nama_kelas);
        })->get();

        $kelas = Kelas::where('kelas', '11 E1')->orWhere('kelas', '11 E2')->get();
        $ekskul = Ekskul::all();

        return view('nilai.add-multi11', compact('siswa', 'kelas', 'ekskul'));
    }

    public function postNilainilaiMulti11(Request $request)
    {
        // dd($request->all());
        $data = $this->validate($request,[
            'nis'      => 'required|unique:nilai_multi11,nis',
            'siswa_id' => 'required|unique:nilai_multi11,siswa_id',
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

        $data['ppercetakan'] = $request->ppercetakan;
        $data['kpercetakan'] = $request->kpercetakan;

        $data['panimasi'] = $request->panimasi;
        $data['kanimasi'] = $request->kanimasi;

        $data['akademik']      = $request->akademik;
        $data['integritas']    = $request->integritas;
        $data['religius']      = $request->religius;
        $data['nasionalis']    = $request->nasionalis;
        $data['mandiri']       = $request->mandiri;
        $data['gotong_royong'] = $request->gotong_royong;
        $data['catatan']       = $request->catatan;

        $data['ekskul']            = $request->ekskul;
        $data['keterangan_ekskul'] = $request->keterangan_ekskul;

        NilaiMulti11::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function detailNilai($id)
    {
        $rapot = NilaiMulti11::findOrFail($id);

        return view('rapot.multi11.detail', compact('rapot'));
    }

    public function editNilai($id)
    {
        $nilai = NilaiMulti11::findOrFail($id);
        $nama_kelas = ['11 E2', '11 E1'];

        $siswa = Siswa::whereHas('kelas', function ($query) use($nama_kelas) {
            $query->whereIn('kelas', $nama_kelas);
        })->get();

        $kelas = Kelas::where('kelas', '11 E1')->orWhere('kelas', '11 E2')->get();
        $ekskul = ekskul::all();

        return view('rapot.multi11.edit', compact('nilai', 'siswa', 'kelas', 'ekskul'));
    }

    public function updateNilai(Request $request, $id)
    {
        // dd($request->all());
        $nilai = NilaiMulti11::findOrFail($id);

        DB::table('nilai_multi11')->where('id', $nilai->id)->update([
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

            'ppercetakan' => $request->ppercetakan,
            'kpercetakan' => $request->kpercetakan,

            'panimasi' => $request->panimasi,
            'kanimasi' => $request->kanimasi,

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

    public function cetakRapotMulti11($id)
    {
    	$rapot = NilaiMulti11::find($id);

    	$pdf = PDF::loadview('rapot.multi11.cetak', compact('rapot'));
    	return $pdf->stream();
    }

    public function destroyNilai($id)
    {
        $nilai = NilaiMulti11::findorFail($id);
        $nilai->delete();

        return redirect()->back()->with('success', 'Nilai tersebut berhasil di hapus!');
    }
}
