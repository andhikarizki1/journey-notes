<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class CatatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $catatan = [
        //     [
        //         'user_id' => '1',
        //         'lokasi' => 'dfsdf',
        //         'suhutubuh' => 36.2,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ],
        //     [
        //         'user_id' => '1',
        //         'lokasi' => 'gsdgdg',
        //         'suhutubuh' => 37.0,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ],
        //     [
        //         'user_id' => '2',
        //         'lokasi' => 'sdgdgd',
        //         'suhutubuh' => 30.2,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ],
        //     [
        //         'user_id' => '2',
        //         'lokasi' => 'sdgsdg',
        //         'suhutubuh' => 32.0,
        //         'created_at' => Carbon::parse('03/10/2022'),
        //         'updated_at' => Carbon::now()
        //     ],
        //     [
        //         'user_id' => '3',
        //         'lokasi' => 'gsdgsdg',
        //         'suhutubuh' => 31.7,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ],
        //     [
        //         'user_id' => '3',
        //         'lokasi' => 'dsgsdg',
        //         'suhutubuh' => 33.0,
        //         'created_at' => Carbon::parse('03/11/2022'),
        //         'updated_at' => Carbon::now()
        //     ],
        //     [
        //         'user_id' => '4',
        //         'lokasi' => 'sdgsdg',
        //         'suhutubuh' => 33.1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ],
        //     [
        //         'user_id' => '4',
        //         'lokasi' => 'sdgsdg',
        //         'suhutubuh' => 32.5,
        //         'created_at' => Carbon::parse('03/12/2022'),
        //         'updated_at' => Carbon::now()
        //     ],
        // ];

        $catatan = [
            [
                'user_id' => '1',
                'id_prov' => '1',
                'id_kota' => '1',
                'suhutubuh' => 36.2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => '1',
                'id_prov' => '1',
                'id_kota' => '2',
                'suhutubuh' => 37.0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => '2',
                'id_prov' => '2',
                'id_kota' => '1',
                'suhutubuh' => 30.2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => '2',
                'id_prov' => '3',
                'id_kota' => '1',
                'suhutubuh' => 32.0,
                'created_at' => Carbon::parse('03/10/2022'),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => '3',
                'id_prov' => '4',
                'id_kota' => '1',
                'suhutubuh' => 31.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => '3',
                'id_prov' => '4',
                'id_kota' => '2',
                'suhutubuh' => 33.0,
                'created_at' => Carbon::parse('03/11/2022'),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => '4',
                'id_prov' => '5',
                'id_kota' => '1',
                'suhutubuh' => 33.1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => '4',
                'id_prov' => '6',
                'id_kota' => '1',
                'suhutubuh' => 32.5,
                'created_at' => Carbon::parse('03/12/2022'),
                'updated_at' => Carbon::now()
            ],
        ];

        DB::table('catatan')->insert($catatan);
    }
}
