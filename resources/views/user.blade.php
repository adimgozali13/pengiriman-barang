@extends('layout/master')
@section('title','User')
@section('subtitle','User')
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
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('error')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data User</h3>
                <button type="button" class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#exampleModal">
                     Tambah User
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Level</th>
                    <th>Operator Pelabuhan</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($getdatauser as $data)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->username}}</td>
                    <td>{{$data->level}}</td>
                    <td>{{$data->nama_pelabuhan}}</td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <form action="/user/{{$data->id_user}}" method="post">
                                {{method_field('DELETE')}}
                                    @csrf
                                    <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                                </form>
                                
                            </div>
                            <div class="col">
                                    <button type="button" 
                                    data-username="{{$data->username}}" 
                                    data-idpelabuhan="{{$data->id_pelabuhan}}" 
                                    data-namapelabuhan="{{$data->nama_pelabuhan}}" 
                                    data-iduser="{{$data->id_user}}" 
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
    <form action="/user" method="post">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <span>Username</span>
                    <input type="text" class="form-control mt-2" required="" name="username" placeholder="Username">
                    <br>
                    <span>Password</span>
                    <input type="password" class="form-control mt-2" required="" name="password" placeholder="Password">
                </div>
                <div class="col-sm-6">
                    <span>Operator Pelabuhan</span>
                    <select class="custom-select mt-2" required=""  name="id_pelabuhan" >
                        <option  value="">Pilih Pelabuhan</option>
                            @foreach($getdatapelabuhan as $data)
                                <option value="{{$data->id_pelabuhan}}">{{$data->nama_pelabuhan}}</option>
                             @endforeach
                    </select><br><br>
                    <span>Konfirmasi Password</span>
                    <input type="password" class="form-control mt-2" required="" name="confirmpass" placeholder="Password">
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
    <form action="/user/update" method="post">
       
        @csrf
        
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <span>Username</span>
                    <input type="text" class="form-control mt-2" required="" id="username" name="username" placeholder="Username">
                    <br>
                    <span>Password Baru</span>
                    <input type="password" class="form-control mt-2"  name="password" placeholder="Kosongkan jika tidak di ubah">
                </div>
                <div class="col-sm-6">
                    <span>Operator Pelabuhan</span>
                    <select class="custom-select mt-2" required=""  name="id_pelabuhan" >
                        <option value="" id="idpelabuhan"></option>
                        <option  holder>Pilih Pelabuhan</option>
                            @foreach($getdatapelabuhan as $data)
                                <option value="{{$data->id_pelabuhan}}">{{$data->nama_pelabuhan}}</option>
                             @endforeach
                    </select><br><br>
                    <span>Konfirmasi Password</span>
                    <input type="password" class="form-control mt-2"  name="confirmpass" placeholder="Password">
                        <input type="hidden" name="id_user" id="iduser">
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