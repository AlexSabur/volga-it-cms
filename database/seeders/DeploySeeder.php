<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DeploySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::createAdmin('Admin', 'admin@admin.com', 'password');

        User::first()->update([
            'balance' => 2000
        ]);

        User::forceCreate([
            'name' => 'Test',
            'email' => 'test@test.test',
            'password' => Hash::make('password'),
            'balance' => 2000,
        ]);

        $offer = Offer::create([
            'title' => 'Худи 1',
            'price' => 360,
        ]);

        $offer = Offer::create([
            'title' => 'Худи 2',
            'price' => 500,
        ]);
    }
}
