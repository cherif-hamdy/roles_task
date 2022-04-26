<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //create permissions
        Permission::firstOrCreate(['name' => 'Post']);
        Permission::firstOrCreate(['name' => 'Category']);
        Permission::firstOrCreate(['name' => 'Comment']);
        Permission::firstOrCreate(['name' => 'User']);
        Permission::firstOrCreate(['name' => 'Product']);
        Permission::firstOrCreate(['name' => 'Course']);

        //create roles
        $role1 = Role::firstOrCreate(['name'=>'Super Admin']);
        $role1->givePermissionTo('Post');
        $role1->givePermissionTo('Category');
        $role1->givePermissionTo('Comment');
        $role1->givePermissionTo('User');
        $role1->givePermissionTo('Product');
        $role1->givePermissionTo('Course');

        $role2 = Role::firstOrCreate(['name'=>'writer']);
        $role2->givePermissionTo('Post');
        $role2->givePermissionTo('Comment');

        $role3 = Role::firstOrCreate(['name'=>'sales']);
        $role3->givePermissionTo('Product');

        $role4 = Role::firstOrCreate(['name'=>'teacher']);
        $role4->givePermissionTo('Course');

        $role5 = Role::firstOrCreate(['name'=>'student']);
        $role5->givePermissionTo('Course');

        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'writer',
            'email' => 'writer@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'sales',
            'email' => 'sales@example.com',
        ]);
        $user->assignRole($role3);


        $user = \App\Models\User::factory()->create([
            'name' => 'teacher',
            'email' => 'teacher@example.com',
        ]);
        $user->assignRole($role4);


        $user = \App\Models\User::factory()->create([
            'name' => 'student',
            'email' => 'student@example.com',
        ]);
        $user->assignRole($role5);
    }
}
