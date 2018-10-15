<?php

namespace App\Http\Controllers;
use App\Pegawai;
use App\Kinerja;

use Illuminate\Http\Request;

class TppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$pegawai = Pegawai::all();
       	return view('pegawai/tpp',['pegawai'=>$pegawai]);
    }
    public function hitung(Request $request){
    	$kinerja = new Kinerja;
    	$kinerja->tahun = $request->tahun;
    	$kinerja->bulan = $request->bulan;
    	$kinerja->jumlah_hari_kerja = $request->jumlah_hari_kerja;
    	$kinerja->hadir = $request->hadir;
    	$kinerja->izin = $request->izin;
    	$kinerja->sakit = $request->sakit;
    	$kinerja->cuti = $request->cuti;
    	$kinerja->tanpa_alasan = $request->tanpa_alasan;
    	$kinerja->terlambat = $request->terlambat;
    	$kinerja->cepat_pulang = $request->cepat_pulang;
    	$kinerja->uwas = $request->uwas;
    	$kinerja->upacara = $request->upacara;
    	$kinerja->wirid = $request->wirid;
    	$kinerja->apel = $request->apel;
    	$kinerja->senam = $request->senam;
    	$kinerja->skp = $request->skp;
    	$kinerja->orientasi_pelayanan = $request->orientasi_pelayanan;
    	$kinerja->integritas = $request->integritas;
    	$kinerja->komitmen = $request->komitmen;
    	$kinerja->disiplin = $request->disiplin;
    	$kinerja->kerjasama = $request->kerjasama;
    	$kinerja->kepemimpinan = $request->kepemimpinan;
    	$kinerja->lkh = $request->lkh;
    	$kinerja->sop = $request->sop;
    	$kinerja->pegawai_nip = $request->pegawai;
        $kinerja->save();


    	$pegawai = Pegawai::where('nip',$request->pegawai)->first();

    	if($request->skp >= 76)
    	{
    		$sasaran_kerja_pegawai = 100;
    	}
    	else if($request->skp > 51)
    	{
    		$sasaran_kerja_pegawai = 75;
    	}
    	else if($request->skp > 26)
    	{
    		$sasaran_kerja_pegawai = 50;
    	}
    	else
    	{
    		$sasaran_kerja_pegawai = 25;
    	}

    	$perilaku_kerja = (20*$request->orientasi_pelayanan/100)+(20*$request->integritas/100)+(20*$request->komitmen/100)+(20*$request->disiplin)+(10*$request->kerjasama/100)+(10*$request->kepemimpinan/100);

    	$disiplin =  ($request->hadir/$request->jumlah_hari_kerja)*100;

    	$komitmen = (($request->upacara+$request->wirid+$request->apel+$request->senam)/$request->uwas)*100;

    	$penilaian_prestasi_kerja = (60*$sasaran_kerja_pegawai/100)+(40*$perilaku_kerja/100);

    	$kinerja =  ((70*($penilaian_prestasi_kerja/100)/100)*(70*$pegawai->tpp_maksimal/100))+((20*($request->lkh/100)/100)*(70*$pegawai->tpp_maksimal/100))+(10*($request->sop/100));

    	$kehadiran = (30*$pegawai->tpp_maksimal/100)-((5*$request->tanpa_alasan/100)+(3*$request->izin/100)+(3*($request->terlambat+$request->cepat_pulang)/100/300))*(30*$pegawai->tpp_maksimal/100);

    	$tpp_bulan_ini = $kehadiran+$kinerja;

    	
       	return view('pegawai/hasiltpp',['tpp_bulan_ini'=>$tpp_bulan_ini , 'kehadiran'=>$kehadiran, 'kinerja'=>$kinerja, 'penilaian_prestasi_kerja'=>$penilaian_prestasi_kerja, 'sasaran_kerja_pegawai'=>$sasaran_kerja_pegawai, 'perilaku_kerja'=>$perilaku_kerja, 'disiplin'=>$disiplin,'komitmen'=>$komitmen]);
    }

}
