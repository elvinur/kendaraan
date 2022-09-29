<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <title>Rekap Kendaraan</title>
    <style>
        .text-center{
            text-align: center;
        }
        .container{
           
        }
        .text-right{
            text-align: right;
        }
        .mb{
            margin-bottom: 10px;
        }
        .page-break{
            page-break-after: always;
        }
        
        .pagenum:before{
                content: counter(page);
        }
    
    </style>
</head>
<body>
    <h4 class="text-center">Rekap Data Kendaraan</h4>
    <div class="text-right mb">
        
        <span>Tanggal : {{ date('d-M-Y') }}</span>/
        <span>Jam : {{ date('H:i') }}</span><br>
        Halaman: <span class="pagenum"></span>

    </div>
   
    <div class="container">
        <table border="1" cellspacing="0" cellpadding="15">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Jenis</th>
                    <th>Model</th>
                    <th>Tahun Buat</th>
                    <th>Isi Silinder</th>
                    <th>No Rangka</th>
                    <th>No Mesin</th>
                    <th>Warna</th>
                    <th>Bahan Bakar</th>
                    <th>Warna TNKB</th>
                    <th>Tahun Registrasi</th>
                    <th>No Plat</th>
                    <th>Tanggal Pajak</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($kendaraan as $item) 
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->merk }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->model }}</td>
                    <td>{{ $item->tahun_buat }}</td>
                    <td>{{ $item->isi_silinder }}</td>
                    <td>{{ $item->no_rangka }}</td>
                    <td>{{ $item->no_mesin }}</td>
                    <td>{{ $item->warna }}</td>
                    <td>{{ $item->bahan_bakar }}</td>
                    <td>{{ $item->warna_tnkb }}</td>
                    <td>{{ $item->tahun_reg }}</td>
                    <td>{{ $item->no_polisi }}</td>
                    <td>{{ $item->tgl_pajak }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
       
        <span></span>
    </div>
 
</body>
</html>