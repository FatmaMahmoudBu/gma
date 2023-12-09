<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'طالب الخدمة',
            'مشرف',
            'عامل'
    ];   
    
    $permissions = Permission::whereHas(
        'roles', function($q){
            $q->where('name', 'عرض خدمة');
        }
        )->get();

        $permissions = Permission::pluck('id','id')->all();
    
    foreach ($roles as $role) {
        
        $role = Role::create(['name' => $role]);
  
        $role->syncPermissions($permissions);
    }
    }
}
