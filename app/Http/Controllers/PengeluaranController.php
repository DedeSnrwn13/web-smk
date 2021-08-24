<?php

namespace App\Http\Controllers;

use App\{Pengeluaran, Guru, JenisPembayaran, Jurusan, Kelas};
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class PengeluaranController extends Controller
{
    public function addPengeluaran()
    {
        $pengeluarans = Pengeluaran::all();
        $gurus        = Guru::all();
        $jurusans     = Jurusan::all();
        $kelas        = Kelas::all();

        return view('pengeluaran.add', compact('pengeluarans', 'gurus', 'kelas', 'jurusans'));
    }

    public function postAddPengeluaran(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'nama_transaksi' => 'required',
            'tanggal'        => 'required',
            'keterangan'     => 'required',
            'jumlah'         => 'required',
            'harga'          => 'required',
        ]);

        $pengeluaran = new Pengeluaran();
        $pengeluaran->nama_transaksi = $request->nama_transaksi;
        $pengeluaran->tanggal        = $request->tanggal;
        $pengeluaran->keterangan     = $request->keterangan;
        $jumlah = $pengeluaran->jumlah = $request->jumlah;
        $harga  = $pengeluaran->harga  = $request->harga;
        $pengeluaran->total        = $jumlah * $harga;
        $pengeluaran->save();

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tablePengeluaran()
    {
        $pengeluarans = Pengeluaran::orderBy('id', 'DESC')->get();
        return view('pengeluaran.table', compact('pengeluarans'));
    }

    public function editPengeluaran($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $gurus        = Guru::all();
        $jurusans     = Jurusan::all();
        $kelas        = Kelas::all();

        return view('pengeluaran.edit', compact('pengeluaran', 'gurus', 'jurusans', 'kelas'));
    }

    public function updatePengeluaran(Request $request, $id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);

        $this->validate($request,[
            'nama_transaksi' => 'required',
            'tanggal'        => 'required',
            'keterangan'     => 'required',
            'jumlah'         => 'required',
            'harga'          => 'required',
        ]);

        DB::table('pengeluaran')->where('id', $pengeluaran->id)->update([
            'nama_transaksi' => $request->nama_transaksi,
            'tanggal'      => $request->tanggal,
            'keterangan'   => $request->keterangan,
            'jumlah'       => $request->jumlah,
            'harga'        => $request->harga,
            'total'        => $request->jumlah * $request->harga,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyPengeluaran($id)
    {
        // $pengeluaran = Pengeluaran::findorFail($id);
        // $pengeluaran->delete();

        DB::table('pengeluaran')->where('id', $id)->delete();
        return redirect()->back()->with('info', 'Pengeluaran tersebut berhasil di hapus!');
    }
}
