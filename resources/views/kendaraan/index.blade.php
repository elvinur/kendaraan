@extends('layouts.master')
@section('content')
    <div class="row ">
        <div class="col-md-6 mt-4 mb-2">
            <a class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#tambahKendaraan"> Tambah Kendaraan</a>
        </div>
        <div class="col-md-6 mt-4 mb-3 d-flex justify-content-end">
              <!-- Search form -->
              <form  action="{{ route('kendaraan.search') }}" method="get" class="navbar-search navbar-search-light form-inline mr-sm-3 " id="navbar-search-main">
                <input type="text" placeholder="masukkan pencarian" class="form-control bg-white">
               <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
    
            </form>
        </div>
        <div class="col-md-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="my-3 text-center">{{ $title }}</h3>
                    <div class="success" data-flash="{{ session()->get('success') }}"></div>
                    <div class="hapus" data-flash="{{ session()->get('success') }}"></div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                            <th style="min-width: 100px;" class="table-plus datatable-nosort">No</th>
                                <th style="min-width: 150px;" scope="col" class="sort" data-sort="Nama Pemilik">Nama Pemilik</th>
                                <th style="min-width: 150px;" scope="col" class="sort" data-sort="Jenis">Jenis</th>
                                <th style="min-width: 150px;" scope="col" class="sort" data-sort="No Polisi">No Polisi</th>
                                <th style="min-width: 150px;" scope="col" class="sort" data-sort="Berlaku Sampai">Berlaku Sampai</th>
                                <th style="min-width: 150px;" scope="col" class="sort" data-sort="Gambar">Gambar</th>
                                <th>Action</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
    
                        @php
                            $i = 1;
                        @endphp
                            @foreach ($kendaraan as $item)
                          
                                <tr>
                                <td>{{ $i++ }}</td>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{ $item->nama_pemilik }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="budget">
                                        {{ $item->jenis }}
                                    </td>
                                    <td>
                                        <span class="status">{{ $item->no_polisi }}</span>
                                    </td>
                                    <td>
                                        {{ $item->tgl_pajak }}
                                    </td>
                                    <td>
                                    <img src="{{ asset('storage/'.$item->gambar) }}" width=100px height=100px alt="">
                                    </td>

                                    <td class="text-right">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                <button class="btn btn-primary btn-detail " data-target="#detailKendaraan" data-toggle="modal" data-id="{{ $item->id }}" ><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-warning btn-edit" data-toggle="modal" data-target="#editKendaraan" data-id="{{ $item->id }}"><i class="fas fa-edit"></i></button>

                                                <form action="{{ route('kendaraan.destroy', $item->id) }}" method="post" id="delete{{ $item->id }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="button" onclick="deleteKendaraan({{ $item->id}})"><i class="fas fa-trash"></i></button>
                                                </form>  
                                    </div>     
                                    </td>
                                    <td>
                                </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    <nav aria-label="...">

                        {{-- pagination --}}
                        @if ($kendaraan->lastPage() != 1)
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $kendaraan->previousPageUrl() }}" tabindex="-1">
                                        <i class="fas fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $kendaraan->lastPage(); $i++)
                                    <li class="page-item {{ $i == $kendaraan->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $kendaraan->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item">
                                    <a class="page-link" href="{{ $kendaraan->nextPageUrl() }}">
                                        <i class="fas fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        @endif

                        @if (count($kendaraan) == 0)
                            <div class="text-center"> Tidak ada data!</div>
                        @endif

                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('modal')
     {{-- Modal Tambah Kendaraan --}}
     <div class="modal fade" id="tambahKendaraan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('kendaraan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label for="">Nama Pemilik</label>
                            <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik') }}" class="form-control">
                            @error('nama_pemilik')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control">
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">No Plat/ No Registrasi</label>
                            <input type="text" name="no_polisi" value="{{ old('no_polisi') }}" class="form-control">
                            @error('no_polisi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Merk</label>
                            <input type="text" name="merk" value="{{ old('merk') }}" class="form-control">
                            @error('merk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Type</label>
                            <input type="text" name="type" value="{{ old('type') }}" class="form-control">
                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jenis</label>
                            <input type="text" name="jenis" value="{{ old('jenis') }}" class="form-control">
                            @error('jenis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Model</label>
                            <input type="text" name="model" value="{{ old('model') }}" class="form-control">
                            @error('model')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tahun Pembuatan</label>
                            <input type="text" name="tahun_buat" value="{{ old('tahun_buat') }}" class="form-control">
                            @error('tahun_buat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Isi Silinder/Daya Listrik</label>
                            <input type="text" name="isi_silinder" value="{{ old('isi_silinder') }}" class="form-control">
                            @error('isi_silinder')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Rangka</label>
                            <input type="text" name="no_rangka" value="{{ old('no_rangka') }}" class="form-control">
                            @error('no_rangka')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Mesin</label>
                            <input type="text" name="no_mesin" value="{{ old('no_mesin') }}" class="form-control">
                            @error('no_mesin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Warna</label>
                            <input type="text" name="warna" value="{{ old('warna') }}" class="form-control">
                            @error('warna')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Bahan Bakar</label>
                            <input type="text" name="bahan_bakar" value="{{ old('bahan_bakar') }}" class="form-control">
                            @error('bahan_bakar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Warna TNKB</label>
                            <input type="text" name="warna_tnkb" value="{{ old('warna_tnkb') }}" class="form-control">
                            @error('warna_tnkb')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tahun Registrasi</label>
                            <input type="text" name="tahun_reg" value="{{ old('tahun_reg') }}" class="form-control">
                            @error('tahun_reg')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="">Berlaku Sampai</label>
                            <input type="date" min="0" name="tgl_pajak" value="{{ old('tgl_pajak') }}" class="form-control">
                            @error('tgl_pajak')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
    
                            <img width="150" height="150" />
                            <input type="file" name="gambar" id="" class="uploads form-control mt-2" value="{{ old('gambar') }}">
                            @error('gambar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary ">simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    {{-- Modal Detail Kendaraan  --}}
    <div class="modal fade" id="detailKendaraan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content  mt-5">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="respons-modaldetail">
                
                </div>
            </div>
        </div>
     </div>

        {{-- Modal Edit Kendaraan  --}}
    
        <div class="modal fade" id="editKendaraan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="respons-modaledit">
                
                </div>
            </div>
        </div>
     </div> 

@endsection

@push('script')
    <script> 
    
     $(document).ready(function () {
            console.log($('respons-modaledit'))
            console.log($('respons-modaledit'))
        });
        

        //show gambar
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                return false
            })
        })

        //delete kendaraan
        function deleteKendaraan(id) {
            
            Swal.fire({
                title: 'PERINGATAN!',
                text: "Yakin ingin menghapus Kendaraan?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancle',
            }).then((result) => {
                if (result.value) {
                    $('#delete' + id).submit();
                }
            })
        }

        $(document).ready(function(){

            //detail Kendaraan
            $('.btn-detail').on('click',function(){
                let id = $(this).data('id');
                console.log(id)
                
                $.ajax({
                    // url:`http://localhost:8000/kendaraan/${id}`,
                    url:"{{ route('kendaraan.ViewDetail','')}}"+"/"+id,
                    method:'GET',
                    success:function(data){
                        // $('#detailKendaraan').find('.modal-body').html(data);
                        // $('#detailKendaraan').show();
                        $('#respons-modaldetail').html(data);
                    }
                })
            })

             //edit Kendaraan
             $('.btn-edit').on('click',function(){
                let id = $(this).data('id');
                console.log(id)
                $.ajax({
                    // url:`http://localhost:8000/kendaraan/${id}/edit`,
                    url:"{{ route('kendaraan.ViewUpdate','')}}"+"/"+id,
                    method:'GET',
                    success:function(data){
                        // $('#editKendaraan').find('.modal-body').html(data);
                        // $('#editKendaraan').show();
                        $('#respons-modaledit').html(data);
                    }
                })
            })
            //session flash success 
            let success = $('.success').data('flash');
            if (success) {
                Swal.fire({
                    
                    position: 'center',
                    type: 'success',
                    title: success,
                    showConfirmButton: false,
                    timer: 2000
                })
            }
            //session flash hapus 
            let hapus = $('.hapus').data('flash');
            if (hapus) {
                Swal.fire({
                    
                    position: 'center',
                    type: 'success',
                    title: hapus,
                    showConfirmButton: false,
                    timer: 2000
                })
            }

            //cari pegawai
            let route = "{{ route('pegawai.search') }}" 

        })
    </script>
@endpush
