<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'ade', 'email' => 'ade@gmail.com', 'password' => Hash::make('ade')],
            ['name' => 'rozza', 'email' => 'rozza@gmail.com', 'password' => Hash::make('rozza')],
            ['name' => 'erni', 'email' => 'erni@gmail.com', 'password' => Hash::make('erni')],
        ];

        foreach ($items as $item) {
            # code...
            User::create($item);
        }
    }
}
