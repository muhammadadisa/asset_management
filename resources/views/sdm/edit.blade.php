@extends('layouts.master')

@section('content')
    

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Validation</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Validation</li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>
        
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form method="post" action="{{url('sdm/'.$id)}}"enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="card-body">
                          <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" name="nik" class="form-control" id="nik" placeholder="nik" value="{{$data->nik}}">
                          </div>
                          <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="number" name="nip" class="form-control" id="nip" placeholder="nip" value="{{$data->nip}}">
                          </div>
                          <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="nama" value="{{$data->nama}}">
                          </div>
                          <div class="form-group">
                            <label for="bidang">bidang</label>
                            <input type="text" name="bidang" class="form-control" id="bidang" placeholder="bidang" value="{{$data->tgl_input}}">
                          </div>
                          <div class="form-group">
                            <label for="jabatan">jabatan</label>
                            <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="jabatan" value="{{$data->jabatan}}">
                          </div>
                          <div class="form-group">
                            <label for="seksi">seksi</label>
                            <input type="text" name="seksi" class="form-control" id="seksi" placeholder="seksi" value="{{$data->seksi}}">
                          </div>
                          <div class="form-group">
                            <label for="pangkat">Pangkat/Gol</label>
                            <input type="text" name="pangkat" class="form-control" id="pangkat" placeholder="pangkat" value="{{$data->pangkat}}">
                          </div>
                          <div class="form-group">
                            <label for="alamat">alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat" value="{{$data->alamat}}">
                          </div>
                          <div class="form-group">
                            <label for="kontak">Kontak</label>
                            <input type="number" name="kontak" class="form-control" id="kontak" placeholder="kontak" value="{{$data->kontak}}">
                          </div>
                          <div class="form-group">
                            <label for="foto">foto</label>
                            <input type="file" name="foto" class="form-control" id="foto" placeholder="foto">
                            <input type="hidden" name="old_foto" value="{{$data->foto}}">
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
                    </div>
                  <!--/.col (left) -->
                  <!-- right column -->
                  <div class="col-md-6">
        
                  </div>
                  <!--/.col (right) -->
                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
          </div>
        @endsection 