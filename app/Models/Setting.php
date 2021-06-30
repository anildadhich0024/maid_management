<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;

class Setting extends Model
{
    protected $table    = 'setting';
    protected $primaryKey = 'setting_id';

    protected $fillable = [
        'mon_fri_open',
        'mon_fri_close',
        'sat_sun_open',
        'sat_sun_close',
    ];

    protected $dates = [ 'deleted_at' ];
}
