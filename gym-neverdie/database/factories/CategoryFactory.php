<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        $names = ['Basic', 'Premium', 'VIP', 'Student', 'Senior'];
        $prices = [
            'Basic' => $this->faker->numberBetween(100000, 300000), 
            'Premium' => $this->faker->numberBetween(300000, 600000),
            'VIP' => $this->faker->numberBetween(600000, 1000000),
            'Student' => $this->faker->numberBetween(50000, 150000),
            'Senior' => $this->faker->numberBetween(100000, 250000),
        ];

        $categoryName = $this->faker->randomElement($names);

        return [
            'nama' => $categoryName,
            'durasi' => $this->faker->numberBetween(30, 365), // Durasi keanggotaan dalam hari
            'deskripsi' => $this->generateDescription($categoryName),
            'harga' => $prices[$categoryName], // Mengambil harga berdasarkan kategori
        ];
    }
    private function generateDescription($categoryName)
    {
        switch ($categoryName) {
            case 'Basic':
                return 'Keanggotaan dasar untuk akses ke peralatan gym yang penting.';
            case 'Premium':
                return 'Keanggotaan premium untuk akses ke semua peralatan gym, kelas, dan lainnya.';
            case 'VIP':
                return 'Keanggotaan VIP untuk akses tak terbatas ke semua fasilitas gym dan keuntungan eksklusif.';
            case 'Student':
                return 'Keanggotaan diskon untuk pelajar, dengan akses ke semua fasilitas gym.';
            case 'Senior':
                return 'Keanggotaan diskon untuk lansia, dengan akses penuh ke peralatan gym dan kelas.';
            default:
                return $this->faker->sentence; // Deskripsi cadangan jika kategori tidak dikenal
        }
    }
}
