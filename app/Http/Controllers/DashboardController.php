<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRoles;
use App\Models\Employee;
use App\Models\OrderHead;
use Hash;
use Auth;

class DashboardController extends Controller
{

    public function dashboard()
    {

        $count_maid                 = Employee::where('emp_role',config('constant.EMP_ROLE.Maid'))->count();
        $count_caregivers           = Employee::where('emp_role',config('constant.EMP_ROLE.Caregivers'))->count();
        $count_customer             = UserRoles::where('role_id',4)->count();
        $count_admin                = UserRoles::whereIn('role_id',[2,3])->count();
        
        $count_maid_current         = Employee::where('emp_role',config('constant.EMP_ROLE.Maid'))->whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->count();
        $count_caregivers_current   = Employee::where('emp_role',config('constant.EMP_ROLE.Caregivers'))->whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->count();
        $count_customer_current     = UserRoles::where('role_id',4)->whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->count();
        $count_admin_current        = UserRoles::whereIn('role_id',[2,3])->whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->count();

        $maid_list                  = Employee::with('country_data')->where('emp_role',config('constant.EMP_ROLE.Maid'))->take(5)->OrderBy('created_at','DESC')->get();
        $caregivers_list            = Employee::with('country_data')->where('emp_role',config('constant.EMP_ROLE.Caregivers'))->take(5)->OrderBy('created_at','DESC')->get();

        $ord_list                   = OrderHead::take(5)->OrderBy('created_at','DESC')->get();
        $title  = "Dashboard";
        $data   = compact('title','count_maid','count_caregivers','count_customer','count_admin','count_maid_current','count_caregivers_current','count_customer_current','count_admin_current','maid_list','caregivers_list','ord_list');
        return view('admin_panel.dashboard', $data);
    }

    public function change_password()
    {
        $title  = "Change Password";
        $data   = compact('title');
        return view('admin_panel.change_password', $data);
    }

    public function save_password(Request $request)
    {
        $error_message = 	[
			'login_password.regex' 			=> 'Provide password in valid format',
			'new_password.regex' 			=> 'Provide password in valid format',
			'confirm_password.regex' 		=> 'Provide password in valid format',
            'min'                           => 'Password length minimum 8',
            'same'                          => 'Confirm password should be same as new password',
            'different'                     => 'New password should not be same as old password'
		];

		$rules = [
			'login_password' 	=> 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
			'new_password' 	    => 'required|min:8|different:login_password|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
			'confirm_password' 	=> 'required|min:8|required_with:new_password|same:new_password|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
		];

        $this->validate($request, $rules, $error_message);

        try
        {
            if(!Hash::check($request->login_password, Auth::user()->password))
            {
                return redirect()->route('change.password')->with('Failed','Old password did not matched')->withInput();
            }

            $request['password'] = Hash::make($request->new_password);
            User::where('user_id',Auth::user()->user_id)->update($request->only(['password']));
            return redirect()->route('change.password')->with('Success','Password changed successfully');
        }
        catch(\Throwable $e)
        {
            return redirect()->back()->With('Failed', $e->getMessage())->withInput();
        }
    }

    public function logout_admin()
    {
        Auth::logout();
        return redirect('control_panel')->with('Success', 'Logout successfully');
    }
}
