<?php

namespace App\Http\Controllers;

use App\{JenisPembayaran, Pemasukan, Jurusan, Kelas, Siswa, TagihanSiswa};
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
class PemasukanController extends Controller
{
    public function pemasukan()
    {
        $pemasukan   = Pemasukan::all();
        $siswa       = Siswa::all();
        $jurusans    = Jurusan::all();
        $kelas       = Kelas::all();
        $jenis_pembayaran = JenisPembayaran::all();

        return view('pemasukan.add', compact('pemasukan', 'jurusans', 'kelas', 'siswa', 'jenis_pembayaran'));
    }

    public function postPemasukan(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'tanggal'             => 'required',
            'siswa_id'            => 'required',
            'kelas_id'            => 'required',
            'jurusan_id'          => 'required',
            'jenis_pembayaran'    => 'required',
            'jumlah_pembayaran'   => 'required',
        ]);

        $pemasukan = new Pemasukan();

        $pemasukan->tanggal           = $request->tanggal;
        $pemasukan->siswa_id          = $request->siswa_id;
        $pemasukan->jurusan_id           = $request->jurusan_id;
        $pemasukan->kelas_id             = $request->kelas_id;
        $pemasukan->cicilan              = $request->cicilan;
        $pemasukan->jumlah_pembayaran    = $request->jumlah_pembayaran;
        $pemasukan->sisa                 = $request->jumlah_pembayaran - $request->cicilan;
        $pemasukan->jenis_pembayaran     = $request->jenis_pembayaran;
        $pemasukan->save();

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function getData($id)
    {
        $tagihan = DB::table('tagihan_siswa')->where('siswa_id', $id)->pluck('jumlah_tagihan');
        return json_encode($tagihan);
    }

    public function tablePemasukan()
    {
        $pemasukan = Pemasukan::orderBy('id', 'DESC')->get();
        $pembayaran = JenisPembayaran::all();

        return view('pemasukan.table', compact('pemasukan', 'pembayaran'));
    }

    public function editPemasukan($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $siswa       = Siswa::all();
        $jurusans    = Jurusan::all();
        $kelas       = Kelas::all();
        $jenis_pembayaran = JenisPembayaran::all();

        return view('pemasukan.edit', compact('pemasukan', 'jurusans', 'kelas', 'siswa', 'jenis_pembayaran'));
    }

    public function updatePemasukan(Request $request, $id)
    {
        // dd($request->all());
        $pemasukan = Pemasukan::findOrFail($id);

        $this->validate($request,[
            'tanggal'             => 'required',
            'siswa_id'            => 'required',
            'kelas_id'            => 'required',
            'jurusan_id'          => 'required',
            'jenis_pembayaran'    => 'required',
        ]);

        DB::table('pemasukan')->where('id', $pemasukan->id)->update([
            'tanggal'           => $request->tanggal,
            'siswa_id'          => $request->siswa_id,
            'kelas_id'          => $request->kelas_id,
            'jurusan_id'        => $request->jurusan_id,
            'jenis_pembayaran'  => $request->jenis_pembayaran,
            'sisa'              => $request->sisa - $request->cicilan,
            'cicilan'           => $request->cicilan + $request->cicilan_sebelumnya,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyPemasukan($id)
    {
        // echo $id;
        // $pemasukan = Pemasukan::findorFail($id);
        // $pemasukan->delete();

        DB::table('pemasukan')->where('id', $id)->delete();
        return redirect()->back()->with('info', 'Pemasukan tersebut berhasil di hapus!');
    }
}
