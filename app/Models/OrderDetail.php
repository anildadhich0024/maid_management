<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;

class OrderDetail extends Model
{
    protected $table    = 'order_detail';
    protected $primaryKey = 'detail_id';

    protected $fillable = [
        'order_id',
        'emp_id',
    ];

    public function emp_data()
    {
        return $this->belongsTo('App\Models\Employee','emp_id');
    }

}
