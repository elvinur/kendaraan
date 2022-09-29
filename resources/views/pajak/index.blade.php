@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="header-body">
                <div class="row">
                    <div class="col-md-6 mt-4 mb-2">
                        <a class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#tambahPajak"> Tambah </a>
                    </div>
                    <div class="col-md-6 mt-4 mb-3 d-flex justify-content-end">
                        <!-- Search form -->
                        <form  action="{{ route('pajak.search') }}" method="get" class="navbar-search navbar-search-light form-inline mr-sm-3 " id="navbar-search-main">
          
                          <input type="text" placeholder="masukkan pencarian" class="form-control bg-white" name="q" id="q">
                         <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
              
                      </form>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                       
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="my-3 text-center">{{ $title }}</h3>
                                <div class="success" data-flash="{{ session()->get('success') }}"></div>

                            </div>
                            <!-- Light table -->
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                        <th style="min-width: 100px;" class="table-plus datatable-nosort">No</th>    
                                        <th style="min-width: 150px;" scope="col" class="sort" data-sort="Tanggal">Tanggal</th>
                                        <th style="min-width: 150px;" scope="col" class="sort" data-sort="Penanggung Jawab">Penanggung Jawab</th>
                                        <th style="min-width: 150px;" scope="col" class="sort" data-sort="Jenis Kendaraan">Jenis Kendaraan</th>
                                        <th style="min-width: 150px;" scope="col" class="sort" data-sort="No Plat">No Plat</th>
                                        <th style="min-width: 150px;" scope="col" class="sort" data-sort="Berlaku Sampai">Berlaku Sampai</th>
                                        <th style="min-width: 150px;" scope="col" class="sort" data-sort="Nominal">Nominal</th>
                                        <th style="min-width: 150px;" scope="col" class="sort" data-sort="Nota">Nota</th>
                                        <th style="min-width: 150px;" scope="col" class="sort" data-sort="Aksi">Jumlah</th>
                                        <th style="min-width: 150px;" scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                    @php
                                     $i = 1;
                                    @endphp
                                        @foreach ($pajak as $item)
                                            
                                        <tr>
                                        <td>{{ $i++ }}</td>
                                            <th scope="row">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <span class="name mb-0 text-sm">{{ $item->created_at }}</span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td>
                                                    {{ $item->nama }}
                                                </td>
                                                <td>
                                                  {{ $item->jenis }}
                                                </td>
                                                <td>
                                                    {{ $item->no_polisi }}
                                                </td>
                                                <td>
                                                    {{ $item->tgl_pajak}}
                                                </td>
                                                <td>
                                                    {{ $item->nominal}}
                                                </td>
                                                <td>
                                                    {{ $item->nota}}
                                                </td> 
                                                <td>
                                                    {{ $item->nominal}}
                                                </td>                   
                                                <!-- <td class="text-right">
                                                    <button type="button" class="btn btn-primary btn-detail" data-target="#detailPegawai" data-toggle="modal" data-id="{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                                    <button type="button" class="btn btn-warning btn-edit" data-toggle="modal" data-target="#editPegawai" data-id="{{ $item->id }}"><i class="fas fa-edit"></i></button>
                                                    <form action="{{ route('pegawai.destroy',$item->id) }}" method="post" id="delete{{ $item->id }}">
                                                        @csrf
                                                        @method('delete')
                                                    <button class="btn btn-danger" type="button" onclick="deletePegawai({{ $item->id }})"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td> -->
                                            </tr>
                                            @endforeach
                                    
                                    </tbody>
                                  <tr style="font-weight: bold;">
                                    <td colspan="3">Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $item->nominal}}</td>
                                    
                                   
                                </table>
                            </div>
                            <!-- Card footer -->
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>       
@endsection


@section('modal')
     {{-- Modal add pajak --}}
     <div class="modal fade" id="tambahPajak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah pajak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pajak.store') }}" method="post" enctype="multipart/form-data"> 
                        @csrf
                        <div class="form-group">
                            <label>Nama Pemegang</label>                            
                            <select name="pegawai_id" id="select_pegawai" class="form-control">
                                <option disabled selected>-- Pilih Nama Pemegang --</option>
                                <option value="{{ Auth()->guard('pegawai')->user()->id }}">{{ Auth()->guard('pegawai')->user()->nama }}</option>
                            </select>
                        @error('pegawai_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="">No Plat</label>
                            <input type="text" name="no_polisi" id="select_nopol" class="form-control" value="{{ old('no_polisi') }}" readonly>
                            @error('no_polisi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="hidden" name="kendaraan_id" id="select_edi" class="form-control" value="{{ old('id') }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Berlaku Sampai</label>
                            <input type="text" name="tgl_pajak" id="select_tgl_pajak" class="form-control" value="{{ old('tgl_pajak') }}" readonly>
                            @error('tgl_pajak')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Nota</label>
                            <input type="file" name="nota" id="nota" class="uploads form-control mt-2" value="{{ old('nota') }}">
                            @error('nota')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Nominal</label>
                            <input type="number" min="0" name="nominal" id="nominal"  class="form-control" value="{{ old('nominal') }}">
                            @error('nominal')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                  
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </div> 

@endsection

@push('script')
    <script>

    var elementSelectPegawai = document.getElementById('select_pegawai');
    var elementSelectNopol = document.getElementById('select_nopol');
    var elementSelectPajak = document.getElementById('select_tgl_pajak');
    var elementSelectEdi = document.getElementById('select_edi');
    var elementSelectNama = document.getElementById('select_nama');

    // console.log(elementSelectPegawai);
    elementSelectPegawai.addEventListener('change', function(){
       var value=this.value

       $.ajax({
        type: "get",
        url: "{{route('data.pegawai')}}",
        data: {
            id_pegawai:value
        },
        dataType:"JSON",
        success: function (response) {
            var NoPolisi=response['kendaraan'].no_polisi
            var TglPajak=response['kendaraan'].tgl_pajak
            var Edi=response['kendaraan'].id

            elementSelectNopol.value=NoPolisi
            elementSelectPajak.value=TglPajak
            elementSelectEdi.value=Edi
        
        }
       });
    
    })




        $(document).ready(function(){

            //detail pegawai
            $('.btn-detail').on('click',function(){
                let id = $(this).data('id');
                console.log(id)
                
                $.ajax({
                    url:"{{ route('pegawai.ViewDetail','')}}"+"/"+id,
                    method:'GET',
                    success:function(data){
                        $('#respons-modaldetail').html(data);
                    }
                })
            })

            //edit pegawai
            $('.btn-edit').on('click',function(){
                let id = $(this).data('id');
                console.log(id)
                $.ajax({
                    // url:`http://localhost:8000/kendaraan/${id}/edit`,
                    url:"{{ route('pegawai.ViewUpdate','')}}"+"/"+id,
                    method:'GET',
                    success:function(data){
                        // $('#editKendaraan').find('.modal-body').html(data);
                        // $('#editKendaraan').show();
                        $('#respons-modaledit').html(data);
                    }
                })
            })
            // session delete pegawai 
            let success = $('.success').data('flash');
            if(success){
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: success,
                    showConfirmButton: false,
                    timer: 2000
                })
            }

            //cari pegawai
            let route = "{{ route('pegawai.search') }}" 
       

        })
    </script>
@endpush