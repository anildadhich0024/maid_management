<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'user_name'       => 'Super Admin',
            'account_id'      => 'MMSDATA-ADM',
            'email_address'   => 'admin@maid.com',
            'password'        => Hash::make('Anil#123!'),
        ]);
        User::insert([
            'user_name'       => 'Agent SLA',
            'account_id'      => 'MMS-SLA',
            'email_address'   => 'agent_sla@maid.com',
            'password'        => Hash::make('Anil#123!'),
        ]);
        User::insert([
            'user_name'       => 'Agent LLA',
            'account_id'      => 'MMS-LLA',
            'email_address'   => 'agent_lla@maid.com',
            'password'        => Hash::make('Anil#123!'),
        ]);
        User::insert([
            'user_name'       => 'Agent LC',
            'account_id'      => 'MMS-LC',
            'email_address'   => 'agent_lc@maid.com',
            'password'        => Hash::make('Anil#123!'),
        ]);
        User::insert([
            'user_name'       => 'Agent FN',
            'account_id'      => 'MMS-FN',
            'email_address'   => 'agent_fn@maid.com',
            'password'        => Hash::make('Anil#123!'),
        ]);
        User::insert([
            'user_name'       => 'Agent BC',
            'account_id'      => 'MMS-BC',
            'email_address'   => 'agent_bc@maid.com',
            'password'        => Hash::make('Anil#123!'),
        ]);
        User::insert([
            'user_name'       => 'Agent EMI',
            'account_id'      => 'MMS-EMI',
            'email_address'   => 'agent_emi@maid.com',
            'password'        => Hash::make('Anil#123!'),
        ]);
        User::insert([
            'user_name'       => 'Partner PH',
            'account_id'      => 'MMS-PH',
            'email_address'   => 'partner_ph@maid.com',
            'nationality_id'  => 18,
            'password'        => Hash::make('Anil#123!'),
        ]);
        User::insert([
            'user_name'       => 'Partner ID',
            'account_id'      => 'MMS-ID',
            'email_address'   => 'partner_id@maid.com',
            'nationality_id'  => 17,
            'password'        => Hash::make('Anil#123!'),
        ]);
        User::insert([
            'user_name'       => 'Partner MY',
            'account_id'      => 'MMS-MY',
            'email_address'   => 'partner_my@maid.com',
            'nationality_id'  => 19,
            'password'        => Hash::make('Anil#123!'),
        ]);
    }
}
