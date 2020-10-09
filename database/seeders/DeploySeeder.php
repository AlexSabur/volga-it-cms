<?php

namespace Database\Seeders;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class DeploySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var CreateNewUser $createNewUser */
        $createNewUser = app(CreateNewUser::class);

        User::createAdmin('Admin', 'admin@admin.com', 'password');

        User::first()->update([
            'balance' => 2000
        ]);

        $createNewUser->create([
            'name' => 'Test',
            'email' => 'test@test.test',
            'password' => 'password',
        ]);

        
    }
}
