@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="header-body">
                <div class="row">
                    <div class="col-md-6 mt-4 mb-2">
                        <a class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#tambahPegawai"> Tambah pegawai</a>
                    </div>
                    <div class="col-md-6 mt-4 mb-3 d-flex justify-content-end">
                        <!-- Search form -->
                        <form  action="{{ route('pegawai.search') }}" method="get" class="navbar-search navbar-search-light form-inline mr-sm-3 " id="navbar-search-main">
          
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
                                        <th style="min-width: 150px;" scope="col" class="sort" data-sort="nama">Nama</th>
                                            <th style="min-width: 150px;" scope="col" class="sort" data-sort="nip">NIP</th>
                                            <th style="min-width: 150px;" scope="col" class="sort" data-sort="jenis_kelamin">Jenis Kelamin</th>
                                            <th style="min-width: 150px;" scope="col" class="sort" data-sort="Jabatan">Jabatan</th>
                                            <th style="min-width: 150px;" scope="col" class="sort" data-sort="Alamat">Alamat</th>
                                            <th style="min-width: 150px;" scope="col" class="sort" data-sort="Tahun Terbit">Kendaraan Yang Diterima</th>
                                            <th style="min-width: 150px;" scope="col" class="sort" data-sort="Penulis">Action</th>
                                            <th style="min-width: 150px;" scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                    @php
                                     $i = 1;
                                    @endphp
                                        @foreach ($pegawai as $item)
                                            
                                        <tr>
                                        <td>{{ $i++ }}</td>
                                            <th scope="row">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <span class="name mb-0 text-sm">{{ $item->nama }}</span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="budget">
                                                  {{ $item->nip }}
                                                </td>
                                                <td>
                                                    @if ($item->jenis_kelamin == 'pria')
                                                        <span class="badge badge-dot mr-4">
                                                            <i class="bg-primary"></i>
                                                            <span class="status">{{ $item->jenis_kelamin }}</span>
                                                        </span>
                                                    @else 
                                                        <span class="badge badge-dot mr-4">
                                                            <i class="bg-danger"></i>
                                                            <span class="status">{{ $item->jenis_kelamin }}</span>
                                                        </span>
                                                    @endif
                                                    
                                                </td>
                                                <td>
                                                    {{ $item->jabatan }}
                                                </td>
                                               
                                                <td>
                                                    {{ $item->alamat }}
                                                </td>
                                                <td>
                                                    {{ $item->kendaraan->no_polisi}}
                                                </td>
                                                
                
                    
                                                <td class="text-right">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-primary btn-detail" data-target="#detailPegawai" data-toggle="modal" data-id="{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                                    <button type="button" class="btn btn-warning btn-edit" data-toggle="modal" data-target="#editPegawai" data-id="{{ $item->id }}"><i class="fas fa-edit"></i></button>
                                                    <form action="{{ route('pegawai.destroy',$item->id) }}" method="post" id="delete{{ $item->id }}">
                                                        @csrf
                                                        @method('delete')
                                                    <button class="btn btn-danger" type="button" onclick="deletePegawai({{ $item->id }})"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                    
                                    </tbody>
                                  
                                   
                                </table>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer py-4">
                                <nav aria-label="...">
                                    
                                    @if ($pegawai->lastPage() != 1)
                                    <ul class="pagination justify-content-end mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="{{ $pegawai->previousPageUrl() }}" tabindex="-1">
                                                    <i class="fas fa-angle-left"></i>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            @for ($i = 1; $i <= $pegawai->lastPage(); $i++)
                                            <li class="page-item {{ $i == $pegawai->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $pegawai->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $pegawai->nextPageUrl() }}">
                                                    <i class="fas fa-angle-right"></i>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                    </ul> 
                                    @endif
                                    @if (count($pegawai) == 0)     
                                        <div class="text-center" colspan="4"> Tidak ada data!</div>    
                                    @endif       
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>       
@endsection


@section('modal')
     {{-- Modal add Pegawai --}}
     <div class="modal fade" id="tambahPegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pegawai.store') }}" method="post" enctype="multipart/form-data"> 
                        @csrf
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama"  class="form-control" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            
                        </div>
                        <div class="form-group">
                            <label for="">NIP</label>
                            <input type="text"  name="nip"  class="form-control" value="{{ old('nip') }}" autocomplete="off">
                            @error('nip')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>                       
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat"  class="form-control" value="{{ old('alamat') }}">
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <input type="text" name="jabatan"  class="form-control" value="{{ old('jabatan') }}">
                            @error('jabatan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">SK Pemegang</label>
                            <input type="file" name="sk" id="" class="uploads form-control mt-2" value="{{ old('sk') }}">
                            @error('sk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">No HP</label>
                            <input type="number" min="0" name="no_hp"  class="form-control" value="{{ old('no_hp') }}">
                            @error('no_hp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option disabled selected>-- Pilih Jenis Kelamin -- </option>
                               
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                
                            </select>
                            @error('jenis_kelamin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kendaraan</label>
                            <select name="kendaraan_id" class="form-control">
                                <option disabled selected>-- Pilih Kendaraan --</option>
                        @foreach ($kendaraan as $item)
                                <option value="{{ $item->id }}">{{ $item->no_polisi }}</option>
                        @endforeach
                            </select>
                        @error('kendaraan_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>

                <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password"  class="form-control" value="{{ old('password') }}">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="user_id" class="form-control">
                                <option disabled selected>-- Pilih Role --</option>
                                @foreach ($users as $item)
                                <option value="{{ $item->id }}"> {{  $item->level }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
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


     {{-- Modal Detail Pegawai  --}}
     <div class="modal fade" id="detailPegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content  mt-5">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="respons-modaldetail">    
                    
                </div>
            </div>
        </div>
     </div>
     {{-- Modal Edit Pegawai  --}}
     <div class="modal fade" id="editPegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content  mt-5">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="respons-modaledit" >
                   
                </div>
            </div>
        </div>
     </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            console.log($('respons-modaledit'))
            console.log($('respons-modaldetail'))
        });


        //delete pegawai
        function deletePegawai(id){
            Swal.fire({
                title: 'PERINGATAN!',
                text: "Yakin ingin menghapus Pegawai?",
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

            //detail pegawai
            $('.btn-detail').on('click',function(){
                let id = $(this).data('id');
                console.log(id)
                
                $.ajax({
                    // url:`http://localhost:8000/kendaraan/${id}`,
                    url:"{{ route('pegawai.ViewDetail','')}}"+"/"+id,
                    method:'GET',
                    success:function(data){
                        // $('#detailPegawai').find('.modal-body').html(data);
                        // $('#detailPegawai').show();
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