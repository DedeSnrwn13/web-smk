<?php

namespace App\Http\Controllers;

use App\{NilaiMulti10, NilaiMulti11, NilaiMulti12, NilaiMutu10, NilaiMutu11, NilaiMutu12};
use Yajra\DataTables\DataTables;
class RapotController extends Controller
{
    public function tableNilaiMulti10()
    {
        if (request()->ajax()) {
            $query = NilaiMulti10::with('siswa', 'kelas');

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
                                    <a class="dropdown-item" href="' . route('edit.nilai.multi10', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.nilai.multi10', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.nilai.multi10', $item->id) . '" method="POST">
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

        return view('rapot.multi10.table');
    }

    public function tableNilaiMulti11()
    {
        if (request()->ajax()) {
            $query = NilaiMulti11::with('siswa', 'kelas');

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
                                    <a class="dropdown-item" href="' . route('edit.nilai.multi11', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.nilai.multi11', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.nilai.multi11', $item->id) . '" method="POST">
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

        return view('rapot.multi11.table');
    }

    public function tableNilaiMulti12()
    {
        if (request()->ajax()) {
            $query = NilaiMulti12::with('siswa', 'kelas');

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
                                    <a class="dropdown-item" href="' . route('edit.nilai.multi12', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.nilai.multi12', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.nilai.multi12', $item->id) . '" method="POST">
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

        return view('rapot.multi12.table');
    }

    public function tableNilaiMutu10()
    {
        if (request()->ajax()) {
            $query = NilaiMutu10::with('siswa', 'kelas');

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
                                    <a class="dropdown-item" href="' . route('edit.nilai.mutu10', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.nilai.mutu10', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.nilai.mutu10', $item->id) . '" method="POST">
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

        return view('rapot.mutu10.table');
    }

    public function tableNilaiMutu11()
    {
        if (request()->ajax()) {
            $query = NilaiMutu11::with('siswa', 'kelas');

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
                                    <a class="dropdown-item" href="' . route('edit.nilai.mutu11', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.nilai.mutu11', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.nilai.mutu11', $item->id) . '" method="POST">
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

        return view('rapot.mutu11.table');
    }

    public function tableNilaiMutu12()
    {
        if (request()->ajax()) {
            $query = NilaiMutu12::with('siswa', 'kelas');

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
                                    <a class="dropdown-item" href="' . route('edit.nilai.mutu12', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.nilai.mutu12', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.nilai.mutu12', $item->id) . '" method="POST">
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

        return view('rapot.mutu12.table');
    }
}
