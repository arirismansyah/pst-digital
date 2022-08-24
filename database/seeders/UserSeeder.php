<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $super_admin = User::create([
            'name' => 'Super Admin',
            'username' => 'sa_pst_1600',
            'password' => bcrypt('pst1600super'),
        ]);

        $admin_dls = User::create([
            'name' => 'Admin PST',
            'username' => 'admin_pst',
            'password' => bcrypt('pst1600admin'),
        ]);

        $IPDS = User::create([
            'name' => 'User IPDS',
            'username' => 'ipds_1600',
            'password' => bcrypt('pst1600ipds'),
        ]);

        $nerwilis = User::create([
            'name' => 'User Nerwilis',
            'username' => 'nerwilis_1600',
            'password' => bcrypt('pst1600nerwilis'),
        ]);

        $sosial = User::create([
            'name' => 'User Sosial',
            'username' => 'sosial_1600',
            'password' => bcrypt('pst1600sosial'),
        ]);

        $produksi = User::create([
            'name' => 'User Produksi',
            'username' => 'produksi_1600',
            'password' => bcrypt('pst1600produksi'),
        ]);

        $distribusi = User::create([
            'name' => 'User Distribusi',
            'username' => 'distribusi_1600',
            'password' => bcrypt('pst1600distribusi'),
        ]);

        
        $super_admin->assignRole('super_admin');
        $admin_dls->assignRole('admin_pst');


        $IPDS->assignRole('subjectmatter');
        $nerwilis->assignRole('subjectmatter');
        $sosial->assignRole('subjectmatter');
        $produksi->assignRole('subjectmatter');
        $distribusi->assignRole('subjectmatter');
    }
}
