@extends('layouts.new')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Pegawai
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active">Pegawai</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">     
      <h4>
        @include('layouts.flash')
      </h4>          
        <div class="container">
            <div class="row">
                <div class="col-md-11 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-body">
                                <div class="box-header"><center><h3>Daftar Pegawai </h3></center></div>
                                <div class="box-body">
                                    <div>
                                        <a href="#myModal" class="btn btn-primary pin" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Pegawai</a>
                                    </div><br>
                                    <div class="table-responsive">
                                    <table id="tabelaset" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><center>No</th>
                                                <th><center>NIP</th>
                                                <th><center>Nama</th>
                                                <th><center>Pangkat/Golongan</th>
                                                <th><center>Jabatan</th>
                                                <th><center>TPP Maksimal</th>
                                                <th><center>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                            @foreach($pegawai as $member)
                                                <tr>
                                                    <td><center>{{ $no }}</td>
                                                    <td>{{ $member->nip }}</td>
                                                    <td>{{ $member->nama }}</td>
                                                    <td>{{ $member->pangkat_golongan }}</td>
                                                    <td>{{ $member->jabatan }}</td>
                                                    <td>{{ $member->tpp_maksimal }}</td>
                                                   
                                                    <td><center><button href="#myModal2" class="btn btn-success btn-sm edit" data-toggle="modal"><i class="fa fa-edit"></i> Edit</button> | <button href="#myModal3" class="btn btn-sm btn-danger infor" data-toggle="modal"><i class="fa fa-times"></i> Hapus</button> </td>
                                                </tr>
                                            <?php $no++; ?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>

                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- konten modal-->
                                    <div class="modal-content">
                                        <!-- heading modal -->
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" id="modal-title" align="center">Tambah Pegawai</h4>
                                        </div>
                                        <!-- body modal -->
                                        <form action="{!!url('/tambah/pegawai')!!}" method="post" class="form-horizontal" >
                                            <div class="modal-body">
                                                <table class="table">
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>:</td>
                                                        <td><input type="text" class="form-control" name="nama" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIP</td>
                                                        <td>:</td>
                                                        <td><input type="text" class="form-control" name="nip" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pangkat/Golongan</td>
                                                        <td>:</td>
                                                        <td><input type="text" class="form-control" name="pangkat" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jabatan</td>
                                                        <td>:</td>
                                                        <td><input class="form-control" type="text" name="jabatan" id="jabatan" required></td>
                                                  </tr>
                                                  <tr>
                                                        <td>TPP Maksimal</td>
                                                        <td>:</td>
                                                        <td><input type="text" class="form-control" name="tpp_maksimal" required></td>
                                                    </tr>
                                                
                                                </table>
                                            </div>
                                        <!-- footer modal -->
                                            <div class="modal-footer">
                                                <button type="submit" name="submit" class="btn btn-info left">Tambah</button> 
                                            </div>
                                                {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </div>
            <div id="myModal2" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title" align="center">Perbarui Data Pegawai</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- body modal -->
                        <form action="{!!url('/edit/pegawai')!!}" method="post" class="form-horizontal" >
                            <div class="modal-body">
                                <table class="table">
                                    <tr>
                                        <td>NP</td>
                                        <td>:</td>
                                        <td><input class="form-control" type="text" name="nip" id="kode" readonly required></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="nama" id="nam" required></td>
                                    </tr>
                                    <tr>
                                        <td>Pangkat/Golongan</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="pangkat" id="pang" required></td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>:</td>
                                        <td><textarea class="form-control" name="jabatan" id="jab" required></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>TPP Maksimal</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="tpp_maksimal" id="tpp" required></td>
                                    </tr>
                                </table>
                            </div>
                    <!-- footer modal -->
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-info left">Update</button> 
                        </div>
                        {{ csrf_field() }}
                         </form>
                    </div>
                </div>
            </div>
            <div id="myModal3" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <!-- konten modal-->
                    <div class="modal-content">
                    <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title" align="center">Penghapusan Data Pegawai</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- body modal -->
                        <form action="{!!url('/hapus/pegawai')!!}" method="post" class="form-horizontal" >
                            <div class="modal-body">
                                <input type="text" id="kode" name="nip" hidden required>
                                <h5 id="hapus">Apakah Anda Yakin Ingin Menghapus Pegawai <i id="bb"></i> ?</h5>
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-info left">Ya</button> 
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
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
    
    $( ".infor" ).click(function() {
      var a=$(this).closest("tr").children('td');
      $( "#kode" ).val(a.eq(1).html());
      $( "#bb" ).html(a.eq(1).html());
    });
    $( ".edit" ).click(function() {
      var a=$(this).closest("tr").children('td');
      $( "#kode" ).val(a.eq(1).html());
      $( "#nam" ).val(a.eq(2).html());
      $( "#pang" ).val(a.eq(3).html());
      $( "#jab" ).val(a.eq(4).html());
      $( "#tpp" ).val(a.eq(5).html());
    });
    $( ".info" ).click(function() {
      var a=$(this).closest("tr").children('td');
      $( "#code" ).html(a.eq(1).html());
      $( "#name" ).html(a.eq(2).html());
      $( "#telp" ).html(a.eq(3).html());
      $( "#address" ).html(a.eq(4).html());
      $( "#reg" ).html(a.eq(5).html());
      $( "#qr" ).html(a.eq(6).html());
      $( "#deposit" ).html(a.eq(7).html());
    });
</script>
@endsection