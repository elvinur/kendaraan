<?php

namespace App\Exports;

use App\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PegawaiExport implements FromCollection,WithHeadings
{
    public function headings():array{
        
        return[
            'No',
            'Nama',
            'NIP',
            'No HP',
            'Alamat',
            'Jabatan',
            'Jenis Kelamin',
            'Jenis Kendaraan Yang Diterima',
            'No Plat',
            'Created_at',
            'Updated_at',
        ];
    }
    public function collection()
    {
        return Pegawai::get();
    }
}
