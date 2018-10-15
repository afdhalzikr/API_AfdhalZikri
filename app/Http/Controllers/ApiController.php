<?php

namespace App\Http\Controllers;

use App\Kinerja;
use App\Pegawai;
use Illuminate\Http\Request;
class usr{}

class ApiController extends Controller
{
    public function hitungTPP(Request $request)
	{
		$nama_pegawai = $request->input('pegawai');
	    $tahun = $request->input('tahun');
	    $bulan = $request->input('bulan');
	    $jumlah_hari_kerja = $request->input('jumlah_hari_kerja');
	    $hadir = $request->input('hadir');
	    $izin = $request->input('izin');
	    $sakit = $request->input('sakit');
	    $cuti = $request->input('cuti');
	    $tanpa_alasan = $request->input('tanpa_alasan');
	    $terlambat = $request->input('terlambat');
	    $cepat_pulang = $request->input('cepat_pulang');
	    $uwas = $request->input('uwas');
	    $upacara = $request->input('upacara');
	    $wirid = $request->input('wirid');
	    $apel = $request->input('apel');
	    $senam = $request->input('senam');
	    $skp = $request->input('skp');
	    $orientasi_pelayanan = $request->input('orientasi_pelayanan');
	    $integritas = $request->input('integritas');
	    $komitmen = $request->input('komitmen');
	    $disiplin = $request->input('disiplin');
	    $kerjasama = $request->input('kerjasama');
	    $kepemimpinan = $request->input('kepemimpinan');
	    $lkh = $request->input('lkh');
	    $sop = $request->input('sop');

	    $pegawai = Pegawai::where('nama',$nama_pegawai)->first();

	    $kinerja = new Kinerja;
    	$kinerja->tahun = $tahun;
    	$kinerja->bulan = $bulan;
    	$kinerja->jumlah_hari_kerja = $jumlah_hari_kerja;
    	$kinerja->hadir = $hadir;
    	$kinerja->izin = $izin;
    	$kinerja->sakit = $sakit;
    	$kinerja->cuti = $cuti;
    	$kinerja->tanpa_alasan = $tanpa_alasan;
    	$kinerja->terlambat = $terlambat;
    	$kinerja->cepat_pulang = $cepat_pulang;
    	$kinerja->uwas = $uwas;
    	$kinerja->upacara = $upacara;
    	$kinerja->wirid = $wirid;
    	$kinerja->apel = $apel;
    	$kinerja->senam = $senam;
    	$kinerja->skp = $skp;
    	$kinerja->orientasi_pelayanan = $orientasi_pelayanan;
    	$kinerja->integritas = $integritas;
    	$kinerja->komitmen = $komitmen;
    	$kinerja->disiplin = $disiplin;
    	$kinerja->kerjasama = $kerjasama;
    	$kinerja->kepemimpinan = $kepemimpinan;
    	$kinerja->lkh = $lkh;
    	$kinerja->sop = $sop;
    	$kinerja->pegawai_nip = $pegawai;
        $kinerja->save();

	    if($kinerja->save()){
	        $response = new usr();
			$response->success = 1;
	        if($skp >= 76)
	    	{
	    		$sasaran_kerja_pegawai = 100;
	    	}
	    	else if($skp > 51)
	    	{
	    		$sasaran_kerja_pegawai = 75;
	    	}
	    	else if($skp > 26)
	    	{
	    		$sasaran_kerja_pegawai = 50;
	    	}
	    	else
	    	{
	    		$sasaran_kerja_pegawai = 25;
	    	}
	    	$response->sasaran_kerja_pegawai = $sasaran_kerja_pegawai;

	    	$perilaku_kerja = (20*$orientasi_pelayanan/100)+(20*$integritas/100)+(20*$komitmen/100)+(20*$disiplin)+(10*$kerjasama/100)+(10*$kepemimpinan/100);
	    	$response->perilaku_kerja = $perilaku_kerja;

	    	$disiplin =  ($hadir/$jumlah_hari_kerja)*100;
	    	$response->disiplin = $disiplin;

	    	$komitmen = (($upacara+$wirid+$apel+$senam)/$uwas)*100;
	    	$response->komitmen = $komitmen;

	    	$penilaian_prestasi_kerja = (60*$sasaran_kerja_pegawai/100)+(40*$perilaku_kerja/100);
	    	$response->penilaian_prestasi_kerja = $penilaian_prestasi_kerja;

	    	$kinerja =  ((70*($penilaian_prestasi_kerja/100)/100)*(70*$pegawai->tpp_maksimal/100))+((20*($lkh/100)/100)*(70*$tpp_maksimal/100))+(10*($sop/100));
	    	$response->kinerja = $kinerja;

	    	$kehadiran = (30*$pegawai->tpp_maksimal/100)-((5*$tanpa_alasan/100)+(3*$izin/100)+(3*($terlambat+$cepat_pulang)/100/300))*(30*$pegawai->tpp_maksimal/100);
	    	$response->kehadiran = $kehadiran;

	    	$tpp_bulan_ini = $kehadiran+$kinerja;
	    	$response->tpp_bulan_ini = $tpp_bulan_ini;
		    echo json_encode($response);
	    }
	}
	public function getDataPegawai(){
    	$pegawai = Pegawai::all();
        $n = 0;
        foreach ($pegawai as $t) {
            $array[$n]['nama_pegawai'] = $t->nama;
            $n++;
        }
        echo json_encode($array);
    }
}
