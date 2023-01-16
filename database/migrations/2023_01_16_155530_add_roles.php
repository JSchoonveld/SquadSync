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
            'create a company',
            'update a company',

            'create a client',
            'update a client',

            'view run information',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        $permissionsByRole = [
            'admin' => [
                'create a company',
                'update a company',
                'assign device',
            ],
            'team_admin' => [
                'create a client',
                'update a client',
                'delete a client'
            ],
            'team_user' => [
                'view run information',
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
