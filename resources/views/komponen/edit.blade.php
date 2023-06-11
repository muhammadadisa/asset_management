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
                      <form method="post" action="{{url('komponen/'.$id)}}"enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="card-body">
                          <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" class="form-control" id="kode" placeholder="kode" value="{{$data->kode}}">
                          </div>
                          <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="nama" value="{{$data->nama}}">
                          </div>
                          <div class="form-group">
                            <label for="tipe">tipe</label>
                            <input type="text" name="tipe" class="form-control" id="tipe" placeholder="tipe" value="{{$data->tipe}}">
                          </div>
                          <div class="form-group">
                            <label for="lokasi">lokasi</label>
                            <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="lokasi" value="{{$data->lokasi}}">
                          </div>
                          <div class="form-group">
                            <label>Kondisi</label>
                            <select class="custom-select" name="kondisi">
                            <option selected disabled> piih</option>
                              <option value="bisa" {{$data->kondisi=='bisa'?'selected':''}}>Bisa</option>
                              <option value="tidak bisa"{{$data->kondisi=='tidak bisa'?'selected':''}}>tidak bisa</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="harga">harga</label>
                            <input type="number" name="harga" class="form-control" id="harga" placeholder="harga" value="{{$data->harga}}">
                          </div>
                          <div class="form-group">
                            <label for="tanggal">tanggal</label>
                            <input type="date" name="tgl_input" class="form-control" id="tanggal" placeholder="tanggal" value="{{$data->tgl_input}}">
                          </div>
                          <div class="form-group">
                            <label for="foto">foto</label>
                            <input type="file" name="foto" class="form-control" id="foto" placeholder="foto">
                            <input type="hidden" name="old_foto" value="{{$data->foto}}">
                          </div>
                          <div class="form-group">
                            <label for="keterangan">keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="keterangan" value="{{$data->keterangan}}">
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