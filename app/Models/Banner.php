<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DB;

class Banner extends Model
{
    use SoftDeletes;
    protected $table    = 'banner';
    protected $primaryKey = 'banner_id';

    protected $fillable = [
        'line_first',
        'line_second',
        'banner_image',
    ];

    protected $dates = [ 'deleted_at' ];
}
