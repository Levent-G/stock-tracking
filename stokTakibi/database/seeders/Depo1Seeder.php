<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Depo1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Insert('INSERT INTO depo1 (urunAdi,image,urunAdet,urunSeriNo,urunBarkod,depo,slug)SELECT urunAdi, image, urunAdet,urunSeriNo,urunBarkod,depo,slug
        FROM urunler');
    }
}
