<?php

namespace App\Http\Controllers;

use App\{Jurusan, Kelas, Siswa, TagihanSiswa, User};
use App\Http\Requests\StudentRequest;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\{Str, Carbon};
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function addStudent()
    {
        $kelas = Kelas::all();
        $jurusans = Jurusan::all();

        return view('student.add', compact('jurusans', 'kelas'));
    }

    public function postAddStudent(StudentRequest $request)
    {
        // dd($request->all());
        $data = $request->all();

        $data['roles']          = 'SISWA';
        $data['name']           = $request->nama;
        $data['email']          = $request->email;
        $data['password']       = bcrypt($request['password']);
        $data['remember_token'] = Str::random(40);
        $user = User::create($data);

        $data['user_id']       = $user->id;
        $data['nis']           = $request->nis;
        $data['nisn']          = $request->nisn;
        $data['alamat_1']      = $request->alamat_1;
        $data['alamat_2']      = $request->alamat_2;
        $data['nama']          = $user->name;
        $data['provinsi']      = $request->provinsi;
        $data['kabkota']       = $request->kabkota;
        $data['no_hp']         = $request->no_hp;
        $data['tempat_lahir']  = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['jenis_kelamin'] = $request->jenis_kelamin;
        $data['agama']         = $request->agama;
        $data['status_dalam_keluarga'] = $request->status_dalam_keluarga;
        $data['anak_ke']          = $request->anak_ke;
        $data['kelas_id']         = $request->kelas_id;
        $data['jurusan_id']       = $request->jurusan_id;
        $data['pada_tanggal']     = $request->pada_tanggal;
        $data['nama_ayah']        = $request->nama_ayah;
        $data['nama_ibu']         = $request->nama_ibu;
        $data['alamat_ortu']      = $request->alamat_ortu;
        $data['nohp_rumah']       = $request->nohp_rumah;
        $data['pekerjaan_ayah']   = $request->pekerjaan_ayah;
        $data['pekerjaan_ibu']    = $request->pekerjaan_ibu;
        $data['nama_wali']        = $request->nama_wali;
        $data['alamat_wali']      = $request->alamat_wali;
        $data['nohp_wali']        = $request->nohp_wali;
        $data['pekerjaan_wali']   = $request->pekerjaan_wali;
        Siswa::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableStudent()
    {
        if (request()->ajax()) {
            $query = Siswa::query();

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
                                    <a class="dropdown-item" href="' . route('edit.student', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.student', $item->id) . '">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    ';
                })->editColumn('profile', function($item) {
                    return $item->profile ?
                     '<img src="'. asset('storage/images/profile/'.$item->profile) .'" style="max-height: 50px;">'
                     : 'Tidak Ada Foto';
                })->rawColumns([
                    'action', 'profile'
                ])->make();
        }

        return view('student.table');
    }

    public function detailStudent($id)
    {
        $student = Siswa::findOrFail($id);

        return view('student.detail', compact('student'));
    }

    public function editStudent($id)
    {
        $student = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $jurusans = Jurusan::all();

        return view('student.edit', compact('student', 'jurusans', 'kelas'));
    }

    public function updateStudent(Request $request, $id)
    {
        $this->validate($request, [
            'kelas_id'      => 'required',
            'jurusan_id'    => 'required',
            'nama'          => 'required|max:100|min:2',
            'alamat_1'      => 'required|min:6|max:150',
            'alamat_2'      => 'required|min:6|max:150',
            'provinsi'      => 'required',
            'kabkota'       => 'required',
            'no_hp'         => 'required|string|min:10|max:13',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'profile'       => 'nullable|file|mimes:jpeg,jpg|max:2048',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'status_dalam_keluarga' => 'required',
            'anak_ke'          => 'required',
            'tanggal_lahir'    => 'required',
            'pada_tanggal'     => 'required',
            'nama_ayah'        => 'required',
            'nama_ibu'         => 'required',
            'alamat_ortu'      => 'required',
            'pekerjaan_ayah'   => 'required',
            'pekerjaan_ibu'    => 'required',
            'nama_wali'        => 'nullable',
            'alamat_wali'      => 'nullable',
            'pekerjaan_wali'   => 'nullable',
        ]);

        $student = Siswa::findOrFail($id);

        $this->validate($request, [
            'email'   => 'string|email',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        DB::table('users')
            ->where('id', $student->user->id)
            ->update([
                'email'  => $request->email,
                'name'   => $request->nama,
                'roles'  => 'SISWA',
        ]);

        if ($request->profile) {
            $request->validate( ['profile' => 'nullable|mimes:png,jpg,jpeg|max:2048'] );
            Storage::delete($student->profile);

            $file = $request->file('profile');
            $profile = sha1($file->getClientOriginalName() . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('images/profile', $profile);
        } elseif ($student->profile) {
            $profile = $student->profile;
        } else {
            $profile = null;
        }

        DB::table('siswa')
            ->where('id', $student->id)
            ->update([
                'profile'       => $profile,
                'nis'           => $request->nis,
                'nisn'          => $request->nisn,
                'nama'          => $request->nama,
                'alamat_1'      => $request->alamat_1,
                'alamat_2'      => $request->alamat_2,
                'provinsi'      => $request->provinsi,
                'kabkota'       => $request->kabkota,
                'tempat_lahir'  => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp'         => $request->no_hp,
                'agama'         => $request->agama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'anak_ke'               => $request->anak_ke,
                'jurusan_id'            => $request->jurusan_id,
                'kelas_id'              => $request->kelas_id,
                'pada_tanggal'          => $request->pada_tanggal,
                'nama_ayah'             => $request->nama_ayah,
                'nama_ibu'              => $request->nama_ibu,
                'pekerjaan_ayah'        => $request->pekerjaan_ayah,
                'pekerjaan_ibu'         => $request->pekerjaan_ibu,
                'nama_wali'             => $request->nama_wali,
                'alamat_ortu'           => $request->alamat_ortu,
                'nohp_rumah'            => $request->nohp_rumah,
                'nohp_wali'             => $request->nohp_wali,
                'pekerjaan_wali'        => $request->pekerjaan_wali,
                'alamat_wali'           => $request->alamat_wali,
                'status_dalam_keluarga' => $request->status_dalam_keluarga,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function editPasswordStudent($id)
    {
        $student = Siswa::findOrFail($id);

        return view('student.edit-password', compact('student'));
    }

    public function updatePasswordStudent(Request $request, $id)
    {
        $student = Siswa::findOrFail($id);

        $this->validate($request,[
            'password' => 'required|string|min:8'
        ]);

        DB::table('users')
            ->where('id', $student->user->id)
            ->update([
                'password'  => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Password Berhasil di Ganti!');
    }

    public function importStudent(Request $request)
    {
        // dd($request);
        $request->validate([
            'excel' => 'required|file|mimes:xlsx,xls|max:10000',
        ]);

        Excel::import(new StudentImport, $request->file('excel'));

        return redirect()->back()->with('success', 'Import Data Siswa Berhasil!');
    }

    // public function destroyStudent($id)
    // {
    //     $student = Siswa::findorFail($id);
    //     Storage::delete($student->profile);
    //     $student->user()->delete();
    //     $student->delete();

    //     return redirect()->back()->with('success', 'Siswa tersebut berhasil di hapus!');
    // }
}
