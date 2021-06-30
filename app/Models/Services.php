<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DB;

class Services extends Model
{
    use SoftDeletes;
    protected $table    = 'services';
    protected $primaryKey = 'services_id';

    protected $fillable = [
        'services_title',
        'services_detail',
        'services_photo',
    ];

    protected $dates = [ 'deleted_at' ];

}
