<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abilities = [
            'read',
            'write',
            'create',
            'delete',
        ];

        $permissions_by_role = [
            'administrator' => [
                'user management',
                'nomor surat',
                'pok',
                'kegiatan',
                'perjadin',
                'pegawai',
                'mitra',
            ],
            'kepala' => [
                'nomor surat',
                'pok',
                'kegiatan',
                'perjadin',
                'pegawai',
                'mitra',
            ],
            'ketua tim' => [
                'nomor surat',
                'pok',
                'kegiatan',
                'perjadin',
                'mitra',
            ],
            'pegawai' => [
                'nomor surat',
                'kegiatan',
                'perjadin',
            ],
            'ppk' => [],
            // 'trial' => [],
        ];

        // membuat semua permission
        foreach ($permissions_by_role['administrator'] as $permission) {
            foreach ($abilities as $ability) {
                Permission::updateOrCreate(['name' => $ability . ' ' . $permission]);
            }
        }

        // assign permission ke setiap role
        foreach ($permissions_by_role as $role => $permissions) {
            $full_permissions_list = [];
            foreach ($abilities as $ability) {
                foreach ($permissions as $permission) {
                    $full_permissions_list[] = $ability . ' ' . $permission;
                }
            }
            Role::updateOrCreate(['name' => $role])->syncPermissions($full_permissions_list);
        }

        User::find(1)->assignRole('administrator');
        User::find(2)->assignRole('ketua tim');
        // User::find(4)->assignRole('trial');
        $users = User::all();
        foreach ($users as $user) {
            $user->assignRole('pegawai');
        }
    }
}
