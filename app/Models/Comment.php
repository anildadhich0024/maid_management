<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DB;

class Comment extends Model
{
    use SoftDeletes;
    protected $table    = 'comment';
    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'blog_id',
        'full_name',
        'email_address',
        'comment_details',
    ];

    protected $dates = [ 'deleted_at' ];

}
