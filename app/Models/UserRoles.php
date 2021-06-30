<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;

class UserRoles extends Model
{
    protected $table    = 'users_roles';
    protected $primaryKey = 'user_role_id';

    protected $fillable = [
        'role_id',
        'user_id',
    ];

    public function roles() 
    {
        return $this->belongsTo('App\Models\Roles','role_id');
    }
}
