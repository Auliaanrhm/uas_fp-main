<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::create([
            'position' => 'Web Developer Fullstack',
            'description' => 'Developing our company website, fullstack developer',
            'image' => 'PRRgzDcujuh94yoP8tstS7BwzWlWlBO5Usf4t87W.png',
        ]);
        Job::create([
            'position' => 'Sales',
            'description' => 'Menawarkan barang atau jasa produksi perusahaan kepada konsumen. Menjelaskan spesifikasi produk yang dijual kepada konsumen.',
            'image' => 'lv8nVKQvnmu7CDw2jJVzBHmv50hv4uCbtpp9s8Wi.png',
        ]);
        Job::create([
            'position' => 'Fashion Photographer',
            'description' => 'Melakukan jobdesc fotografi terkait fashion untuk keperluan pengiklanan, katalog dan majalah fashion.',
            'image' => 'uTdmnZigFDZ2BtD2s0vJ4WeqBBuOAzboV8DQeggd.png',
        ]);
        Job::create([
            'position' => 'Stylist',
            'description' => 'Merancang konsep dan desain pakaian mengikuti model terkini sesuai perkembangan tren fashion.',
            'image' => 'd5NN9EjaIyfbI6PW40NMkZgSzmur5r2EVAngsJW1.png',
        ]);
        Job::create([
            'position' => 'Editor',
            'description' => 'Bertanggung jawab terhadap keseluruhan fungsi penyuntingan (editing) pada suatu naskah di perusahaan penerbitan maupun media fashion',
            'image' => 'yT3jX6uTmKN8jM6PbQdFna0nUQQEqfQmpDvnolkN.png',
        ]);
    }
}
?>
