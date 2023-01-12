<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Tenant;
use App\Models\User;
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
        $tenants = Tenant::factory()->count(10)->create();

        foreach ($tenants as $tenant) {
            $users = User::factory()->count(rand(5, 8))->create([
                'tenant_id' => $tenant->id,
            ]);

            foreach ($users as $user) {
                Message::factory()->count(3)->create(
                    [
                        'tenant_id' => $tenant->id,
                        'sender_id' => $user->id,
                        'recipient_id' => $users->random()->id,
                    ]);
            }
        }
    }
}
