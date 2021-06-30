<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Employee;
use App\Models\MiscMst;
use Auth;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->Employee = new Employee;
        $this->MiscMst  = new MiscMst;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nationality_id = Auth::user()->nationality_id;
        $nationality    = $this->MiscMst->nationality_list($nationality_id);
        $nationality_id = Auth::user()->user_role->roles->role_title == 'ROLE_ADMIN' ? $request->nationality_id : $nationality_id;
        $emp_type       = MiscMst::where('misc_type',config('constant.MISC.EMP_TYPE'))->OrderBy('misc_title')->get();
        $order_by       = !isset($request->order_by) || $request->order_by == 'ASC' ? 'ASC' : 'DESC';
        $record_list    = $this->Employee->employee_list($request->emp_code, $request->full_name, $nationality_id, $request->emp_type_id, $order_by);
        $title          = "Maid / Caregivers";
        $data           = compact('title','nationality','emp_type','record_list','request');
        return view('admin_panel.employee_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationality_id     = Auth::user()->nationality_id;
        $education          = MiscMst::where('misc_type',config('constant.MISC.EDUCATION'))->OrderBy('misc_title')->get();
        $emp_type           = MiscMst::where('misc_type',config('constant.MISC.EMP_TYPE'))->OrderBy('misc_title')->get();
        $language           = MiscMst::where('misc_type',config('constant.MISC.LANGUAGE'))->OrderBy('misc_title')->get();
        $nationality        = $this->MiscMst->nationality_list($nationality_id);
        $services           = MiscMst::where('misc_type',config('constant.MISC.SERVICES'))->OrderBy('misc_title')->get();
        $work               = MiscMst::where('misc_type',config('constant.MISC.WORK'))->OrderBy('misc_title')->get();
        $title              = "Maid / Caregivers";
        $data               = compact('title','education','emp_type','language','nationality','services','work');
        return view('admin_panel.employee_create', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($emp_id)
    {
        if(Auth::user()->user_role->roles->role_title != 'ROLE_ADMIN')
        {
            return back()->with('Failed','You are not authorized to upload new data');
        }

        $record_data        = Employee::findOrfail(base64_decode($emp_id));
        $nationality_id     = Auth::user()->nationality_id;
        $education          = MiscMst::where('misc_type',config('constant.MISC.EDUCATION'))->OrderBy('misc_title')->get();
        $emp_type           = MiscMst::where('misc_type',config('constant.MISC.EMP_TYPE'))->OrderBy('misc_title')->get();
        $language           = MiscMst::where('misc_type',config('constant.MISC.LANGUAGE'))->OrderBy('misc_title')->get();
        $nationality        = $this->MiscMst->nationality_list($nationality_id);
        $services           = MiscMst::where('misc_type',config('constant.MISC.SERVICES'))->OrderBy('misc_title')->get();
        $work               = MiscMst::where('misc_type',config('constant.MISC.WORK'))->OrderBy('misc_title')->get();
        $title              = "Maid / Caregivers";
        $data               = compact('title','education','emp_type','language','nationality','services','record_data','work');
        return view('admin_panel.employee_create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $emp_id)
    {
        $emp_id = base64_decode($emp_id);
        $error_message = 	[
			'full_name.required'        => 'Full name should be required',
			'emp_code.required'         => 'Worker code should be required',
			'emp_role.required'         => 'Employee role should be required',
			'emp_dob.required'          => 'DOB should be required',
			'emp_type_id.required'      => 'Employee type should be required',
			'service_id.required'       => 'Services should be required',
			'religion_title.required'   => 'Religion Title should be required',
			'language_id.required'      => 'Language should be required',
			'birth_place.required'      => 'Birth Place should be required',
			'emp_age.required'          => 'Age should be required',
			'emp_height.required'       => 'Height should be required',
			'emp_weight.required'       => 'Weight should be required',
			'home_address.required'     => 'Address should be required',
			'nationality_id.required'   => 'Nationality should be required',
			'expected_salary.required'  => 'Expected Salary should be required',
			'video_link.required'       => 'Video URL should be required',
			'emp_file.required'         => 'Profile photo should be required',
			'emp_full_file.required'    => 'Full photo should be required',
			'rest_days_name.required'   => 'Rest day in week should be required',
			'education_id.required'     => 'Education should be required',
			'marital_status.required'   => 'Marital Status should be required',
			'airport_name.required'     => 'Airport Name should be required',
            'mimes'                     => 'Image should be jpg, jpeg, png',
            'emp_file.max'             => 'Profile image size max 2MB',
            'emp_full_file.max'        => 'Full image size max 2MB',
		];

		$validatedData = $request->validate([
			'full_name' 	    => 'required',
			'emp_role' 	        => 'required',
			'emp_dob' 	        => 'required',
			'emp_type_id' 	    => 'required',
			'service_id' 	    => 'required',
			'language_id' 	    => 'required',
			'religion_title' 	=> 'required',
			'birth_place' 	    => 'required',
			'emp_age' 	        => 'required',
			'emp_height' 	    => 'required',
			'emp_weight' 	    => 'required',
			'home_address' 	    => 'required',
			'nationality_id' 	=> 'required',
			'expected_salary' 	=> 'required',
			'education_id' 	    => 'required',
			'marital_status' 	=> 'required',
			'airport_name' 	    => 'required',
        ], $error_message);


        if($emp_id != 0)
        {
            $validatedData[] = $request->validate([
                'emp_file' 	    => 'mimes:jpeg,jpg,png|max:2048',
                'emp_full_file' => 'mimes:jpeg,jpg,png|max:2048',
            ], $error_message);
        }
        else
        {
            $validatedData[] = $request->validate([
                'emp_file' 	    => 'required|mimes:jpeg,jpg,png|max:2048',
                'emp_full_file' => 'required|mimes:jpeg,jpg,png|max:2048',
            ], $error_message);
        }

        try
		{
            if(!empty($request->file('emp_file')))
            {
                $imageName = time().'_'.rand(1111,9999).'.'.$request->file('emp_file')->getClientOriginalExtension();  
                $request->file('emp_file')->storeAs('employee_photo', $imageName, 'public');
            }

            if(!empty($request->file('emp_full_file')))
            {
                $fullimageName = time().'_'.rand(1111,9999).'.'.$request->file('emp_full_file')->getClientOriginalExtension();  
                $request->file('emp_full_file')->storeAs('employee_photo', $fullimageName, 'public');
            }
                
            if($emp_id == 0)
            {
                
                \DB::beginTransaction();
                    $employee = new Employee();
                    $employee->fill($request->all());
                    $employee->emp_photo          = $imageName;
                    $employee->emp_full_photo     = $fullimageName;
                    $employee->work_prefrence     = !empty($request->work_prefrence) ? implode(',',$request->work_prefrence) : NULL;
                    $employee->emp_role           = !empty($request->emp_role) ? implode(',',$request->emp_role) : NULL;
                    $employee->service_id         = !empty($request->service_id) ? implode(',',$request->service_id) : NULL;
                    $employee->save();
                \DB::commit();
                return redirect()->route('employee.index')->with('Success','Employee created successfully');
            }
            else
            {
                \DB::beginTransaction();
                    if(!empty($imageName))
                    {
                        if(Storage::disk('public')->exists('employee_photo/'.$request->employee_img_name))
                        {
                            Storage::disk('public')->delete('employee_photo/'.$request->employee_img_name); 
                        }
                        $request['emp_photo'] = $imageName;
                    }
                    if(!empty($fullimageName))
                    {
                        if(Storage::disk('public')->exists('employee_photo/'.$request->employee_full_img_name))
                        {
                            Storage::disk('public')->delete('employee_photo/'.$request->employee_full_img_name); 
                        }
                        $request['emp_full_photo'] = $fullimageName;
                    }
                    $request['work_prefrence']      = !empty($request->work_prefrence) ? implode(',',$request->work_prefrence) : NULL;
                    $request['emp_role']            = !empty($request->emp_role) ? implode(',',$request->emp_role) : NULL;
                    $request['service_id']          = !empty($request->service_id) ? implode(',',$request->service_id) : NULL;
                    Employee::findOrFail($emp_id)->update($request->all());
                \DB::commit();
                return redirect()->route('employee.index')->with('Success','Employee updated successfully');
            }
        }
        catch (\Throwable $e)
    	{
            \DB::rollback();
            return back()->with('Failed',$e->getMessage())->withInput();
    	}
    }

    public function show($emp_id)
    {
        $emp_data   = Employee::findOrfail(base64_decode($emp_id));
        $work       = MiscMst::where('misc_type',config('constant.MISC.WORK'))->OrderBy('misc_title')->get();
        return view('helper_profile',compact('emp_data','work'));
        // $pdf        = PDF::loadView('helper_profile', compact('emp_data'));
        // return $pdf->download('helper_profile.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($emp_id)
    {
        if(Auth::user()->user_role->roles->role_title != 'ROLE_ADMIN')
        {
            return back()->with('Failed','You are not authorized to delete record');
        }

        Employee::findOrfail(base64_decode($emp_id))->delete();
        return redirect()->route('employee.index')->with('Success','Employee deleted successfully');
    }

    public function search_helper(Request $request)
    {
        $role = base64_decode($request->role);
        if(!in_array($role,[config('constant.EMP_ROLE.Maid'),config('constant.EMP_ROLE.Caregivers')]))
        {
            return redirect('helper?role='.base64_encode(config('constant.EMP_ROLE.Maid')));
        }

        $education          = MiscMst::where('misc_type',config('constant.MISC.EDUCATION'))->get();
        $emp_type           = MiscMst::where('misc_type',config('constant.MISC.EMP_TYPE'))->get();
        $language           = MiscMst::where('misc_type',config('constant.MISC.LANGUAGE'))->get();
        $nationality        = MiscMst::where('misc_type',config('constant.MISC.NATIONALITY'))->get();
        $services           = MiscMst::where('misc_type',config('constant.MISC.SERVICES'))->get();     
        $service_id         = (isset($request->service) && !empty($request->service)) ? implode(',',$request->service) : '';
        $helper_list        = $this->Employee->helper_list($role, $request->name, $request->language, $request->emp_type, $request->nationality, $request->education, $service_id);
        $title              = "Helper Search";
        $data               = compact('title','education','emp_type','language','nationality','services','helper_list','request','service_id');
        return view('helper', $data);
    }

    public function helper_profile($emp_id)
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        $record = Employee::with('country_data','emp_type_data','language_data')->findOrfail(base64_decode($emp_id));
        $title  = $record->full_name." Profile";
        $data   = compact('title','record');
        return view('helper-profile', $data);
    }

    public function delete_pic($emp_id)
    {
        $emp_data = Employee::findOrfail(base64_decode($emp_id));
        if(Storage::disk('public')->exists('employee_photo/'.$emp_data->emp_full_photo))
        {
            Storage::disk('public')->delete('employee_photo/'.$emp_data->emp_full_photo); 
            Employee::findOrfail(base64_decode($emp_id))->update(array('emp_full_photo' => NULL));
        }
        return back()->with('Success','Employee full image deleted successfully');
    }
}
