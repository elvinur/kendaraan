@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-4">
                <div class="card">
                  <div class="card-header">
                    <div class="row align-items-center">
                      <div class="col">
                        <h3 class="mb-0">Laporan</h3>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="card-text mb-2"><i class="ni ni-book-bookmark"></i>Rekap Data Kendaraan</div>
                            <section class="kendaraan">
                                <a class="btn btn-danger " href="{{ route('kendaraan.pdf') }}" target="_blank"><i class="ni ni-cloud-download-95"></i> Export Pdf</a>
                                <a class="btn btn-success" href="{{ route('kendaraan.excel') }}" target="_blank">
                                 <i class="ni ni-cloud-download-95"></i> Export Excel</a>
                            </section>
                            <br>
                            <div class="card-text mb-2"><i class="ni ni-book-bookmark"></i>Rekap Data Pegawai</div>
                            <section class="pegawai">
                                <a class="btn btn-danger " href="{{ route('pegawai.pdf') }}" target="_blank"><i class="ni ni-cloud-download-95"></i> Export Pdf</a>
                                <a class="btn btn-success" href="{{ route('pegawai.excel') }}" target="_blank">
                                 <i class="ni ni-cloud-download-95"></i> Export Excel</a>
                            </section>
                            <br>
                            
                            <div class="card-text mb-2"><i class="ni ni-book-bookmark"></i>Laporan Pajak</div>                           
                            <select name="pegawai_id" id="select_pegawai" class="form-control" value="{{ old('nama') }}">
                                <option disabled selected>-- Pilih Nama Pemegang --</option>
                            </select>
                            <section class="kendaraan">
                                <a class="btn btn-danger " href="{{ route('pajak.pdf') }}" target="_blank"><i class="ni ni-cloud-download-95"></i> Export Pdf</a>
                                <!-- <a class="btn btn-success" href="{{ route('buku.excel') }}" target="_blank"> -->
                                 <!-- <i class="ni ni-cloud-download-95"></i> Export Excel</a> -->
                            </section>
                            <br>
                            <div class="card-text mb-2"><i class="ni ni-book-bookmark"></i>Laporan Service</div>
                            <section class="kendaraan">
                                <a class="btn btn-danger " href="{{ route('kendaraan.pdf') }}" target="_blank"><i class="ni ni-cloud-download-95"></i> Export Pdf</a>
                                <!-- <a class="btn btn-success" href="{{ route('buku.excel') }}" target="_blank"> -->
                                 <!-- <i class="ni ni-cloud-download-95"></i> Export Excel</a> -->
                            </section>
                            <br>
                            <div class="card-text mb-2"><i class="ni ni-book-bookmark"></i>Laporan Pembelian BBM</div>
                            <section class="kendaraan">
                                <a class="btn btn-danger " href="{{ route('kendaraan.pdf') }}" target="_blank"><i class="ni ni-cloud-download-95"></i> Export Pdf</a>
                                <!-- <a class="btn btn-success" href="{{ route('buku.excel') }}" target="_blank"> -->
                                 <!-- <i class="ni ni-cloud-download-95"></i> Export Excel</a> -->
                            </section>
                          </div>
              </div>          
        </div>
    </div>
@endsection