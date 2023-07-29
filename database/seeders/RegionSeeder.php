<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
           ['id' => 1,
            'region_name' => '日本地図',
            'region_image' => '/css/image/Japan.PNG.',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
           ],
           ['id' => 2,
            'region_name' => '北海道',
            'region_image' => '/css/image/Hokaido.PNG',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
           ],
           ['id' => 3,
            'region_name' => '東北地方',
            'region_image' => '/css/image/Tohoku.PNG',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
           ],
           ['id' => 4,
            'region_name' => '関東地方',
            'region_image' => '/css/image/Kanto.PNG',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
           ],
           ['id' => 5,
            'region_name' => '中部地方',
            'region_image' => '/css/image/Tyubu.PNG',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
           ],
           ['id' => 6,
            'region_name' => '近畿地方',
            'region_image' => '/css/image/Kinki.PNG',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
           ],
           ['id' => 7,
            'region_name' => '中国地方',
            'region_image' => '/css/image/Tyugoku.PNG',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
           ],
           ['id' => 8,
            'region_name' => '四国地方',
            'region_image' => '/css/image/Shikoku.PNG',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
           ],
           ['id' => 9,
            'region_name' => '九州地方',
            'region_image' => '/css/image/Kyusyu/PNG',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
           ],
        ]);
    }
}
