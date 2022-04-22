<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name'=>'show posts']);
        Permission::create(['name'=>'add posts']);
        Permission::create(['name'=>'edit posts']);
        Permission::create(['name'=>'delete posts']);
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('edit articles');
    }
}
