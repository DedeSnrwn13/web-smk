<?php

namespace App\Http\Controllers;

use App\JenisPembayaran;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class JenisPembayaranController extends Controller
{
    public function pembayaran()
    {
        $jenis_pembayaran = JenisPembayaran::all();

        return view('pembayaran.add', compact('jenis_pembayaran'));
    }

    public function postPembayaran(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'no'               => 'required|unique:jenis_pembayaran,no|max:5',
            'jumlah'           => 'required',
            'jenis_pembayaran' => 'required|unique:jenis_pembayaran,jenis_pembayaran',
        ]);

        $pembayaran = new JenisPembayaran();
        $pembayaran->no               = $request->no;
        $pembayaran->jumlah           = $request->jumlah;
        $pembayaran->jenis_pembayaran = $request->jenis_pembayaran;
        $pembayaran->save();

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tablePembayaran()
    {
        if (request()->ajax()) {
            $query = JenisPembayaran::query();

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
                                    <a class="dropdown-item" href="' . route('edit.pembayaran', $item->id) . '">Sunting</a>
                                    <form action="' . route('destroy.pembayaran', $item->id) . '" method="POST">
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
                    'action',
                ])->make();
        }

        return view('pembayaran.table');
    }

    public function editPembayaran($id)
    {
        $jenis_pembayaran = JenisPembayaran::findOrFail($id);

        return view('pembayaran.edit', compact('jenis_pembayaran'));
    }

    public function updatePembayaran(Request $request, $id)
    {
        $jenis_pembayaran = JenisPembayaran::findOrFail($id);

        $this->validate($request,[
            'no'               => 'required|max:5',
            'jumlah'           => 'required',
            'jenis_pembayaran' => 'required',
        ]);

        DB::table('jenis_pembayaran')->where('id', $jenis_pembayaran->id)->update([
            'no'               => $request->no,
            'jumlah'           => $request->jumlah,
            'jenis_pembayaran' => $request->jenis_pembayaran,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyPembayaran($id)
    {
        $jenis_pembayaran = JenisPembayaran::findorFail($id);
        $jenis_pembayaran->delete();

        return redirect()->back()->with('success', 'Jenis Pembayaran tersebut berhasil di hapus!');
    }
}
