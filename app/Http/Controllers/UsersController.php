<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Roles;
use App\Models\UserRoles;
use App\Models\MiscMst;
use Auth;
use Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->User = new User;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $record_list    = $this->User->user_list([2,3], $request->user_name);
        $title          = "Sub Admin";
        $data           = compact('title','record_list','request');
        return view('admin_panel.sub_admin_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role_list          = Roles::skip(1)->take(2)->get();
        $nationality        = MiscMst::where('misc_type',config('constant.MISC.NATIONALITY'))->get();
        $title              = "Sub Admin";
        $data               = compact('title','role_list','nationality');
        return view('admin_panel.sub_admin_create', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $record_data        = User::findOrfail(base64_decode($user_id));
        $role_list          = Roles::skip(1)->take(2)->get();
        $nationality        = MiscMst::where('misc_type',config('constant.MISC.NATIONALITY'))->get();
        $title              = "Sub Admin";
        $data               = compact('title','role_list','record_data','nationality');
        return view('admin_panel.sub_admin_create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $user_id = base64_decode($user_id);
        $error_message = 	[
			'user_name.required'        => 'Name should be required',
			'account_id.required'       => 'Account ID should be required',
			'email_address.required'    => 'Email address should be required',
			'nationality_id.required'   => 'All country will not allowed for partner',
            'regex'                     => 'Provide valid email adddress',
            'account_id.unique'         => 'Account ID already exist',
            'email_address.unique'      => 'Email adddress already exist',
            'password.regex'            => 'Password Should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character',
            'min'                       => 'Password minimum lenght should be :min characters'
		];

		$validatedData = $request->validate([
			'user_name' 	    => 'required',
			'account_id' 	    => 'required|unique:users,account_id,'.$user_id.',user_id,deleted_at,NULL',
			'email_address' 	=> 'required|unique:users,email_address,'.$user_id.',user_id,deleted_at,NULL|regex:^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^',
            'password' 	        => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ], $error_message);

        if($request->role_id == 3)
        {
            $validatedData[] = $request->validate([
                'nationality_id'=> 'required',
            ], $error_message);
        }

        try
		{
                
            if($user_id == 0)
            {   
                \DB::beginTransaction();
                    $user = new User();
                    $user->fill($request->all());
                    $user->password = Hash::make($request->password);
                    $user->save();

                    $user_role = new UserRoles;
                    $user_role->role_id = $request->role_id;
                    $user_role->user_id = $user->user_id;
                    $user_role->save();
                \DB::commit();
                return redirect()->route('sub_admin.index')->with('Success','Sub admin created successfully');
            }
            else
            {
                \DB::beginTransaction();
                    $request['password'] = Hash::make($request->password);
                    User::findOrFail($user_id)->update($request->all());
                    UserRoles::where('user_id',$user_id)->update($request->only(['role_id']));
                \DB::commit();
                return redirect()->route('sub_admin.index')->with('Success','Sub admin updated successfully');
            }
        }
        catch (\Throwable $e)
    	{
            \DB::rollback();
            return back()->with('Failed',$e->getMessage())->withInput($request->all());
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        $User->delete();
        return redirect()->route('sub_admin.index')->with('Success','Sub admin deleted successfully');
    }

    public function customer_list(Request $request)
    {
        $record_list    = $this->User->user_list([4], $request->user_name);
        $title          = "Customers";
        $data           = compact('title','record_list','request');
        return view('admin_panel.customer_list', $data);
    }
}
