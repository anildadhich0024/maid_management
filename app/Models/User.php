<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Roles;

class User extends Authenticatable
{
    use SoftDeletes;
    use HasFactory, Notifiable;

    protected $table    = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_name',
        'account_id',
        'email_address',
        'nationality_id',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [ 'deleted_at' ];

    public function role_data()
    {
        return $this->hasOneThrough(
            'App\Models\UserRoles',
            'App\Models\Roles',
            'role_id',
            'role_id',
         );
    }


    public function user_role()
    {
        return $this->belongsTo('App\Models\UserRoles','user_id');
    }

    public function user_role_data()
    {
        return $this->hasOne('App\Models\UserRoles','user_id');
    }

    public function user_list($user_role, $user_name)
    {
        return User::with('user_role_data')
                ->whereHas('user_role_data', function($query) use ($user_role) {
                    if (isset($user_role) && !empty($user_role)) {
                        $query->whereIn('role_id',$user_role);
                    }
                })
                ->Where(function($query) use ($user_name) {
                    if (isset($user_name) && !empty($user_name)) {
                        $query->where('user_name', 'LIKE', "%".$user_name."%");
                    }
                })->OrderBy('created_at','DESC')->paginate(10);
    }
}
