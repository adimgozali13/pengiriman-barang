@extends('layout/master')
@section('title','Negara')
@section('subtitle','Negara')
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
                <h3 class="card-title">Data Negara</h3>
                <button type="button" class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#exampleModal">
                     Tambah Negara
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Negara</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($getdatanegara as $data)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->nama_negara}}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-2">
                                <form action="/negara/{{$data->id_negara}}" method="post">
                                {{method_field('DELETE')}}
                                    @csrf
                                    <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                                </form>
                                
                            </div>
                            <div class="col-sm-2">
                                    <button type="button" 
                                    data-namanegara="{{$data->nama_negara}}" 
                                    data-idnegara="{{$data->id_negara}}" 
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
    <form action="/negara" method="post">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Negara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <span>Nama Negara</span>
        <input type="text" class="form-control mt-2" required="" name="nama_negara" placeholder="Nama Negara">
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
    <form action="/negara/update" method="post">
       
        @csrf
        
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Negara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <input type="hidden" name="id_negara" required="" id="idnegara" value="">
            <span>Nama Negara</span>
        <input type="text" class="form-control mt-2" id="valnegara"  value=""  name="nama_negara" placeholder="Nama Negara">
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