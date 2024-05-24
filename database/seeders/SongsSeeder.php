<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SongsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Song::create([
            'title' => 'Prom Queen',
            'artist' => 'Beach Bunny',
            'image_url' => 'https://imgx.sonora.id/crop/0x11:750x494/x/photo/2022/07/27/294805720_419198360174022_489289-20220727091734.jpg',
        ]);

        Song::create([
            'title' => 'Treat You Better',
            'artist' => 'Shawn Mendes',
            'image_url' => 'https://variety.com/wp-content/uploads/2018/08/shawn_mendes_final-2-nu-16x9-2.jpg?w=1000',
        ]);

        Song::create([
            'title' => 'Hey Daddy',
            'artist' => 'Usher',
            'image_url' => 'https://www.famousafricanamericans.org/images/usher.jpg',
        ]);
        
        Song::factory(10)->create();
    }
}
