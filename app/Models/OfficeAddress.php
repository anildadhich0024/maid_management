<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DB;

class OfficeAddress extends Model
{
    use SoftDeletes;
    protected $table    = 'office_address';
    protected $primaryKey = 'address_id';

    protected $fillable = [
        'address_title',
        'full_address',
        'iframe_url',
    ];

    protected $dates = [ 'deleted_at' ];

}
