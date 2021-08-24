<?php

namespace App\Http\Controllers;

use App\{Admin, User, Siswa, Guru, Pemasukan, Pengeluaran, TagihanSiswa};
use App\Http\Requests\AdminRequest;
use App\Imports\AdminImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\{Str, Carbon};
use Illuminate\Support\Facades\{Auth, Storage};
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $admin       = Admin::count();
        $pemasukan   = Pemasukan::sum('cicilan');
        $pengeluaran = Pengeluaran::sum('total');
        $siswa       = Siswa::count();
        $guru        = Guru::count();
        $bendahara   = User::where(['roles' => 'BENDAHARA'])->count();
        $tagihan     = TagihanSiswa::sum('jumlah_tagihan');
        $roles       = User::count('roles');

        return view('admin.home', compact(
            'admin', 'siswa', 'guru', 'tagihan', 'pemasukan',
            'pengeluaran', 'roles', 'bendahara'
        ));
    }

    public function addAdmin()
    {
        return view('admin.add');
    }

    public function postAddAdmin(AdminRequest $request)
    {
        // dd($request->all());
        $data = $request->all();

        $data['roles']          = 'ADMIN';
        $data['name']           = $request->nama;
        $data['email']          = $request->email;
        $data['password']       = bcrypt($request['password']);
        $data['remember_token'] = Str::random(40);
        $user = User::create($data);

        $data['user_id']       = $user->id;
        $data['nip']           = $request->nip;
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
        Admin::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableAdmin()
    {
        if (request()->ajax()) {
            $query = Admin::query();

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
                                    <a class="dropdown-item" href="' . route('edit.admin', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.admin', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.admin', $item->id) . '" method="POST">
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

        return view('admin.table');
    }

    public function detailAdmin($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.detail', compact('admin'));
    }

    public function editAdmin($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.edit', compact('admin'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $this->validate($request, [
            'email'   => 'string|email',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        DB::table('users')
            ->where('id', $admin->user->id)
            ->update([
                'email'  => $request->email,
                'name'   => $request->nama,
                'roles'  => 'ADMIN',
        ]);

        if ($request->profile) {
            $request->validate( ['profile' => 'nullable|mimes:png,jpg,jpeg|max:2048'] );
            Storage::delete($admin->ktp);

            $file = $request->file('profile');
            $profile = sha1($file->getClientOriginalName() . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('images/profile', $profile);
        } elseif ($admin->profile) {
            $profile = $admin->profile;
        } else {
            $profile = null;
        }

        if ($request->ktp) {
            $request->validate( ['ktp' => 'nullable|mimes:png,jpg,jpeg|max:2048'] );
            Storage::delete($admin->ktp);

            $file = $request->file('ktp');
            $ktp  = sha1($file->getClientOriginalName() . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('images/ktp', $ktp);
        } elseif ($admin->ktp) {
            $ktp = $admin->ktp;
        } else {
            $ktp = null;
        }

        DB::table('admin')
            ->where('id', $admin->id)
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

    public function editPasswordAdmin($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.edit-password', compact('admin'));
    }

    public function updatePasswordAdmin(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $this->validate($request,[
            'password' => 'required|string|min:8'
        ]);

        DB::table('users')
            ->where('id', $admin->user->id)
            ->update([
                'password'  => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Password Berhasil di Ganti!');
    }

    public function importAdmin(Request $request)
    {
        // dd($request);
        $request->validate([
            'excel' => 'required|file|mimes:xlsx,xls|max:10000',
        ]);

        Excel::import(new AdminImport, $request->file('excel'));

        return redirect()->back()->with('success', 'Import Data Admin Berhasil!');
    }

    public function destroyAdmin($id)
    {
        $admin = Admin::findorFail($id);
        Storage::delete($admin->profile);
        Storage::delete($admin->ktp);
        $admin->user()->delete();
        $admin->delete();


        return redirect()->back()->with('success', 'Admin tersebut berhasil di hapus!');
    }

    public function logoutAdmin()
    {
        Auth::logout();

        return redirect()->route('login.admin');
    }
}
