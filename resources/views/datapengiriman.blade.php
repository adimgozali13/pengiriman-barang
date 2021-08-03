@extends('layout/master')
@section('title','Data Pengiriman')
@section('subtitle','Data Pengiriman')
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
                <h3 class="card-title">Data Data Pengiriman</h3>
                
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
                        <form action="/terima" method="get">
                        @csrf
                            <input type="hidden" value="{{$data->id_pengiriman}}" name="id_pengiriman">
                            <input type="hidden" value="{{$data->id_kontainer}}" name="id_kontainer">
                            <input type="hidden" value="{{$data->berat_barang}}" name="berat_barang">
                            @if($data->status_pengiriman == "Dikirim")
                                <button onclick="return confirm('Apakah anda yakin ?')" type="submit" class="btn btn-info">Terima</button>
                            @else
                                <label class="btn btn-sm btn-secondary">Sudah Diterima</label>
                            @endif
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


    


<script>
 

  
</script>
    @endsection