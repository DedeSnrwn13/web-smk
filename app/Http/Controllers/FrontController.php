<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{Siswa, Materi, Kelas, Guru, Rpp, Nilai, Informasi, Jadwal, JenisPembayaran, Mapel, Pemasukan, User};
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
class FrontController extends Controller
{
    // landing
    public function index()
    {
        return view('welcome');
    }

    // Admin
    public function loginAdmin()
    {
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {

        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/admin/dashboard/home')->with('success', 'Berhasil Login!');
        } else {
            return redirect()->back()->with('error', 'Kami tidak mengenali Anda.');
        }
    }

    // Teacher
    public function login()
    {
        return view('teacher.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/home');
        } else {
            return redirect()->back()->with('error', 'Kami Tidak dapat menemukan kredensial yang Anda masukkan.');
        }
    }

    public function home()
    {
        return view('home');
    }


    // Materi
    public function materiCreate()
    {
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('guru.materi.add', compact('kelas', 'mapel'));
    }

    public function materiPostCreate(Request $request)
    {
        $materi = Materi::all();

        $this->validate($request,[
            'no'       => 'required|min:1|max:10',
            'judul'    => 'required|min:2|string',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
            'lampiran' => 'required|file|mimes:docx,pdf|max:5000',

        ]);

        // dd($request->all());
        $data = $request->all();

        // profile
        if ($request->lampiran) {
            $file = $request->file('lampiran');
            $lampiran = sha1($request->lampiran . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('lampiran/materi', $lampiran);
        } elseif ($materi->lampiran) {
            $lampiran = $materi->lampiran;
        } else {
            $lampiran = null;
        }

        // profile
        $data['no']       = $request->no;
        $data['judul']    = $request->judul;
        $data['kelas_id'] = $request->kelas_id;
        $data['mapel_id'] = $request->mapel_id;
        $data['lampiran'] = $lampiran;
        $data['link']     = $request->link;
        Materi::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function detailMateri($id)
    {
        $materi = Materi::findOrFail($id);

        return view('guru.materi.detail', compact('materi'));
    }

    public function tableMateri()
    {
        $materi = Materi::all();

        return view('guru.materi.table', compact('materi'));
    }

    public function editMateri($id)
    {
        $materi = Materi::findOrFail($id);
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('guru.materi.edit', compact('materi', 'kelas', 'mapel'));
    }

    public function updateMateri(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $this->validate($request,[
            'no'         => 'required|min:1|max:10',
            'judul'      => 'required|min:2|string',
            'mapel_id'   => 'required',
            'kelas_id'   => 'required',
            'lampiran'   => 'file|mimes:docx,pdf|max:5000',
            'link'       => 'nullable'
        ]);

        // profile
        if ($request->lampiran) {
            Storage::delete($materi->lampiran);

            $file = $request->file('lampiran');
            $lampiran = sha1($request->nama . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('lampiran/materi', $lampiran);
        } elseif ($materi->lampiran) {
            $lampiran = $materi->lampiran;
        } else {
            $lampiran = null;
        }

        DB::table('materi')->where('id', $materi->id)->update([
            'no'         => $request->no,
            'judul'      => $request->judul,
            'kelas_id'   => $request->kelas_id,
            'mapel_id'   => $request->mapel_id,
            'lampiran'   => $lampiran,
            'link'       => $request->link,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyMateri($id)
    {
        $materi = Materi::findorFail($id);
        Storage::delete($materi->lampiran);
        $materi->delete();

        return redirect()->back()->with('success', 'Materi tersebut berhasil di hapus!');
    }


    // RPP
    public function rppCreate()
    {
        $guru = Guru::all();
        $mapel = Mapel::all();
        return view('guru.rpp.add', compact('guru', 'mapel'));
    }

    public function rppPostCreate(Request $request)
    {
        $rpp = Rpp::all();

        $this->validate($request,[
            'lampiran'  => 'required|file|mimes:docx,pdf|max:5000',
        ]);

        // dd($request->all());
        $data = $request->all();

        if ($request->lampiran) {
            $file = $request->file('lampiran');
            $lampiran = sha1($request->lampiran . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('lampiran/rpp', $lampiran);
        } elseif ($rpp->lampiran) {
            $lampiran = $rpp->lampiran;
        } else {
            $lampiran = null;
        }

        $data['no']       = $request->no;
        $data['nik']      = $request->nik;
        $data['guru_id']  = $request->guru_id;
        $data['mapel_id'] = $request->mapel_id;
        $data['ki']       = $request->ki;
        $data['kd']       = $request->kd;
        $data['lampiran'] = $lampiran;
        Rpp::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableRpp()
    {
        $rpp = Rpp::all();

        return view('guru.rpp.table', compact('rpp'));
    }

    public function detailRpp($id)
    {
        $rpp = Rpp::findOrFail($id);

        return view('guru.rpp.detail', compact('rpp'));
    }

    public function editRpp($id)
    {
        $rpp = Rpp::findOrFail($id);
        $guru = Guru::all();
        $mapel = Mapel::all();

        return view('guru.rpp.edit', compact('rpp', 'guru', 'mapel'));
    }

    public function updateRpp(Request $request, $id)
    {
        $rpp = Rpp::findOrFail($id);

        $this->validate($request,[
            'lampiran'  => 'file|mimes:docx,pdf|max:5000',
        ]);

        if ($request->lampiran) {
            Storage::delete($rpp->lampiran);

            $file = $request->file('lampiran');
            $lampiran = sha1($request->lampiran . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('lampiran/rpp', $lampiran);
        } elseif ($rpp->lampiran) {
            $lampiran = $rpp->lampiran;
        } else {
            $lampiran = null;
        }

        DB::table('rpp')->where('id', $rpp->id)->update([
            'no'       => $request->no,
            'nik'      => $request->nik,
            'guru_id'  => $request->guru_id,
            'mapel_id' => $request->mapel_id,
            'ki'       => $request->ki,
            'kd'       => $request->kd,
            'lampiran' => $lampiran,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyRpp($id)
    {
        $rpp = Rpp::findorFail($id);
        Storage::delete($rpp->lampiran);
        $rpp->delete();

        return redirect()->back()->with('success', 'RPP tersebut berhasil di hapus!');
    }

    // Siswa
    public function tabelSiswa()
    {
        $siswa = Siswa::all();

        return view('guru.siswa', compact('siswa'));
    }

    // Tagihan
    public function tagihan()
    {
        $siswa_id = Auth::user()->siswa->id;
        $tagihan = Pemasukan::where('siswa_id', $siswa_id)->get();

        return view('siswa.tagihan', compact('tagihan'));
    }

    // Kelas
    public function tabelKelas()
    {
        $kelas = kelas::all();

        return view('guru.kelas', compact('kelas'));
    }

    public function tabelMapel()
    {
        $mapel = Mapel::all();

        return view('guru.mapel', compact('mapel'));
    }

    public function tabelJadwal()
    {
        $jadwal = Jadwal::all();

        return view('guru.jadwal', compact('jadwal'));
    }

    public function tabelInfo()
    {
        $informasi =Informasi::all();

        return view('guru.informasi', compact('informasi'));
    }

    public function lampiranInfo($id)
    {
        $info = Informasi::findOrFail($id);

        return view('guru.detail-info', compact('info'));
    }

    public function tableMateriSiswa()
    {
        // $user = Auth::user()->id;
        $materi = Materi::all();

        return view('siswa.materi', compact('materi'));
    }
}
