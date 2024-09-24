<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "kerusakan", "bocor", "pecah"
        ];
        for ($i = 0; $i < count($data); $i++) {
            Category::create(
                [
                    'name' => $data[$i]
                ]
            );
        }
    }
}