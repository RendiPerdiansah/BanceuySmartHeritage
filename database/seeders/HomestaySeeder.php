<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Homestay;

class HomestaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Homestay::create([
            'name' => 'Homestay A',
            'image' => 'https://example.com/image1.jpg', // Ganti dengan URL gambar yang valid
            'description' => 'Homestay A adalah tempat yang nyaman dan dekat dengan alam.',
        ]);

        Homestay::create([
            'name' => 'Homestay B',
            'image' => 'https://example.com/image2.jpg', // Ganti dengan URL gambar yang valid
            'description' => 'Homestay B menawarkan pengalaman budaya yang unik.',
        ]);

        Homestay::create([
            'name' => 'Homestay C',
            'image' => 'https://example.com/image3.jpg', // Ganti dengan URL gambar yang valid
            'description' => 'Homestay C memiliki fasilitas lengkap dan pemandangan yang indah.',
        ]);
    }
}
