@extends('layouts.master')

@section('content')
    
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{$asset}}</h3>

                                    <p>ASSET</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-desktop"></i>
                                </div>
                                <a href="{{ url('/asset') }}" class="small-box-footer">More info <i
                                        class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$komponen}}</h3>

                                    <p>Komponen</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <a href="{{ url('/komponen') }}" class="small-box-footer">More info <i
                                        class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$software}}</h3>

                                    <p>softwares</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-code"></i>
                                </div>
                                <a href="{{ url('/software') }}"class="small-box-footer">more info 
                                    <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$sdm}}</h3>

                                    <p>User</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="{{ url('/sdm') }}" class="small-box-footer">More info <i
                                        class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                   
                </div><!-- /.container-fluid -->
                <div class="card">
                  <div class="card-header border-transparent">
                    <h3 class="card-title">Aktivitas Terakhir</h3>
    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table m-0">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>nama</th>
                          <th>konten</th>
                          <th>tipe</th>
                          <th>ip</th>
                          <th>tanggal</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($log as $key => $item)
                        <tr>
                          <td>{{$key +1}}</td>
                          <td>{{$item->nama}}
                        </td>
                        <td>{{$item->konten}}</td>
                        <td>{{$item->tipe}}</td>
                        <td>{{$item->ip}}</td>
                        <td>{{$item->created_at}}</td>
                        </tr>
    
                        </tbody>
                        @endforeach
                      </table>
                    </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
            </section>
            <!-- /.content -->
        </div>
@endsection 