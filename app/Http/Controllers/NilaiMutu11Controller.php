<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Siswa, Kelas, Ekskul, NilaiMutu11, Mapel, Nilai, NamaMapel};
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class NilaiMutu11Controller extends Controller
{
    public function nilaiMutu11()
    {
        $nama_kelas = ['11 A2', '11 A1'];

        $siswa = Siswa::whereHas('kelas', function ($query) use($nama_kelas) {
            $query->whereIn('kelas', $nama_kelas);
        })->get();

        $kelas = Kelas::where('kelas', '11 A1')->orWhere('kelas', '11 A2')->get();
        $ekskul = Ekskul::all();

        return view('nilai.add-mutu11', compact('siswa', 'kelas', 'ekskul'));
    }

    public function getMapelMutu11($id_kelas)
    {
        $mapel = Mapel::where('kelas_id', $id_kelas)->get();

        return response()->json($mapel);
    }

    public function getStudentMutu11(Request $request)
    {
        $search = $request->nis;

        if($search == ''){
            $siswas = Siswa::orderby('nis','asc')->select('nis', 'id')->get();
        } else{
            $siswas = Siswa::orderby('nis','asc')->select('nis', 'id')->where('nis', 'like', '%' .$search . '%')->get();
        }

        $response = array();
        foreach($siswas as $siswa){
            $response[] = array("value"=>$siswa->nama,"label"=>$siswa->id);
        }

        return response()->json($response);
    }

    public function storeMutu11(Request $request)
    {
        for ($i = 0; $i < count($request->mapel_id); $i++) {
            $nilai = new Nilai();
            $nilai->nis = $request->nis;
            $nilai->siswa_id = $request->siswa_id;
            $nilai->kelas_id = $request->kelas_id;
            $nilai->mapel_id = $request->mapel_id[$i]; // Disini pakai index, karena id (id_mapel) bertipe array, sama seperti nilai
            $nilai->nilai_pengetahuan = $request->nilai_pengetahuan[$i];
            $nilai->save();
        }

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function postNilainilaiMutu11(Request $request)
    {
        // dd($request->all());
        $data = $this->validate($request,[
            'nis'      => 'required|unique:nilai_mutu11,nis',
            'siswa_id' => 'required|unique:nilai_mutu11,siswa_id',
        ]);

        $data['nis']      = $request->nis;
        $data['siswa_id'] = $request->siswa_id;
        $data['kelas_id'] = $request->kelas_id;

        $data['akademik']      = $request->akademik;
        $data['integritas']    = $request->integritas;
        $data['religius']      = $request->religius;
        $data['nasionalis']    = $request->nasionalis;
        $data['mandiri']       = $request->mandiri;
        $data['gotong_royong'] = $request->gotong_royong;
        $data['catatan']       = $request->catatan;

        $data['ekskul']            = $request->ekskul;
        $data['keterangan_ekskul'] = $request->keterangan_ekskul;

        NilaiMutu11::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function detailNilai($id)
    {
        $rapot = NilaiMutu11::findOrFail($id);
        $mapel = Mapel::findOrFail($id);
        $siswa = Siswa::findOrFail($id);

        return view('rapot.mutu11.detail', compact('rapot', 'mapel', 'siswa'));
    }

    public function editNilai($id)
    {
        $nilai = NilaiMutu11::findOrFail($id);
        $nama_kelas = ['11 A2', '11 A1'];

        $siswa = Siswa::whereHas('kelas', function ($query) use($nama_kelas) {
            $query->whereIn('kelas', $nama_kelas);
        })->get();

        $kelas = Kelas::where('kelas', '11 A1')->orWhere('kelas', '11 A2')->get();
        $ekskul = ekskul::all();

        return view('rapot.mutu11.edit', compact('nilai', 'siswa', 'kelas', 'ekskul'));
    }

    public function updateNilai(Request $request, $id)
    {
        // dd($request->all());
        $nilai = NilaiMutu11::findOrFail($id);

        DB::table('nilai_mutu11')->where('id', $nilai->id)->update([
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

            'ekskul'            => $request->ekskul,
            'keterangan_ekskul' => $request->keterangan_ekskul,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function cetakRapotMutu11($id)
    {
    	$rapot = NilaiMutu11::find($id);

    	$pdf = PDF::loadview('rapot.mutu11.cetak', compact('rapot'));
    	return $pdf->stream();
    }

    public function destroyNilai($id)
    {
        $nilai = NilaiMutu11::findorFail($id);
        $nilai->delete();

        return redirect()->back()->with('success', 'Nilai tersebut berhasil di hapus!');
    }
}
