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
                      
                      <form method="post" action="{{route('transaksi.store')}}"enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label>pilih user</label>
                            <select class="custom-select js-example-basic-single" name="sdm_id" required 
                            onchange="cekBarangYangSudahPinjam(this.value)">
                            <option selected disabled></option>
                              @foreach($sdm as $key => $item)
                                <option value="{{$item->id}}">{{$item->nama}} - NIK : {{$item->nik}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>pilih asset</label>
                            <select class="custom-select js-example-basic-single" name="asset_id[]"multiple >
                              @foreach($asset as $key => $item)
                                <option value="{{$item->id}}" id="asset_val{{$item->id}}">{{$item->nama}} - kode : {{$item->kode}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>pilih komponen</label>
                            <select class="custom-select js-example-basic-single" name="komponen_id[]" multiple>
                              @foreach($komponen as $key => $item)
                                <option value="{{$item->id}}" id="komponen_val{{$item->id}}">{{$item->nama}} - kode : {{$item->kode}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>pilih software</label>
                            <select class="custom-select js-example-basic-single" name="software_id[]" multiple>
                              @foreach($software as $key => $item)
                                <option value="{{$item->id}}" id="software_val{{$item->id}}">{{$item->nama}} - kode : {{$item->kode}}</option>
                              @endforeach
                            </select>
                          </div>
                          <input type="hidden" id="asset_val" name="asset_val" value="">
                          <input type="hidden" id="software_val" name="software_val" value="">
                          <input type="hidden" id="komponen_val" name="komponen_val" value="">
                          <div class="form-group">
                            <label for="tanggal_pinjam" required>tanggal peminjaman</label>
                            <input type="date" name="tanggal_pinjam" class="form-control" id="tanggal_pinjam" placeholder="tgl_peminjaman">
                          </div>
                          <div class="form-group">
                            <label for="tgl_pengembalian">tanggal pengembalian </label>
                            <input type="date" name="tgl_pengembalian" class="form-control" id="tgl_pengembalian" placeholder="tgl_pengembalian">
                          </div>
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
                  <!--/.col (right) -->
                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
          </div>
        @endsection 
        @section('add')
        
        @endsection
 