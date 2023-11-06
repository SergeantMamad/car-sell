<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $roles=[
        'admin',
        'user'
       ];
       $Permissions=[
        'create_cars',
        'manage_cars',
        'manage_all',
       ];
       foreach ($Permissions as $permission) {
        Permission::create(['name'=>$permission]);
       }

       foreach($roles as $role){
        Role::create(['name'=>$role]);
       }

       $userPermissions=[
        'create_cars',
        'manage_cars'
       ];

       $userRoles=Role::findByName('user');
       foreach($userPermissions as $userPermission){
        $userRoles->givePermissionTo($userPermission);
       }
    }
}
