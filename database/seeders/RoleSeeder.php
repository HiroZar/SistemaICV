<?php

namespace Database\Seeders;

use App\Models\User;
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

        Permission::create(['name' => 'subject.index']);
        Permission::create(['name' => 'subject.create']);
        Permission::create(['name' => 'subject.edit']);
        Permission::create(['name' => 'subject.destroy']);
        Permission::create(['name' => 'subject.assingteacher']);
        Permission::create(['name' => 'subject.removeteacher']);

        Permission::create(['name' => 'classroom.list']);
        Permission::create(['name' => 'classroom.create']);
        Permission::create(['name' => 'classroom.edit']);
        Permission::create(['name' => 'classroom.destroy']);

        Permission::create(['name' => 'teacher.index']);
        Permission::create(['name' => 'teacher.create']);
        Permission::create(['name' => 'teacher.edit']);
        Permission::create(['name' => 'teacher.destroy']);
        Permission::create(['name' => 'teacher.show']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());
        $teacher = Role::create(['name' => 'teacher']);
        $teacher->givePermissionTo([
            'teacher.show',
        ]);

        User::find(1)->assignRole('admin');
        User::find(2)->assignRole('teacher');
    }
}
