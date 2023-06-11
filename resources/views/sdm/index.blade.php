@extends('layouts.master')

@section('content')
    

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>User</h1>
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
                                  <a href="{{url('sdm/create')}}" type="button"  class="btn  btn-primary">Create</a>
                                  
                                  <a href="{{ url('/transaksi') }}" type="button" class="btn btn-success">Tambah Transaksi</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>NIP</th>
                                                <th>nama</th>
                                                <th>bidang</th>
                                                <th>jabatan</th>
                                                <th>seksi</th>
                                                <th>pangkat/gol</th>
                                                <th>alamat</th>
                                                <th>kontak</th>
                                                <th>foto</th>
                                                <th>action</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($sdm as $key => $item)
                                          <tr>
                                            <td>{{$key +1}}</td>
                                            <td>{{$item->nik}}</td>
                                            <td>{{$item->nip}}</td>
                                            <td>{{$item->nama}}
                                            </td>
                                            <td>{{$item->bidang}}</td>
                                            <td>{{$item->jabatan}}</td>
                                            <td> {{$item->seksi}}</td>
                                            <td> {{$item->pangkat}}</td>
                                            <td> {{$item->alamat}}</td>
                                            <td> {{$item->kontak}}</td>
                                            <td><img src="{{$item->foto}}" class= "rounded float-left" style="width: 80px"></td>
                                            <td>
                                                <a href="{{url('sdm/'.$item->id.'/edit')}}"  class="btn btn-warning btn-sm" >
                                                <i class="fa fa-edit" ></i> </a>
                                                &nbsp;&nbsp;
                                                <a   class="btn btn-danger btn-sm" onclick="document.getElementById('delete-form{{$item->id}}').submit();"style="cursor: pointer">
                                                    <i class="fa fa-trash" ></i> 
                                                    </a>
                                                    <form id="delete-form{{$item->id}}" method="post" style="display: none" action="{{url('sdm/'.$item->id)}}" >
                                                        {{method_field('DELETE')}}
                                                        @csrf
                                                    </form>
                                                    <a   class="btn btn-info btn-sm" style="cursor: pointer" data-toggle="modal" data-target="#myModal{{$item->id}}">
                                                        <i class="fa fa-eye" ></i> 
                                                        </a>
                                                </td>

                                        </tr>
                                        <div class="modal" id="myModal{{$item->id}}">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                          
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title">List asset</h4>
                                                
                                                </div>
                                                @php $idArr = []; 
                                                     $resultArr = [];
                                                @endphp
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                @if(isset($asset[$item->id]))
                                                  @foreach($asset[$item->id] as $key => $data)
                                                    <?php echo $data['html']?>
                                                    @php array_push($idArr,$data['id']); @endphp
                                                  @endforeach
                                                @endif
                                                </div>
                                              </div>

                                              <div class="modal-content">
                                          
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title">List Komponen</h4>
                                                  
                                                </div>
                                                @php $idArr = []; 
                                                     $resultArr = [];
                                                @endphp
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                               

                                                @if(isset($komponen[$item->id]))
                                                  @foreach($komponen[$item->id] as $key => $data)
                                                   <?php echo $data['html']?>
                                                   @php array_push($idArr,$data['id']); @endphp
                                                  @endforeach
                                                @endif

                                              
                                                </div>
                                                
                                                <!-- Modal footer -->
                                         
                                                
                                          
                                              </div>

                                              <div class="modal-content">
                                          
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title">List Software</h4>
                                                  
                                                </div>
                                                @php $idArr = []; 
                                                     $resultArr = [];
                                                @endphp
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                               

                                                @if(isset($software[$item->id]))
                                                    @foreach($software[$item->id] as $key => $data)
                                                    <?php echo $data['html']?>
                                                    @php array_push($idArr,$data['id']); @endphp
                                                    @endforeach
                                                @endif
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                  @php $arg = array_unique($idArr); @endphp
                                                  @if(count($arg) > 0)
                                                      @foreach($arg as $ar)
                                                      <a href="{{url('transaksi/'.$ar.'/edit')}}" class="btn btn-primary">Edit Pinjaman ID {{$ar}}</a>&nbsp;
                                                      @endforeach
                                                  @endif
                                                  @php $arg = array_unique($idArr); @endphp
                                                  @if(count($arg) > 0)
                                                      @foreach($arg as $ar)
                                                      <a href="{{url('transaksiPDF/'.$ar)}}" class="btn btn-warning">Export laporan ID {{$ar}}</a>&nbsp;
                                                      @endforeach
                                                  @endif
                                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                                
                                          
                                              </div>
                                            </div>
                                          </div>
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
       