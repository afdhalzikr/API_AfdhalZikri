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
                                <div><h3><b>Tambahan Penghasilan Pegawai bulan ini :</b>Rp. <?php echo number_format($tpp_bulan_ini,2,',','.');?></h3></div>
                                <div><h3>Kehadiran :{{$kehadiran}}</h3></div>
                                <div><h3>Kinerja :{{$kinerja}}</h3></div>
                                <div><h3>Penilaian Prestasi Kerja :{{$penilaian_prestasi_kerja}}</h3></div>
                                <div><h3>Sasaran Kerja Pegawai :{{$sasaran_kerja_pegawai}}</h3></div>
                                <div><h3>Perilaku Kerja :{{$perilaku_kerja}}</h3></div>
                                <div><h3>Disiplin :{{$disiplin}}</h3></div>
                                <div><h3>Komitmen :{{$komitmen}}</h3></div>
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

</script>
@endsection