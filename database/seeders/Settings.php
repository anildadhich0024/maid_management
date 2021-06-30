<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class Settings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            'mon_fri_open'          => '10:00:00',
            'mon_fri_close'         => '10:00:00',
            'sat_sun_open'          => '10:00:00',
            'sat_sun_close'         => '10:00:00',
        ]);
    }
}
