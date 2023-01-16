<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
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
        $user = User::factory()
            ->verified()
            ->create([
                'name' => 'Super admin',
                'email' => 'admin@schoonveld.com',
                'role' => UserTypeEnum::ADMIN()->value
            ]);

    }
}
