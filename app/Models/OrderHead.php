<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;

class OrderHead extends Model
{
    protected $table    = 'order_head';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_number',
        'user_id',
        'full_name',
        'mobile_number',
        'full_address',
        'post_code',
    ];

    public function order_detail()
    {
        return $this->hasMany('App\Models\OrderDetail','order_id');
    }

    public function order_list($order_number, $full_name, $post_code)
    {
        return OrderHead::OrderBy('created_at','DESC')
                ->Where(function($query) use ($order_number, $full_name, $post_code) {
                    if (isset($order_number) && !empty($order_number)) {
                        $query->where('order_number', 'LIKE', "%".$order_number."%");
                    }
                    if (isset($full_name) && !empty($full_name)) {
                        $query->where('full_name', 'LIKE', "%".$full_name."%");
                    }
                    if (isset($post_code) && !empty($post_code)) {
                        $query->where('post_code', $post_code);
                    }
                })->paginate(10);
    }

}
