<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Role1 = Role::create(['name' => 'admin']);
        $Role2 = Role::create(['name' => 'teacher']);
        $Role2 = Role::create(['name' => 'student']);

        Permission::create(['name' => 'teacher.update']);
        Permission::create(['name' => 'teacher.create']);
        Permission::create(['name' => 'teacher.show']);
        Permission::create(['name' => 'teacher.destroy']);

        Permission::create(['name' => 'subject.update']);
        Permission::create(['name' => 'subject.create']);
        Permission::create(['name' => 'subject.show']);
        Permission::create(['name' => 'subject.destroy']);
        Permission::create(['name' => 'subject.assingteacher']);
        Permission::create(['name' => 'subject.removeteacher']);
    }
}
