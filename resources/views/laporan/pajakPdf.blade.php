<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <title>Laporan Pajak</title>
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
    <h4 class="text-center">Laporan Pajak</h4>
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
                    <th>Penanggung Jawab</th>
                    <th>Jenis Kendaraan</th>
                    <th>No Plat</th>
                    <th>Nominal Pajak</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($pajak as $item) 
                <tr>
                    <td>{{ $i++ }}</td>
                    <!-- <td>{{ $item->pegawai->nama }}</td>
                    <td>{{ $item->kendaraan->jenis }}</td>
                    <td>{{ $item->kendaraan->no_polisi }}</td> -->
                    <td>{{ $item->nominal }}</td>
                
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- <p>Petugas: {{ Auth::user()->level }}</p> -->
        <span></span>
    </div>
 
</body>
</html>