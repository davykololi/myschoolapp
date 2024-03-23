<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Permission::create(['name' => 'edit articles']);

        $permissions = [
            'create-accountant',
            'edit-accountant',
            'delete-accountant',

            'create-admin',
            'edit-admin',
            'delete-admin',

            'create-librarian',
            'edit-librarian',
            'delete-librarian',

            'create-matron',
            'edit-matron',
            'delete-matron',

            'create-teacher',
            'edit-teacher',
            'delete-teacher',

            'create-staff',
            'edit-staff',
            'delete-staff',

            'create-club',
            'edit-club',
            'delete-club',

            'create-department',
            'edit-department',
            'delete-department',

            'create-dormitory',
            'edit-dormitory',
            'delete-dormitory',

            'create-farm',
            'edit-farm',
            'delete-farm',

            'create-field',
            'edit-field',
            'delete-field',

            'create-hall',
            'edit-hall',
            'delete-hall',

            'create-intake',
            'edit-intake',
            'delete-intake',

            'create-library',
            'edit-library',
            'delete-library',

            'create-class',
            'edit-class',
            'delete-class',

            'create-school',
            'edit-school',
            'delete-school',

            'create-stream',
            'edit-stream',
            'delete-stream',

            'create-subject',
            'edit-subject',
            'delete-subject',

            'create-year',
            'edit-year',
            'delete-year',

            'create-term',
            'edit-term',
            'delete-term',

            'create-assignment',
            'edit-assignment',
            'delete-assignment',

            'create-exam',
            'edit-exam',
            'delete-exam',

            'create-gallery',
            'edit-gallery',
            'delete-gallery',

            'create-meeting',
            'edit-meeting',
            'delete-meeting',

            'create-notes',
            'edit-notes',
            'delete-notes',

            'create-pdf',
            'edit-pdf',
            'delete-pdf',

            'create-award',
            'edit-award',
            'delete-award',

            'create-student',
            'edit-student',
            'delete-student',

            'create-timetable',
            'edit-timetable',
            'delete-timetable'
         ];
 
          // Looping and Inserting Array's Permissions into Permission Table
         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
          }

        $superadminRole = Role::create(['name' => 'superadmin']);
        $adminRole = Role::create(['name' => 'admin']);
        $teacherRole = Role::create(['name' => 'teacher']);
        $parentRole = Role::create(['name' => 'parent']);
        $studentRole = Role::create(['name' => 'student']);
        $accountantRole = Role::create(['name' => 'accountant']);
        $librarianRole = Role::create(['name' => 'librarian']);
        $matronRole = Role::create(['name' => 'matron']);
        $subordinateRole = Role::create(['name' => 'subordinate']);

        // $role->givePermissionTo('edit articles');
    }
}
