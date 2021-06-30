<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DB;

class MiscMst extends Model
{
    use SoftDeletes;
    protected $table    = 'misc_mst';
    protected $primaryKey = 'misc_id';

    protected $fillable = [
        'misc_type',
        'misc_title',
    ];

    protected $dates = [ 'deleted_at' ];

    public function nationality_list($nationality_id)
    {
        return MiscMst::OrderBy('misc_title')
                ->Where(function($query) use ($nationality_id) {
                    if (isset($nationality_id) && !empty($nationality_id)) {
                        $query->where('misc_id',$nationality_id);
                    }
                })->where('misc_type',config('constant.MISC.NATIONALITY'))->get();
    }

}
