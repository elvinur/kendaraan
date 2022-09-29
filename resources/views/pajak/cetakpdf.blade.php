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