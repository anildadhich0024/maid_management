<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use DB;

class Employee extends Model
{
    use SoftDeletes;
    protected $table        = 'employee';
    protected $primaryKey   = 'emp_id';

    protected $fillable = [
        'emp_code',
        'mobile_number',
        'emp_type_id',
        'service_id',
        'language_id',
        'full_name',
        'emp_role',
        'emp_dob',
        'birth_place',
        'emp_age',
        'emp_height',
        'emp_weight',
        'religion_title',
        'nationality_id',
        'expected_salary',
        'sibling_no',
        'sibling_age',
        'home_address',
        'airport_name',
        'marital_status',
        'child_count',
        'child_age',
        'education_id',
        'emp_photo',
        'emp_full_photo',
        'any_other_remark',
        'rest_day',
        'fwd_declaration',
        'tel_interview_ea',
        'video_interview_ea',
        'person_interview_ea',
        'observation_interview_ea',
        'tel_interview_tr',
        'video_interview_tr',
        'person_interview_tr',
        'observation_interview_tr',
        'video_link',
        'work_prefrence',
        'allergies_detail',
        'disabilities_detail',
        'dietary_detail',
        'food_handling',
        'food_handling_other',
        'food_type_1',
        'food_type_2',
        'food_type_3',
        'ill_no_1',
        'ill_no_2',
        'ill_no_3',
        'ill_no_4',
        'ill_no_5',
        'ill_no_6',
        'ill_no_7',
        'ill_no_8',
        'ill_no_9',
        'existing_illnesses_other',
        'fdw_no_interview',
        'fdw_tel_interview',
        'fdw_video_interview',
        'fdw_per_interview',
        'other_remark',
        'ea_center',
        'infants_age_sin',
        'cooking_sin',
        'language_sin',
        'other_skill_sin',
        'willing_sin_1',
        'willing_sin_2',
        'willing_sin_3',
        'willing_sin_4',
        'willing_sin_5',
        'willing_sin_7',
        'exp_sin_1',
        'exp_sin_2',
        'exp_sin_3',
        'exp_sin_4',
        'exp_sin_5',
        'exp_sin_6',
        'exp_sin_7',
        'rat_sin_1',
        'rat_sin_2',
        'rat_sin_2',
        'rat_sin_4',
        'rat_sin_5',
        'rat_sin_6',
        'rat_sin_7',
        'infants_age_ea',
        'cooking_ea',
        'language_ea',
        'other_skill_ea',
        'willing_ea_1',
        'willing_ea_2',
        'willing_ea_3',
        'willing_ea_4',
        'willing_ea_5',
        'willing_ea_7',
        'exp_ea_1',
        'exp_ea_2',
        'exp_ea_3',
        'exp_ea_4',
        'exp_ea_5',
        'exp_ea_6',
        'exp_ea_7',
        'rat_ea_1',
        'rat_ea_2',
        'rat_ea_3',
        'rat_ea_4',
        'rat_ea_5',
        'rat_ea_6',
        'rat_ea_7',
        'sing_exp',
        'fdb_emp_1',
        'fdb_dtl_1',
        'fdb_emp_2',
        'fdb_dtl_2',
        'fdb_emp_3',
        'fdb_dtl_3',
        'start_date_1',
        'end_date_1',
        'country_dtl_1',
        'emp_dtl_1',
        'work_dtl_1',
        'remark_dtl_1',
        'start_date_2',
        'end_date_2',
        'country_dtl_2',
        'emp_dtl_2',
        'work_dtl_2',
        'remark_dtl_2',
        'start_date_3',
        'end_date_3',
        'country_dtl_3',
        'emp_dtl_3',
        'work_dtl_3',
        'remark_dtl_3',
    ];

    protected $dates = [ 'deleted_at' ];


    public function country_data()
    {
        return $this->hasOne('App\Models\MiscMst','misc_id','nationality_id');
    }

    public function emp_type_data()
    {
        return $this->hasOne('App\Models\MiscMst','misc_id','emp_type_id');
    }

    public function language_data()
    {
        return $this->hasOne('App\Models\MiscMst','misc_id','language_id');
    }

    public function education_data()
    {
        return $this->hasOne('App\Models\MiscMst','misc_id','education_id');
    }

    public function employee_list($emp_code, $full_name, $nationality_id, $emp_type_id, $order_by)
    {
        return Employee::OrderBy('created_at',$order_by)->OrderBy('full_name')
                ->Where(function($query) use ($emp_code, $full_name, $nationality_id, $emp_type_id) {
                    if (isset($emp_code) && !empty($emp_code)) {
                        $query->where('emp_code', 'LIKE', "%".$emp_code."%");
                    }
                    if (isset($full_name) && !empty($full_name)) {
                        $query->where('full_name', 'LIKE', "%".$full_name."%");
                    }
                    if (isset($nationality_id) && !empty($nationality_id)) {
                        $query->where('nationality_id',$nationality_id);
                    }
                    if (isset($emp_type_id) && !empty($emp_type_id)) {
                        $query->where('emp_type_id',$emp_type_id);
                    }
                })->paginate(10);
    }

    public function helper_list($emp_role, $full_name, $language_id, $emp_type_id, $nationality_id, $education_id, $service_id)
    {
        return Employee::with('country_data','emp_type_data','language_data')->OrderBy('full_name')->whereRaw("find_in_set({$emp_role}, emp_role)")
                ->Where(function($query) use ($full_name, $language_id, $emp_type_id, $nationality_id, $education_id, $service_id) {
                    if (isset($full_name) && !empty($full_name)) {
                        $query->where('full_name', 'LIKE', "%".$full_name."%");
                    }
                    if (isset($education_id) && !empty($education_id)) {
                        $query->where('education_id',$education_id);
                    }
                    if (isset($emp_type_id) && !empty($emp_type_id)) {
                        $query->where('emp_type_id',$emp_type_id);
                    }
                    if (isset($language_id) && !empty($language_id)) {
                        $query->where('language_id',$language_id);
                    }
                    if (isset($nationality_id) && !empty($nationality_id)) {
                        $query->where('nationality_id',$nationality_id);
                    }
                    if (isset($service_id) && !empty($service_id)) {
                        $service_id = explode(',',$service_id);
                        $query->whereIn('service_id',$service_id);
                    }
                })->get();
    }
}
