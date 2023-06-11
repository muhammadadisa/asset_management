@extends('layouts.master')

@section('content')
    

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>software</h1>
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
                                  <a href="{{url('software/create')}}" type="button" style="width: 100px" class="btn btn-block btn-primary">Create</a>
                                </div>
                                <div class="card-body">
                                    
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Status</th>
                                                <th>nama</th>
                                                <th>kondisi</th>
                                                <th>harga</th>
                                                <th>Tanggal</th>
                                                <th>tanggal EX</th>
                                                <th>link</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($software as $key => $item)
                                          <tr>
                                            <td>{{$key +1}}</td>
                                            <td>{{$item->kode}}
                                            </td>
                                            <td>{{$pinjam[$item->id]}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->kondisi}}</td>
                                            <td>{{$item->harga}}</td>
                                            <td>{{$item->tgl_input}}</td>
                                            <td>{{$item->tgl_ex}}</td>
                                            <td>{{$item->link}}</td>
                                            <td>
                                                <a href="{{url('software/'.$item->id.'/edit')}}"  class="btn btn-warning btn-sm" >
                                                <i class="fa fa-edit" ></i> </a>
                                                &nbsp;&nbsp;
                                                <a   class="btn btn-danger btn-sm" onclick="document.getElementById('delete-form{{$item->id}}').submit();"style="cursor: pointer">
                                                    <i class="fa fa-trash" ></i> 
                                                    </a>
                                                    <form id="delete-form{{$item->id}}" method="post" style="display: none" action="{{url('software/'.$item->id)}}" >
                                                        {{method_field('DELETE')}}
                                                        @csrf
                                                    </form>
            
                                                </td>

                                        </tr>
                                          @endforeach
                                            

                                        </tbody>
                                        
                                    </table>
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
  