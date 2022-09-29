<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <title>Rekap Data Pegawai</title>
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
    <h4 class="text-center">Rekap Data Pegawai</h4>
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
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Jabatan</th>
                    <th>Jenis Kelamin</th>
                    <th>Jenis Kendaraan Yang Diterima</th>
                    <th>No Plat</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($pegawai as $item) 
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->kendaraan->jenis }}</td>
                    <td>{{ $item->kendaraan->no_polisi }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
       
        <span></span>
    </div>
 
</body>
</html>