<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::factory()->create([
            'name' => 'add_users',
            'user_types' => json_encode([UserTypeEnum::ADMIN()->value, UserTypeEnum::TEAM_ADMIN()->value])
        ]);
        Permission::factory()->create([
            'name' => 'view_financials',
            'user_types' => json_encode([UserTypeEnum::ADMIN()->value, UserTypeEnum::TEAM_ADMIN()->value])
        ]);
        Permission::factory()->create([
            'name' => 'manage_team_members',
            'user_types' => json_encode([UserTypeEnum::ADMIN()->value, UserTypeEnum::TEAM_ADMIN()->value])
        ]);
        Permission::factory()->create([
            'name' => 'delete_team_members',
            'user_types' => json_encode([UserTypeEnum::ADMIN()->value, UserTypeEnum::TEAM_ADMIN()->value])
        ]);
        Permission::factory()->create([
            'name' => 'manage_users',
            'user_types' => json_encode([UserTypeEnum::ADMIN()->value])
        ]);
        Permission::factory()->create([
            'name' => 'delete_users',
            'user_types' => json_encode([UserTypeEnum::ADMIN()->value])
        ]);
    }
}
