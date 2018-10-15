@extends('layouts.new')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active">TPP</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <h3>
        @include('layouts.flash')
      </h3>      
        <div class="container">
            <div class="row">
                <div class="col-md-11 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-body"> 
                            <div class="box">
                                <div class="box-header"><center><h3>Perhitungan Nilai Tambahan Penghasilan Pegawai</h3></center></div>
                                  <form action="{{url('tpp/hitung')}}" method="post" class="form-horizontal">
                                    <div class="box-body">
                                      <div class="box">
                                        <table class="table">
                                          <tr>
                                            <td>Nama Pegawai</td>
                                            <td width="10%">:</td>
                                            <td><select name="pegawai" id="pegawai" class="form-control select" style="width: 100%;"  required >
                                              <option></option>
                                              @foreach($pegawai as $pegawai)
                                              <option value="{{$pegawai->nip}}">{{$pegawai->nama}}</option>
                                              @endforeach
                                            </select></td>
                                        </tr>
                                        <tr>
                                            <td>Tahun</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="tahun" name="tahun" onchange="carinama()" required></td>
                                        </tr>
                                        <tr>
                                            <td>Bulan</td>
                                            <td width="10%">:</td>
                                            <td><select name="bulan" id="bulan" class="form-control select" style="width: 100%;" required >
                                              <option></option>
                                              <option value="januari">Januari</option>
                                              <option value="februari">Februari</option>
                                              <option value="maret">Maret</option>
                                              <option value="april">April</option>
                                              <option value="mei">Mei</option>
                                              <option value="juni">Juni</option>
                                              <option value="juli">Juli</option>
                                              <option value="agustus">Agustus</option>
                                              <option value="september">September</option>
                                              <option value="oktober">Oktober</option>
                                              <option value="november">November</option>
                                              <option value="desember">Desember</option>
                                            </select></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Hari Kerja</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="jumlah_hari_kerja" name="jumlah_hari_kerja" required></td>
                                        </tr>
                                        <tr>
                                            <td>Hadir</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="hadir" name="hadir"  onchange="getDisiplin()" required></td>
                                        </tr>
                                        <tr>
                                            <td>Izin</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="izin" name="izin" required></td>
                                        </tr>
                                        <tr>
                                            <td>Sakit</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="sakit" name="sakit" required></td>
                                        </tr>
                                        <tr>
                                            <td>Cuti</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="cuti" name="cuti" required></td>
                                        </tr>
                                        <tr>
                                            <td>Tanpa Alasan Sah</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="tanpa_alasan" name="tanpa_alasan" required></td>
                                        </tr>
                                        <tr>
                                            <td>Terlambat</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="terlambat" name="terlambat" required></td>
                                        </tr>
                                        <tr>
                                            <td>Cepat Pulang</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="cepat_pulang" name="cepat_pulang" required></td>
                                        </tr>
                                        <tr>
                                            <td>UWAS</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="uwas" name="uwas" required></td>
                                        </tr>
                                        <tr>
                                            <td>Upacara</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="upacara" name="upacara" required></td>
                                        </tr>
                                        <tr>
                                            <td>Wirid</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="wirid" name="wirid" required></td>
                                        </tr>
                                        <tr>
                                            <td>Apel</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="apel" name="apel" required></td>
                                        </tr>
                                        <tr>
                                            <td>Senam</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="senam" name="senam" onchange="getKomitmen()" required></td>
                                        </tr>
                                        <tr>
                                            <td>SKP</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="skp" name="skp" required></td>
                                        </tr>
                                        <tr>
                                            <td>Orientasi Pelayanan</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="orientasi_pelayanan" name="orientasi_pelayanan" required></td>
                                        </tr>
                                        <tr>
                                            <td>Integritas</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="integritas" name="integritas" required></td>
                                        </tr>
                                        <tr>
                                            <td>Komitmen</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="komitmen" name="komitmen" readonly required></td>
                                        </tr>
                                        <tr>
                                            <td>Disiplin</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="disiplin" name="disiplin" readonly required></td>
                                        </tr>
                                        <tr>
                                            <td>Kerjasama</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="kerjasama" name="kerjasama" required></td>
                                        </tr>
                                        <tr>
                                            <td>Kepemimpinan</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="kepemimpinan" name="kepemimpinan" required></td>
                                        </tr>
                                        <tr>
                                            <td>LKH</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="lkh" name="lkh" required></td>
                                        </tr>
                                        <tr>
                                            <td>SOP</td>
                                            <td width="10%">:</td>
                                            <td><input type="text" class="form-control" id="sop" name="sop" required></td>
                                        </tr>
                                        
                                      </table>
                                    </div>
                                   
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                      <button type="submit" name="submit" class="btn btn-info pull-right">Hitung Nilai</button>
                                    </div>
                                    {{ csrf_field() }}
                                    <!-- /.box-footer -->
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('jscript')
<script type="text/javascript">
function getDisiplin(){   

      var hadir = document.getElementById('hadir').value; 
      var jmlharikerja = document.getElementById('jumlah_hari_kerja').value; 
      
      hadir = parseInt(hadir);
      jmlharikerja = parseInt(jmlharikerja);
      var hasil = hadir/jmlharikerja*100;
      $( "#disiplin" ).val(hasil);
              
    }
function getKomitmen(){   

      var upacara = document.getElementById('upacara').value; 
      var wirid = document.getElementById('wirid').value; 
      var apel = document.getElementById('apel').value; 
      var senam = document.getElementById('senam').value; 
      var uwas = document.getElementById('uwas').value; 
      upacara = parseInt(upacara);
      wirid = parseInt(wirid);
      apel = parseInt(apel);
      senam = parseInt(senam);
      var hasil = upacara+wirid+apel+senam;
      $( "#komitmen" ).val(hasil);
              
    }
</script>
@endsection