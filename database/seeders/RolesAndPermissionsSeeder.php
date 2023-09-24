<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // Create permissions
    Permission::create([ 'name' => 'do everything']);
    Permission::create([  'name' => 'create post']);
    Permission::create([  'name' => 'edit post']);
    Permission::create([  'name' => 'see post']);
    Permission::create([  'name' => 'delete post']);
    Permission::create([  'name' => 'use API']);

    // Create roles and associate permissions
    Role::create([ 'name' => 'Admin'])
    ->givePermissionTo(['do everything']);


    Role::create([ 'name' => 'Trader'])
        ->givePermissionTo(['create post', 'edit post', 'see post', 'delete post']);
    Role::create([ 'name' => 'API-User'])
        ->givePermissionTo(['use API']);

   
}

}
