@extends('layout/master')
@section('title','Dashboard')
@section('subtitle','Dashboard')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$totaldikirim}}</h3>

                <p>Total Dikirim</p>
              </div>
              <div class="icon">
                <i class="fas fa-shipping-fast"></i>
              </div>
              <a href="/pengiriman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$totalterkirim}}</h3>

                <p>Total Terkirim</p>
              </div>
              <div class="icon">
                <i class="fas fa-truck"></i>
              </div>
              <a href="/pengiriman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$totalkapal}}</h3>

                <p>Total Kapal</p>
              </div>
              <div class="icon">
                <i class="fas fa-ship"></i>
              </div>
              <a href="/kapal" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$totalkontainer}}</h3>

                <p>Total Kontainer</p>
              </div>
              <div class="icon">
                <i class="fas fa-pallet"></i>
              </div>
              <a href="/kontainer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
            <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-8 offset-md-2 mt-5">
                  <h5 class="">Tracking Barang</h5>
                    <form action="/dashboard/tracking" method="post" >
                      @csrf
                        <div class="input-group">
                            <input type="number" class="form-control form-control-lg" name="nomor_barang" placeholder="Masukkan Nomor Barang">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- <div class="alert alert-success mt-3" role="alert">
                        <h4 class="alert-heading">Well done!</h4>
                        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                        <hr>
                        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                    </div> -->
                   
                              </div>
                              
                          </div>
                          <div class="col-sm-12">
                             @if($track)
                        <div class="card mt-3">

                            <!-- /.card-header -->
                            <div class="card-body  table-responsive">
                              <table id="example3" class="table table-bordered table-striped">
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
                                </tr>
                                @endforeach
                                </tbody>
                              
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
                                  @endif
                          </div>
                          
                      </div>
        
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
@endsection