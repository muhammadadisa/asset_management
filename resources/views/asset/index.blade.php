@extends('layouts.master')

@section('content')
    

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Asset</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-12">

                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-header">
                                  <a href="{{url('asset/create')}}" type="button" style="width: 100px" class="btn btn-block btn-primary">Create</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table id="example2" class="table table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>status</th>
                                                <th>nama</th>
                                                <th>tipe</th>
                                                <th>warna</th>
                                                <th>no seri</th>
                                                <th>kondisi</th>
                                                <th>lokasi</th>
                                                <th>harga</th>
                                                <th>Tanggal</th>
                                                <th>vendor</th>
                                                <th>foto</th>
                                                <th>keterangan</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($asset as $key => $item)
                                          <tr>
                                            <td>{{$key +1}}</td>
                                            <td>{{$item->kode}}
                                            </td>
                                            <td>{{$pinjam[$item->id]}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->tipe}}</td>
                                            <td>{{$item->warna}}</td>
                                            <td>{{$item->noseri}}</td>
                                            <td> {{$item->kondisi}}</td>
                                            <td> {{$item->lokasi}}</td>
                                            <td>{{$item->harga}}</td>
                                            <td>{{$item->tgl_input}}</td>
                                            <td>{{$item->vendor}}</td>
                                            <td><img src="{{$item->foto}}" class= "rounded float-left" style="width: 80px"></td>
                                            <td>{{$item->keterangan}}</td>
                                            <td>
                                                <a href="{{url('asset/'.$item->id.'/edit')}}"  class="btn btn-warning btn-sm" >
                                                <i class="fa fa-edit" ></i> </a>
                                                &nbsp;&nbsp;
                                                <a   class="btn btn-danger btn-sm" onclick="document.getElementById('delete-form{{$item->id}}').submit();"style="cursor: pointer">
                                                    <i class="fa fa-trash" ></i> 
                                                    </a>
                                                    <form id="delete-form{{$item->id}}" method="post" style="display: none" action="{{url('asset/'.$item->id)}}" >
                                                        {{method_field('DELETE')}}
                                                        @csrf
                                                    </form>
                                                </td>

                                        </tr>
                                          @endforeach
                                            

                                        </tbody>
                                        
                                    </table>
                                </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        @endsection 
  