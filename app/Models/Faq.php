<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DB;

class Faq extends Model
{
    use SoftDeletes;
    protected $table    = 'faq';
    protected $primaryKey = 'faq_id';

    protected $fillable = [
        'faq_question',
        'faq_answer',
    ];

    protected $dates = [ 'deleted_at' ];

}
