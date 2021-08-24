<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Ekskul, Siswa, Kelas};
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class EkskulController extends Controller
{
    public function addEkskul()
    {
        return view('ekskul.add');
    }

    public function postAddEkskul(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        $data['nama']       = $request->nama;
        $data['keterangan'] = $request->keterangan;
        Ekskul::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableEkskul()
    {
        if (request()->ajax()) {
            $query = Ekskul::query();

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
                                    <a class="dropdown-item" href="' . route('edit.ekskul', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.ekskul', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.ekskul', $item->id) . '" method="POST">
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

        return view('ekskul.table');
    }

    public function detailEkskul($id)
    {
        $ekskul = Ekskul::findOrFail($id);

        return view('ekskul.detail', compact('ekskul'));
    }

    public function editEkskul($id)
    {
        $ekskul = Ekskul::findOrFail($id);

        return view('ekskul.edit', compact('ekskul'));
    }

    public function updateEkskul(Request $request, $id)
    {
        $ekskul = Ekskul::findOrFail($id);

        DB::table('ekskul')->where('id', $ekskul->id)->update([
            'nama'       => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyEkskul($id)
    {
        $ekskul = Ekskul::findorFail($id);
        $ekskul->delete();

        return redirect()->back()->with('success', 'Ekskul tersebut berhasil di hapus!');
    }
}
