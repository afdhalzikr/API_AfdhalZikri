<?php

namespace App\Http\Controllers;
use App\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$pegawai = Pegawai::all();
       	return view('pegawai/index',['pegawai'=>$pegawai]);
       
    }
    public function tambah(Request $request)
    {
    	$pegawai = new Pegawai;
    	$pegawai->nip = $request->nip;
    	$pegawai->nama = $request->nama;
    	$pegawai->pangkat_golongan = $request->pangkat;
    	$pegawai->jabatan = $request->jabatan;
    	$pegawai->tpp_maksimal = $request->tpp_maksimal;
    	$pegawai->save();
    	return redirect('/pegawai');
    }
    public function edit(Request $request){
        $pegawai = Pegawai::where('nip',$request->nip)->update(['nama'=>$request->nama,'pangkat_golongan'=>$request->pangkat, 'jabatan'=>$request->jabatan, 'tpp_maksimal'=>$request->tpp_maksimal]);
        return redirect('/pegawai')->with(['success' => 'Berhasil Memperbarui Data Member']);
    }
    public function hapus(Request $request){
        $pegawai = Pegawai::where('nip',$request->nip);
        $pegawai->delete();
        return redirect('/pegawai')->with(['success' => 'Berhasil Menghapus Data Member']);
    }
}
