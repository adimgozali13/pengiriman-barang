@extends('layout/master')
@section('title','Kontainer')
@section('subtitle','Kontainer')
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
                <h3 class="card-title">Data Kontainer</h3>
                <button type="button" class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#exampleModal">
                     Tambah Kontainer
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Kontainer</th>
                    <th>Nama Kontainer</th>
                    <th>Ukuran</th>
                    <th>Kapasitas Berat</th>
                    <th>Nama Kapal</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($getdatakontainer as $data)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->nomor_kontainer}}</td>
                    <td>{{$data->nama_kontainer}}</td>
                    <td>{{$data->ukuran}} ft</td>
                    <td>{{$data->kapasitas_tersedia_k}}  / {{$data->kapasitas_berat}} kg</td>
                    <td>{{$data->nama_kapal}}</td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <form action="/kontainer/{{$data->id_kontainer}}" method="post">
                                {{method_field('DELETE')}}
                                    @csrf
                                    <input type="hidden" name="id_kapal" value="{{$data->id_kapal}}">
                                    <input type="hidden" name="kapasitas_tersedia" value="{{$data->kapasitas_tersedia}}">
                                    <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                                </form>
                                
                            </div>
                            
                            <div class="col">
                                    <button type="button" 
                                    data-namakontainer="{{$data->nama_kontainer}}" 
                                    data-idkontainer="{{$data->id_kontainer}}" 
                                    data-ukuran="{{$data->ukuran}}" 
                                    data-kapasitasberat="{{$data->kapasitas_berat}}" 
                                    data-kapasitaskontainer="{{$data->kapasitas_kontainer}}" 
                                    data-kapasitastersediak="{{$data->kapasitas_tersedia_k}}" 
                                    data-idkapal="{{$data->id_kapal}}" 
                                    data-namakapal="{{$data->nama_kapal}}" 
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
    <form action="/kontainer" method="post">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kontainer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    
                   <span >Nama Kontainer</span>
                   <input type="text" class="form-control mt-2"   required="" name="nama_kontainer" placeholder="Nama Kontainer"><br>
                   <span class="mt-3">Kapasitas Berat (kg) </span>
                   <input type="number" class="form-control mt-2"   required="" name="kapasitas_berat" placeholder="Kapasitas Berat">
                </div>
                <div class="col-sm-6">
                    <span >Ukuran (ft)</span>
                    <input type="number" class="form-control mt-2"   required="" name="ukuran" placeholder="Ukuran"><br>
                    <span class="mt-3">Kapal Cargo</span>
                     <select class="custom-select mt-2" required=""  name="id_kapal" >
                                <option  >Pilih Kapal</option>
                               
                                 @foreach($getdatakapal as $data)
                                    <option value="{{$data->id_kapal}}">{{$data->nama_kapal}}</option>
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
    <form action="/kontainer/update" method="post">
       
        @csrf
        
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kontainer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <input type="hidden" name="id_lama" id="idlama">
                    <input type="hidden" name="kapasitas_kontainer" id="kapasitaskontainer">
                    <input type="hidden" name="id_kontainer" id="idkontainer">
                    <input type="hidden" name="kapasitas_sekarang" id="kapasitass">
                    <input type="hidden" name="id_kapal" id="idkapal">
                    <input type="hidden" name="kapasitas_tersedia_k" id="kapasitastersediak">
                   <span >Nama Kontainer</span>
                   <input type="text" class="form-control mt-2" value="" id="namakontainer" required="" name="nama_kontainer" placeholder="Nama Kontainer"><br>
                   <span class="mt-3">Kapasitas Berat (kg) </span>
                   <input type="number" class="form-control mt-2" value="" id="kapasitasberat" required="" name="kapasitas_berat" placeholder="Kapasitas Berat">
                </div>
                
                <div class="col-sm-6">
                    <span >Ukuran (ft)</span>
                    <input type="number" class="form-control mt-2" id="ukuran" value="" required="" name="ukuran" placeholder="Ukuran"><br>
                    <span class="mt-3">Kapal Cargo</span>
                     <select class="custom-select mt-2" required="" name="id_kapal" >
                                <option value="" class="idkapal" id="namakapal"></option>
                               
                                 @foreach($getdatakapal as $data)
                                    <option value="{{$data->id_kapal}}">{{$data->nama_kapal}}</option>
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