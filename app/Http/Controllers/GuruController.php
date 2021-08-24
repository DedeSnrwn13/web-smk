<?php

namespace App\Http\Controllers;

use App\{Guru, User};
use App\Http\Requests\TeacherRequest;
use App\Imports\TeacherImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\{Str, Carbon};
use Illuminate\Support\Facades\{Auth, Storage};
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    public function index()
    {
        return view('teacher.home');
    }

    public function addTeacher()
    {
        return view('teacher.add');
    }

    public function postAddTeacher(TeacherRequest $request)
    {
        // dd($request->all());
        $data = $request->all();

        $data['roles']          = 'GURU';
        $data['name']           = $request->nama;
        $data['email']          = $request->email;
        $data['password']       = bcrypt($request['password']);
        $data['remember_token'] = Str::random(40);
        $user = User::create($data);

        $data['user_id']       = $user->id;
        $data['nip']           = $request->nip;
        $data['nik']           = $request->nik;
        $data['nuptk']         = $request->nuptk;
        $data['alamat_1']      = $request->alamat_1;
        $data['alamat_2']      = $request->alamat_2;
        $data['nama']          = $user->name;
        $data['provinsi']      = $request->provinsi;
        $data['kabkota']       = $request->kabkota;
        $data['no_hp']         = $request->no_hp;
        // $data['profile']       = $filenameProfile;
        // $data['ktp']           = $filenameKtp;
        $data['tempat_lahir']  = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        Guru::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableTeacher()
    {
        if (request()->ajax()) {
            $query = Guru::query();

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
                                    <a class="dropdown-item" href="' . route('edit.teacher', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.teacher', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.teacher', $item->id) . '" method="POST">
                                        '. method_field('delete') . csrf_field() .'
                                        <button class="dropdown-item text-danger" type="submit">
                                            Hapus
                                        </button>
                                    </form>
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

        return view('teacher.table');
    }

    public function detailTeacher($id)
    {
        $teacher = Guru::findOrFail($id);

        return view('teacher.detail', compact('teacher'));
    }

    public function editTeacher($id)
    {
        $teacher = Guru::findOrFail($id);

        return view('teacher.edit', compact('teacher'));
    }

    public function updateTeacher(Request $request, $id)
    {
        $teacher = Guru::findOrFail($id);

        $this->validate($request, [
            'email'   => 'string|email',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        DB::table('users')
            ->where('id', $teacher->user->id)
            ->update([
                'email'  => $request->email,
                'name'   => $request->nama,
                'roles'  => 'GURU',
        ]);

        if ($request->profile) {
            $request->validate( ['profile' => 'nullable|mimes:png,jpg,jpeg|max:2048'] );
            Storage::delete($teacher->profile);

            $file = $request->file('profile');
            $profile = sha1($file->getClientOriginalName() . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('images/profile', $profile);
        } elseif ($teacher->profile) {
            $profile = $teacher->profile;
        } else {
            $profile = null;
        }

        if ($request->ktp) {
            $request->validate( ['ktp' => 'nullable|mimes:png,jpg,jpeg|max:2048'] );
            Storage::delete($teacher->ktp);

            $file = $request->file('ktp');
            $ktp  = sha1($file->getClientOriginalName() . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('images/ktp', $ktp);
        } elseif ($teacher->ktp) {
            $ktp = $teacher->ktp;
        } else {
            $ktp = null;
        }

        DB::table('guru')
            ->where('id', $teacher->id)
            ->update([
                'profile'       => $profile,
                'ktp'           => $ktp,
                'nip'           => $request->nip,
                'nama'          => $request->nama,
                'no_hp'         => $request->no_hp,
                'alamat_1'      => $request->alamat_1,
                'alamat_2'      => $request->alamat_2,
                'provinsi'      => $request->provinsi,
                'kabkota'       => $request->kabkota,
                'tempat_lahir'  => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function editPasswordTeacher($id)
    {
        $teacher = Guru::findOrFail($id);

        return view('teacher.edit-password', compact('teacher'));
    }

    public function updatePasswordTeacher(Request $request, $id)
    {
        $teacher = Guru::findOrFail($id);

        $this->validate($request,[
            'password' => 'required|string|min:8'
        ]);

        DB::table('users')
            ->where('id', $teacher->user->id)
            ->update([
                'password'  => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Password Berhasil di Ganti!');
    }

    public function importTeacher(Request $request)
    {
        // dd($request);
        $request->validate([
            'excel' => 'required|file|mimes:xlsx,xls|max:10000',
        ]);

        Excel::import(new TeacherImport, $request->file('excel'));

        return redirect()->back()->with('success', 'Import Data Guru Berhasil!');
    }

    public function destroyTeacher($id)
    {
        $teacher = Guru::findorFail($id);
        Storage::delete($teacher->profile);
        Storage::delete($teacher->ktp);
        $teacher->user()->delete();
        $teacher->delete();


        return redirect()->back()->with('success', 'Guru tersebut berhasil di hapus!');
    }

    public function logoutAdmin()
    {
        Auth::logout();

        return redirect()->route('login.admin');
    }
}
