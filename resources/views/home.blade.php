@extends('layouts.new')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
