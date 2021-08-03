@extends('layout/master')
@section('title','Kapal Cargo')
@section('subtitle','Kapal Cargo')
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
                <h3 class="card-title">Data Kapal Cargo</h3>
                <button type="button" class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#exampleModal">
                     Tambah Kapal Cargo
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Kapal</th>
                    <th>Nama Kapal Cargo</th>
                    <th>panjang</th>
                    <th>Lebar</th>
                    <th>Kapasitas Kontainer</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($getdatakapal as $data)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->nomor_kapal}}</td>
                    <td>{{$data->nama_kapal}}</td>
                    <td>{{$data->panjang}} m</td>
                    <td>{{$data->lebar}} m</td>
                    <td>{{$data->kapasitas_tersedia}}/{{$data->kapasitas_kontainer}}</td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <form action="/kapal/{{$data->id_kapal}}" method="post">
                                {{method_field('DELETE')}}
                                    @csrf
                                    <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                                </form>
                                
                            </div>
                            <div class="col">
                                    <button type="button" 
                                    data-namakapal="{{$data->nama_kapal}}" 
                                    data-idkapal="{{$data->id_kapal}}" 
                                    data-panjang="{{$data->panjang}}" 
                                    data-lebar="{{$data->lebar}}" 
                                    data-kapasitas="{{$data->kapasitas_kontainer}}" 
                                    data-kapasitastersedia="{{$data->kapasitas_tersedia}}" 
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
    <form action="/kapal" method="post">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kapal Cargo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    
                   <span >Nama Kapal Cargo</span>
                   <input type="text" class="form-control mt-2" required="" name="nama_kapal" placeholder="Nama Kapal Cargo"><br>
                   <span class="mt-3">Kapasitas Kontainer</span>
                   <input type="number" class="form-control mt-2" required="" name="kapasitas_kontainer" placeholder="Kapasitas Kontainer">
                </div>
                <div class="col-sm-6">
                    <span >Panjang (m)</span>
                    <input type="number" class="form-control mt-2" required="" name="panjang" placeholder="Panjang"><br>
                    <span class="mt-3">Lebar (m)</span>
                    <input type="number" class="form-control mt-2" required="" name="lebar" placeholder="Lebar">
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
    <form action="/kapal/update" method="post">
       
        @csrf
        
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kapal Cargo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <input type="hidden" name="id_kapal" id="idkapal" value="">
                    <input type="hidden" name="kapasitas_tersedia" id="kapasitastersedia" value="">
                    <input type="hidden" name="kapasitas_sekarang" id="kapasitassekarang" value="">
                   <span >Nama Kapal Cargo</span>
                   <input type="text" class="form-control mt-2" required="" id="namakapalc" name="nama_kapal" placeholder="Nama Kapal Cargo"><br>
                   <span class="mt-3">Kapasitas Kontainer</span>
                   <input type="number" class="form-control mt-2" required="" id="kapasitas" name="kapasitas_kontainer" placeholder="Kapasitas Kontainer">
                </div>
                <div class="col-sm-6">
                    <span >Panjang (m)</span>
                    <input type="number" class="form-control mt-2" required="" id="panjang" name="panjang" placeholder="Panjang"><br>
                    <span class="mt-3">Lebar (m)</span>
                    <input type="number" class="form-control mt-2" required="" id="lebar" name="lebar" placeholder="Lebar">
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