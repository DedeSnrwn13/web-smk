<?php

namespace App\Http\Controllers;

use App\{Pengeluaran,Pemasukan};
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class LapKeuanganController extends Controller
{
    public function pengeluaran() {
        $pengeluaran = Pengeluaran::orderBy('id', 'DESC')->get();
        $jumlah_pengeluaran = Pengeluaran::sum('total');

        return view('laporan.pengeluaran.pengeluaran', compact('pengeluaran', 'jumlah_pengeluaran'));
    }

    public function pengeluaranPdf()
    {
    	$pengeluaran = Pengeluaran::orderBy('id', 'DESC')->get();
        $jumlah_pengeluaran = Pengeluaran::sum('total');

    	$pdf = PDF::loadview('laporan.pengeluaran.pengeluaran-pdf', compact('pengeluaran', 'jumlah_pengeluaran'));
    	return $pdf->stream();
        // return view('laporan.pemasukan-pdf', compact('pemasukan', 'jumlah_cicilan'));
    }

    public function pengeluaranId($id)
    {
    	$pengeluaran = Pengeluaran::find($id);
        $jumlah_pengeluaran = Pengeluaran::where('id', $id)->sum('total', $pengeluaran);

    	$pdf = PDF::loadview('laporan.pengeluaran.pengeluaran-pdf-id', compact('pengeluaran', 'jumlah_pengeluaran'));
    	return $pdf->stream();
        // return view('laporan.pemasukan-pdf-id', compact('pemasukan', 'jumlah_pemasukan'));
    }

    public function pemasukan() {
        $pemasukan = Pemasukan::orderBy('id', 'DESC')->get();
        $jumlah_cicilan = Pemasukan::sum('cicilan');

        return view('laporan.pemasukan.pemasukan', compact('pemasukan', 'jumlah_cicilan'));
    }

    public function pemasukanPdf()
    {
    	$pemasukan = Pemasukan::orderBy('id', 'DESC')->get();
        $jumlah_cicilan = Pemasukan::sum('cicilan');

    	$pdf = PDF::loadview('laporan.pemasukan.pemasukan-pdf', compact('pemasukan', 'jumlah_cicilan'));
    	return $pdf->stream();
        // return view('laporan.pemasukan-pdf', compact('pemasukan', 'jumlah_cicilan'));
    }

    public function pemasukanId($id)
    {
    	$pemasukan = Pemasukan::find($id);
        $jumlah_pemasukan = Pemasukan::where('id', $id)->sum('cicilan', $pemasukan);

    	$pdf = PDF::loadview('laporan.pemasukan.pemasukan-pdf-id', compact('pemasukan', 'jumlah_pemasukan'));
    	return $pdf->stream();
        // return view('laporan.pemasukan-pdf-id', compact('pemasukan', 'jumlah_pemasukan'));
    }

    public function kas() {
        $pemasukan = Pemasukan::sum('cicilan');
        $pengeluaran = Pengeluaran::sum('total');
        $kas = $pemasukan - $pengeluaran;

        return view('laporan.kas.table', compact('pemasukan', 'pengeluaran', 'kas'));
    }

    public function kasPdf()
    {
    	$pemasukan = Pemasukan::sum('cicilan');
        $pengeluaran = Pengeluaran::sum('total');
        $kas = $pemasukan - $pengeluaran;

    	$pdf = PDF::loadview('laporan.kas.kas-pdf', compact('pemasukan', 'pengeluaran', 'kas'));
    	return $pdf->stream();
        // return view('laporan.pemasukan-pdf', compact('pemasukan', 'jumlah_cicilan'));
    }
}
