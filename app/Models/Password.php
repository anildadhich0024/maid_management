<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;

class Password extends Model
{
    protected $table    = 'password_resets';
    public $timestamps  = false;
}
