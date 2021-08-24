<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Nilai, Siswa, Kelas, Ekskul, Mapel, Rapot};
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class NilaiController extends Controller
{
    public function nilaiMulti10()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $ekskul = Ekskul::all();
        $mapels = Mapel::all();
        return view('nilai.add-multi10', compact('siswa', 'kelas', 'ekskul', 'mapels'));
    }

    // public function postAddNilaiMulti10(Request $request)
    // {
    //     // dd($request->all());
    //     $this->validate($request,[
    //         'nis'      => 'required|unique:nilai,nis',
    //         'siswa_id' => 'required|unique:nilai,siswa_id',
    //     ]);
    //     // Di dalam perulangan ini, kita akan input banyak baris ke dalam table nilai, dengan id dan nilai dari inputan blade tadi.
    //     $request->except(['_token','_method']);
    //     for ($i = 0; $i < count($request->mapel_id); $i++) {
    //         $nilai = new Nilai();
    //         $nilai->nis      = $request->nis;
    //         $nilai->siswa_id = $request->siswa_id;
    //         $nilai->kelas_id = $request->kelas_id;
    //         $nilai->mapel_id = $request->mapel_id[$i];
    //         $nilai->nilai_keterampilan = $request->nilai_keterampilan[$i];
    //         $nilai->nilai_pengetahuan  = $request->nilai_pengetahuan[$i];
    //         $nilai->ekskul             = $request->ekskul;
    //         $nilai->keterangan_ekskul  = $request->keterangan_ekskul;
    //         $nilai->akademik      = $request->akademik;
    //         $nilai->integritas    = $request->integritas;
    //         $nilai->religius      = $request->religius;
    //         $nilai->nasionalis    = $request->nasionalis;
    //         $nilai->mandiri       = $request->mandiri;
    //         $nilai->gotong_royong = $request->gotong_royong;
    //         $nilai->catatan       = $request->catatan;
    //         $nilai->mitra_pkl     = $request->mitra_pkl;
    //         $nilai->lokasi        = $request->lokasi;
    //         $nilai->lama_pkl      = $request->lama_pkl;
    //         $nilai->keterangan    = $request->keterangan;
    //         $nilai->save();
    //     }

    //     return redirect()->back()->with('success', 'Tambah Data Nilai Berhasil!');
    // }


    public function postAddNilai(Request $request)
    {

        // dd($request->all());
        $data = $this->validate($request,[
            'nis'      => 'required|unique:nilai,nis',
            'siswa_id' => 'required|unique:nilai,siswa_id',
        ]);

        $data['nis']           = $request->nis;
        $data['siswa_id']         = $request->siswa_id;
        $data['kelas_id']         = $request->kelas_id;

        $data['ppai']         = $request->ppai;
        $data['kpai']         = $request->kpai;

        $data['ppkn']         = $request->ppkn;
        $data['kpkn']         = $request->kpkn;

        $data['pindonesia']         = $request->pindonesia;
        $data['kindonesia']         = $request->kindonesia;

        $data['pmtk']         = $request->pmtk;
        $data['kmtk']         = $request->kmtk;

        $data['psejarah']         = $request->psejarah;
        $data['ksejarah']         = $request->ksejarah;

        $data['pinggris']         = $request->pinggris;
        $data['kinggris']         = $request->kinggris;

        $data['psbk']         = $request->psbk;
        $data['ksbk']         = $request->ksbk;

        $data['ppjok']         = $request->ppjok;
        $data['kpjok']         = $request->kpjok;

        $data['psunda']         = $request->psunda;
        $data['ksunda']         = $request->ksunda;

        $data['psimdig']         = $request->psimdig;
        $data['ksimdig']         = $request->ksimdig;

        $data['pfisika']         = $request->pfisika;
        $data['kfisika']         = $request->kfisika;

        $data['pkimia']         = $request->pkimia;
        $data['kkimia']         = $request->kkimia;

        $data['pjurusan1']         = $request->pjurusan1;
        $data['kjurusan1']         = $request->kjurusan1;

        $data['pjurusan2']         = $request->pjurusan2;
        $data['kjurusan2']         = $request->kjurusan2;

        $data['pjurusan3']         = $request->pjurusan3;
        $data['kjurusan3']         = $request->kjurusan3;

        $data['akademik']      = $request->akademik;
        $data['integritas']    = $request->integritas;
        $data['religius']      = $request->religius;
        $data['nasionalis']    = $request->nasionalis;
        $data['mandiri']       = $request->mandiri;
        $data['gotong_royong'] = $request->gotong_royong;
        $data['catatan']       = $request->catatan;
        $data['mitra_pkl']     = $request->mitra_pkl;
        $data['lokasi']        = $request->lokasi;
        $data['lama_pkl']      = $request->lama_pkl;
        $data['keterangan']    = $request->keterangan;

        $data['ekskul']    = $request->ekskul;
        $data['keterangan_ekskul']    = $request->keterangan_ekskul;

        Nilai::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function getStudent(Request $request)
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

    public function getMapel($id_kelas)
    {
        $mapel = Mapel::where('kelas_id', $id_kelas)->get();

        return response()->json($mapel);
    }

    public function kasihNilai($kelas_id)
    {
        $data = Mapel::where('kelas_id', $kelas_id)->get();
        Log::info($data);

        return response()->json([
            'data' => $data
        ]);
    }

    public function tableNilai()
    {
        if (request()->ajax()) {
            $query = Nilai::with('siswa', 'kelas');

            return DataTables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                    Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . route('edit.nilai', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.nilai', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.nilai', $item->id) . '" method="POST">
                                        '. method_field('delete') . csrf_field() .'
                                        <button class="dropdown-item text-danger" type="submit">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                })->rawColumns([
                    'action'
                ])->make();
        }

        return view('nilai.table');
    }

    public function detailNilai($id)
    {
        $rapot = Nilai::findOrFail($id);

        return view('rapot.detail', compact('rapot'));
    }

    public function editNilai($id)
    {
        $nilai = Nilai::findOrFail($id);
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $ekskul = ekskul::all();

        return view('rapot.edit', compact('nilai', 'siswa', 'kelas', 'ekskul'));
    }

    public function updateNilai(Request $request, $id)
    {
        $nilai = Nilai::findOrFail($id);

        DB::table('nilai')->where('id', $nilai->id)->update([
            'nis'               => $request->nis,
            'siswa_id'             => $request->siswa_id,
            'kelas_id'             => $request->kelas_id,

            'ppai'              => $request->ppai,
            'kpai'              => $request->kpai,

            'ppkn'              => $request->ppkn,
            'kpkn'              => $request->kpkn,

            'pindonesia'        => $request->pindonesia,
            'kindonesia'        => $request->kindonesia,

            'pmtk'         => $request->pmtk,
            'kmtk'         => $request->kmtk,

            'psejarah'         => $request->psejarah,
            'ksejarah'         => $request->ksejarah,

            'pinggris'         => $request->pinggris,
            'kinggris'         => $request->kinggris,

            'psbk'         => $request->psbk,
            'ksbk'         => $request->ksbk,

            'ppjok'         => $request->ppjok,
            'kpjok'         => $request->kpjok,

            'psunda'         => $request->psunda,
            'ksunda'         => $request->ksunda,

            'psimdig'         => $request->psimdig,
            'ksimdig'         => $request->ksimdig,

            'pfisika'         => $request->pfisika,
            'kfisika'         => $request->kfisika,

            'pkimia'         => $request->pkimia,
            'kkimia'         => $request->kkimia,

            'akademik'          => $request->akademik,
            'integritas'        => $request->integritas,
            'religius'          => $request->religius,
            'nasionalis'        => $request->nasionalis,
            'mandiri'           => $request->mandiri,
            'gotong_royong'     => $request->gotong_royong,
            'catatan'           => $request->catatan,
            'mitra_pkl'         => $request->mitra_pkl,
            'lokasi'            => $request->lokasi,
            'lama_pkl'          => $request->lama_pkl,
            'keterangan'        => $request->keterangan,

            'ekskul'            => $request->ekskul,
            'keterangan_ekskul' => $request->keterangan_ekskul,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyNilai($id)
    {
        $nilai = Nilai::findorFail($id);
        $nilai->delete();

        return redirect()->back()->with('success', 'Nilai tersebut berhasil di hapus!');
    }
}
