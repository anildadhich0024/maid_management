<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::insert([
            'role_title'        => 'ROLE_ADMIN',
        ]);
        Roles::insert([
            'role_title'        => 'ROLE_AGENT',
        ]);
        Roles::insert([
            'role_title'        => 'ROLE_PARTNER',
        ]);
        Roles::insert([
            'role_title'        => 'ROLE_USER',
        ]);
    }
}
