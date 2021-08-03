@extends('layout/master')
@section('title','Pelabuhan')
@section('subtitle','Pelabuhan')
@section('content')
    <!-- Main content -->
    
    <section class="content">
   
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
               @if(session('pesan'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('pesan')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pelabuhan</h3>
                <button type="button" class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#exampleModal">
                     Tambah Pelabuhan
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pelabuhan</th>
                    <th>Negara</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($getdatapelabuhan as $data)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->nama_pelabuhan}}</td>
                    <td>{{$data->nama_negara}}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-2">
                                <form action="/pelabuhan/{{$data->id_pelabuhan}}" method="post">
                                {{method_field('DELETE')}}
                                    @csrf
                                    <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                                </form>
                                
                            </div>
                            <div class="col-sm-2">
                                    <button type="button" 
                                    data-namapelabuhan="{{$data->nama_pelabuhan}}" 
                                    data-idnegara="{{$data->id_negara}}" 
                                    data-idpelabuhan="{{$data->id_pelabuhan}}" 
                                    data-namanegara="{{$data->nama_negara}}" 
                                    class="btn btn-success editmodal"  data-toggle="modal" data-target="#editModal">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </div>
                        </div>
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


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="/pelabuhan" method="post">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelabuhan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                   <span >Nama Pelabuhan</span>
                   <input type="text" class="form-control mt-2" required="" name="nama_pelabuhan" placeholder="Nama Pelabuhan">
                </div>
                <div class="col-sm-6">
                    <span >Lokasi Negara</span>
                   <select class="custom-select mt-2" required="" name="id_negara" >
                        <option value="">Pilih Negara</option>
                        @foreach($getdatanegara as $data)
                        <option value="{{$data->id_negara}}">{{$data->nama_negara}}</option>
                        @endforeach
                        
                        
                    </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="/pelabuhan/update" method="post">
       
        @csrf
        
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pelabuhan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <input type="hidden" name="id_pelabuhan" id="idpelabuhan" value="">
                    <span >Nama Pelabuhan</span>
                    <input type="text" class="form-control mt-2" id="valpelabuhan"  value=""  name="nama_pelabuhan" placeholder="Nama Negara">
                </div>
                <div class="col-sm-6">
                     <span >Lokasi Negara</span>
                        <select class="custom-select mt-2" required="" name="id_negara" >
                                <option value="" id="negarapelabuhan"></option>
                               
                                 @foreach($getdatanegara as $data)
                                 <option value="{{$data->id_negara}}">{{$data->nama_negara}}</option>
                                @endforeach
                                
                        </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
 

  
</script>
    @endsection