<?php

namespace Database\Seeders;

use App\Models\Progress;
use Illuminate\Database\Seeder;

class ProgresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "pending", "process", "done"
        ];
        for ($i = 0; $i < count($data); $i++) {
            Progress::create(
                [
                    'name' => $data[$i]
                ]
            );
        }
    }
}