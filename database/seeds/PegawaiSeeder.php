<?php

use App\Pegawai;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::insert([

            [
                'nama' => 'Rudi Hartanto',
                'nim' => '0123456',
                'no_hp' => '03947484',
                'tgl_lahir' => '1994-08-01',
                'jurusan' => 'Teknik Kimia',
                'jenis_kelamin' => 'pria',
                'user_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'nama' => 'Riska Miralda',
                'nim' => '0234578',
                'no_hp' => '081234567',
                'tgl_lahir' => '1997-02-11',
                'jurusan' => 'Teknik Elektro',
                'jenis_kelamin' => 'wanita',
                'user_id' => 1,
                'created_at' => Carbon::now()

            ]

        ]);
    }
}
