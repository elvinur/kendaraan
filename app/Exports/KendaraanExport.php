<?php

namespace App\Exports;

use App\Kendaraan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KendaraanExport implements FromCollection,WithHeadings
{
    public function headings():array{

        return [
            'No',
            'Merk',
            'Type',
            'Jenis',
            'Model',
            'Tahun Buat',
            'Isi Silinder',
            'No Rangka',
            'No Mesin',
            'Warna',
            'Bahan Bakar',
            'Warna TNKB',
            'Tahun Registrasi',
            'No Plat',
            'Created_at',
            'Updated_at'
        ];
    }
    public function collection()
    {
        return Kendaraan::all();
    }


}
