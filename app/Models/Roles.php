<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;

class Roles extends Model
{
    protected $table    = 'roles';
    protected $primaryKey = 'role_id';
}
