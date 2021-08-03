@extends('layout/master')
@section('title','Pengiriman')
@section('subtitle','Pengiriman')
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
                <h3 class="card-title">Data Pengiriman</h3>
                <button type="button" class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#exampleModal">
                     Tambah Pengiriman
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Barang</th>
                    <th>Nama Barang</th>
                    <th>Berat</th>
                    <th>Status</th>
                    <th>Pelabuhan Asal</th>
                    <th>Pelabuhan Tujuan</th>
                    <th>Kontainer</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($getdatapengiriman as $data)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->nomor_barang}}</td>
                    <td>{{$data->nama_barang}}</td>
                    <td>{{$data->berat_barang}} kg</td>
                    <td>
                        @if($data->status_pengiriman == "Dikirim")
                            <b class="text text-info">{{$data->status_pengiriman}}</b>
                        @else
                            <b class="text text-success">{{$data->status_pengiriman}}</b>
                        @endif
                    </td>
                    <td style="width:150px !important">{{$data->pelabuhan_asal}}</td>
                    <td style="width:150px !important">{{$data->pelabuhan_tujuan}}</td>
                    <td style="width:150px !important">{{$data->nama_kontainer}} ({{$data->nomor_kontainer}})</td>
                    <td style="width:150px !important">
                        <div class="row">
                            <div class="col">
                                <form action="/pengiriman/{{$data->id_pengiriman}}" method="post">
                                {{method_field('DELETE')}}
                                    @csrf
                                    <input type="hidden" value="{{$data->id_kontainer}}" name="id_kontainer">
                                    <input type="hidden" value="{{$data->berat_barang}}" name="berat_barang">
                                    <input type="hidden" value="{{$data->kapasitas_tersedia_k}}" name="kapasitas_tersedia_k">
                                    <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                                </form>
                                
                            </div>
                            <div class="col">
                                    <button type="button" 
                                    data-namabarang="{{$data->nama_barang}}" 
                                    data-idpengiriman="{{$data->id_pengiriman}}" 
                                    data-beratbarang="{{$data->berat_barang}}" 
                                    data-pelabuhanasal="{{$data->pelabuhan_asal}}" 
                                    data-pelabuhantujuan="{{$data->pelabuhan_tujuan}}" 
                                    data-idkontainer="{{$data->id_kontainer}}" 
                                    data-namakontainer="{{$data->nama_kontainer}}" 
                                    data-statuspengiriman="{{$data->status_pengiriman}}" 
                                    data-kapasitastersediak="{{$data->kapasitas_tersedia_k}}" 
                                    data-kapasitasb="{{$data->kapasitas_berat}}" 
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form action="/pengiriman" method="post">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengiriman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    
                   <span >Nama Barang</span>
                   <input type="text" class="form-control mt-2"   required="" name="nama_barang" placeholder="Nama Barang"><br>
                   <span >Negara Asal</span>
                    <select class="custom-select mt-2" required=""  name="negaraasal" >
                        <option  holder>Pilih Negara</option>
                            @foreach($getdatanegara as $data)
                                <option value="{{$data->id_negara}}">{{$data->nama_negara}}</option>
                             @endforeach
                    </select><br><br>
                    <span >Pelabuhan Asal</span>
                    <select name="pelabuhan_asal" id="pelabuhan_asal" class="custom-select mt-2" required>
                            <option value="" holder>Pilih Pelabuhan</option>
                    </select>
                    <br><br>
                    <span >Pilih Kapal</span>
                    <select class="custom-select mt-2" required=""  name="kapal" >
                        <option  holder>Pilih Kapal</option>
                            @foreach($getdatakapal as $data)
                                <option value="{{$data->id_kapal}}">{{$data->nama_kapal}}</option>
                             @endforeach
                    </select>
                   
                </div>
                <div class="col-sm-6">
                    <span>Berat (kg)</span>
                     <input type="number" class="form-control mt-2"   required="" name="berat_barang" placeholder="Berat Barang"><br>
                    <span >Negara Tujuan</span>
                    <select class="custom-select mt-2" required=""  name="negaratujuan" >
                        <option  holder>Pilih Negara</option>
                            @foreach($getdatanegara as $data)
                                <option value="{{$data->id_negara}}">{{$data->nama_negara}}</option>
                             @endforeach
                    </select><br><br>
                    <span >Pelabuhan Tujuan</span>
                    <select name="pelabuhan_tujuan" id="pelabuhan_tujuan" class="custom-select mt-2" required>
                            <option value="" holder>Pilih Pelabuhan</option>
                    </select><br><br>
                    <span >Kontainer</span>
                    <select name="id_kontainer" id="id_kontainer" class="custom-select mt-2" required>
                            <option value="" holder>Pilih Kontainer</option>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form action="/pengiriman/update" method="post">
       
        @csrf
        
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pengiriman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    
                   <span >Nama Barang</span>
                   <input type="text" class="form-control mt-2" id="namabarang"   required="" name="nama_barang" placeholder="Nama Barang"><br>
                   <span >Negara Asal</span>
                    <select class="custom-select mt-2" required=""  name="negaraasal" >
                        <option  holder>Pilih Negara</option>
                            @foreach($getdatanegara as $data)
                                <option value="{{$data->id_negara}}">{{$data->nama_negara}}</option>
                             @endforeach
                    </select><br><br>
                    <span >Pelabuhan Asal</span>
                    <select name="pelabuhan_asal" id="pelabuhan_asal" class="custom-select mt-2" required>
                              <option value="" id="pelabuhanasal" holder></option>
                            <option value="" holder>Pilih Pelabuhan</option>
                    </select>
                    <br><br>
                    <span >Pilih Kapal</span>
                    <select class="custom-select mt-2" required=""  name="kapal" >
                        <option  holder>Pilih Kapal</option>
                            @foreach($getdatakapal as $data)
                                <option value="{{$data->id_kapal}}">{{$data->nama_kapal}}</option>
                             @endforeach
                    </select>
                   
                </div>
                
                <div class="col-sm-6">
                    <span>Berat (kg)</span>
                     <input type="number" class="form-control mt-2"  id="beratbarang"  required="" name="berat_barang" placeholder="Berat Barang"><br>
                    <span >Negara Tujuan</span>
                    <select class="custom-select mt-2" required=""  name="negaratujuan" >
                        <option  holder>Pilih Negara</option>
                            @foreach($getdatanegara as $data)
                                <option value="{{$data->id_negara}}">{{$data->nama_negara}}</option>
                             @endforeach
                    </select><br><br>
                    <span >Pelabuhan Tujuan</span>
                    <select name="pelabuhan_tujuan" id="pelabuhan_tujuan" class="custom-select mt-2" required>
                            <option value="" id="pelabuhantujuan" holder></option>
                            <option value="" holder>Pilih Pelabuhan</option>
                    </select><br><br>
                    <span >Kontainer</span>
                    <select name="id_kontainer" class="custom-select mt-2" required>
                            <option value="" id="idkontainer"></option>
                            <option value="" holder>Pilih Kontainer</option>
                    </select>

                    
                    
                   
                </div>
                <div class="col-sm-12">
                    <br>
                    <span >Status Pengiriman</span>
                    <select class="custom-select mt-2" required=""  name="status_pengiriman" >
                        <option value="" id="statuspengiriman"></option>
                        <option  value="Dikirim">Dikirim</option>
                        <option  value="Terkirim">Terkirim</option>
                    </select>
                    <input type="hidden" name="berat_sekarang" id="beratsekarang">
                    <input type="hidden" name="kapasitas_tersedia_k" id="kapasitastersediak">
                    <input type="hidden" name="id_pengiriman" id="idpengiriman">
                    
                   

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