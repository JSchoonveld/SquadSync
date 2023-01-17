<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissions = [
            'create a tenant',
            'update a tenant',
            'delete a tenant',
            'view a tenant',
            'manage tenant users',

            'create a user',
            'update a user',
            'delete a user',
            'view a user',

            'view team information',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        $permissionsByRole = [
            'admin' => [
                'create a tenant',
                'update a tenant',
                'delete a tenant',
                'view a tenant',
                'manage tenant users',
                'create a user',
                'update a user',
                'delete a user',
                'view a user',
            ],
            'team_admin' => [
                'create a user',
                'update a user',
                'delete a user',
                'view a user',
                'view team information',
            ],
            'team_user' => [
                'view team information',
            ],
        ];

        foreach ($permissionsByRole as $role => $permissions) {
            /** @var \App\Models\Role */
            $role = Role::create(['name' => $role]);

            foreach ($permissions as $permission) {
                $role->givePermissionTo(Permission::firstWhere('name', $permission));
            }
        }
    }
};
