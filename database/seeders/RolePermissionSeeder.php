<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view_dashboard_semua_ssr',
            'view_dashboard_ssr',
            'menu_verifikasi_ssr',
            'menu_tambah_fasyankes',
            'menu_tambah_kader',

        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate([
                'name' => $perm
            ]);
        }

        $ssrRole = Role::firstOrCreate([
            'name' => 'ssr'
        ]);

        $ssrPermissions = [
            'view_dashboard_ssr',
            'menu_tambah_kader',
        ];

        $ssrRole->syncPermissions($ssrPermissions);

        $srRole = Role::firstOrCreate([
            'name' => 'sr'
        ]);

        $user = User::where('name', 'sr')->first();

        $ssrUsers = User::where('name', '!=', 'sr')->get();


        foreach ($ssrUsers as $ssrUser) {
            $ssrUser->assignRole($ssrRole);
        }
        $user->assignRole($srRole);
    }
}
