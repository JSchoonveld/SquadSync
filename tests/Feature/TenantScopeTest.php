<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TenantScopeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

//    /** @test */
//    public function a_model_has_a_tenant_id_on_the_migration()
//    {
//        $now = now();
//        $filename = $now->format('Y_m_d_His').'_create_tests_table.php';
//        $filePath = database_path('migrations\\'.$filename);
//
//        $this->artisan('make:model Test -m');
//
//        $this->assertTrue(File::exists($filePath));
//        $this->assertStringContainsString('$table->unsignedBigInteger(\'tenant_id\')->index();', File::get($filePath));
//
//        File::delete($filePath);
//        File::delete(app_path('Models\\Test.php'));
//    }

    /** @test */
    public function a_user_can_only_see_users_in_the_same_tennant()
    {
        $tenant1 = Tenant::factory()->create();
        $tenant2 = Tenant::factory()->create();

        $user1 = User::factory()->create([
            'tenant_id' => $tenant1
        ]);
        User::factory()->count(9)->create([
            'tenant_id' => $tenant1
        ]);

        User::factory()->count(10)->create([
            'tenant_id' => $tenant2
        ]);

        Auth::login($user1);

        $this->assertEquals(10, User::count());
    }

    /** @test */
    public function a_user_can_only_create_a_user_in_his_tenant_even_if_other_tenant_is_provided()
    {
        $tenant1 = Tenant::factory()->create();
        $tenant2 = Tenant::factory()->create();

        $user1 = User::factory()->create([
            'tenant_id' => $tenant1
        ]);

        User::factory()->count(9)->create([
            'tenant_id' => $tenant1
        ]);

        Auth::login($user1);

        $createdUser = User::factory()->make();
        $createdUser->tenant_id = $tenant2->id;
        $createdUser->save();

        $this->assertTrue($createdUser->tenant_id == $user1->tenant_id);
    }
}
