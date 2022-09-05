<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UrunlerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            $name = $faker->sentence(1);
            $title = $faker->sentence(9);
            DB::table('urunler')->insert([

                'urunAdi' => $name,
                'image' => $faker->imageUrl(170, 160, 'cats', true, 'Web Project'),
                'urunAdet' => rand(1, 100),
                'urunSeriNo' => rand(1000000, 100000000),
                'urunBarkod' => $faker->imageUrl(210, 51, 'cats', true, 'Web Project'),
                'depo' =>  $faker->randomElement(['depo1', 'depo2', 'depo3', 'depo4']),
                "slug" => Str::slug($title, ''),
                'created_at' => $faker->dateTime('now'),
                'updated_at' => now()
            ]);
        }
    }
}
