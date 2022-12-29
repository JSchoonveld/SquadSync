<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = Tenant::factory()->count(20)->create();

        foreach ($tenants as $tenant) {
            User::factory()->count(rand(5,10))->create([
                'tenant_id' => $tenant->id
            ]);
        }
    }
}
