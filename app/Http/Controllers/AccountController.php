<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserRoles;
use App\Models\Employee;
use App\Models\OrderHead;
use App\Models\OrderDetail;
use App\Models\Password;
use Auth;
use Hash;
use Session;

class AccountController extends Controller
{
    public function register_index()
    {
        if(Auth::check() && Auth::user()->user_role->roles->role_title == 'ROLE_USER')
        {
            return redirect()->route('account.user');
        }
        $title  = "Register";
        $data   = compact('title');
        return view('register', $data);
    }

    public function register_data(Request $request)
    {
        $error_message = 	[
			'user_name.required'        => 'Name should be required',
			'email_address.required'    => 'Email address should be required',
			'password.required'         => 'Password should be required',
			'confirm_password.required' => 'Confirm password should be required',
            'email_address.unique'      => 'Email adddress already exist',
            'email_address.regex'       => 'Provide valid email adddress',
            'password.regex'            => 'Password Should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character',
            'same'                      => 'Confirm password did not matched',
		];

		$validatedData = $request->validate([
			'user_name' 	    => 'required',
			'email_address' 	=> 'required|unique:users,email_address,NULL,deleted_at|regex:^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^',
            'password' 	        => 'required|min:8|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirm_password' 	=> 'required|required_with:password|same:password',
        ], $error_message);

        try
		{
            \DB::beginTransaction();
                $user = new User();
                $user->fill($request->all());
                $user->account_id   = strtoupper(substr($request->user_name,0,2)).'-'.rand(11111,99999);
                $user->password     = Hash::make($request->password);
                $user->save();

                $user_role = new UserRoles;
                $user_role->role_id = 4;
                $user_role->user_id = $user->user_id;
                $user_role->save();
            \DB::commit();
            return redirect()->route('login')->with('Success','Account created successfully');
        }
        catch (\Throwable $e)
    	{
            \DB::rollback();
            return back()->with('Failed',$e->getMessage())->withInput($request->all());
    	}   
    }

    public function login_index()
    {
        if(Auth::check() && Auth::user()->user_role->roles->role_title == 'ROLE_USER')
        {
            return redirect()->route('account.user');
        }
        $title  = "Login";
        $data   = compact('title');
        return view('login', $data);
    }

    public function login_account(Request $request)
    {
        $error_message = 	[
			'email_address.required' 		=> 'Email Address should be required',
			'login_password.required' 	    => 'Password should required',
			'email_address.regex' 			=> 'Provide valid email address',
			'login_password.regex' 			=> 'Provide password in valid format',
		];

		$rules = [
			'email_address' 	=> 'required|regex:^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^',
			'login_password' 	=> 'required|min:8|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
		];

        $this->validate($request, $rules, $error_message);

        try
        {
            if(Auth::attempt(['email_address' => $request->email_address, 'password' => $request->login_password])) 
            {
                return redirect()->route('account.user');    
            }
            return back()->With('Failed', 'Invalid login details')->withInput($request->only(['email_address']));
        }
        catch(\Throwable $e)
        {
            return back()->With('Failed', $e->getMessage());
        }
    }

    public function forgot_password()
    {
        if(Auth::check() && Auth::user()->user_role->roles->role_title == 'ROLE_USER')
        {
            return redirect()->route('account.user');
        }
        $title  = "Forgot Password";
        $data   = compact('title');
        return view('forget_password', $data);
    }

    public function generate_token(Request $request)
    {
        $error_message = 	[
			'required' 		=> 'Email address should be required',
			'regex' 	    => 'Provide valid email address',
		];

		$rules = [
			'email_address' => 'required|regex:^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^',
		];

        $this->validate($request, $rules, $error_message);

        $user_data = User::where('email_address',$request->email_address)->first();
        if(isset($user_data))
        {
            Password::where('email',$request->email_address)->delete();
            $token = str::random(64);
            $password = new Password;
            $password->email        = $request->email_address;
            $password->token        = $token;
            $password->created_at   = Carbon::now();
            $password->save();

            $email_data = ['user_name' => $user_data->user_name, 'token' => $token];
            \Mail::to($user_data->email_address)->send(new \App\Mail\forgot_password($email_data)); 

            return redirect()->route('login')->with('Success', 'Verification link sent on your email');
        }
        return back()->with('Failed', 'We could not found account with that email address')->withInput($request->all());
    }

    public function reset_password($token)
    {
        if(Auth::check() && Auth::user()->user_role->roles->role_title == 'ROLE_USER')
        {
            return redirect()->route('account.user');
        }
        $title  = "Reset Password";
        $data   = compact('title','token');
        return view('reset_password', $data);
    }

    public function reset_password_post(Request $request)
    {
        $error_message = 	[
			'password.required'         => 'Password should be required',
			'confirm_password.required' => 'Confirm password should be required',
            'password.regex'            => 'Password Should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character',
            'same'                      => 'Confirm password did not matched',
		];

		$validatedData = $request->validate([
            'password' 	        => 'required|min:8|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirm_password' 	=> 'required|required_with:password|same:password',
        ], $error_message);

        $token_data = Password::where('token',$request->token)->first();
        if(!isset($token_data))
        {
            return redirect()->route('login')->with('Failed','Invalid token');
        }
        $count_row = User::where('email_address',$token_data->email)->update(['password' => Hash::make($request->password)]);
        Password::where('email',$token_data->email)->delete();
        return redirect()->route('login')->with('Success','Password updated successfully, Please login');
    }

    public function user_account()
    {
        $title  = "Account";
        $data   = compact('title');
        return view('account', $data);
    }

    public function create_cart($emp_id)
    {
        $emp_data = Employee::findOrfail(base64_decode($emp_id));
        $emp_cart = session()->get('emp_cart');
        if(!empty($emp_cart))
        {
            if(array_search($emp_data->emp_id, array_column($emp_cart, 'emp_id')) !== false) 
            {
                return back()->with('Success', 'Helper already shortlisted');
            }
        }
        $cart_arr = array(
            "emp_id" => $emp_data->emp_id,
        );
        session()->push('emp_cart', $cart_arr);
        return back()->with('Success', 'Helper shortlisted successfully');
    }

    public function cart_list()
    {
        $emp_cart   = session::get('emp_cart');
        $title      = "Cart";
        $data       = compact('title','emp_cart');
        return view('cart', $data);
    }

    public function remove_cart_item($key)
    {
        $key        = base64_decode($key);
        $emp_cart   = session()->get('emp_cart');
		unset($emp_cart[$key]);
		session()->put('emp_cart', $emp_cart);
        return back()->with('Success', 'Helper removed successfully');
    }

    public function checkout_list($order_id = false)
    {
        if(empty($order_id))
        {
            $emp_cart   = session::get('emp_cart');
            if(empty($emp_cart))
            {
                return redirect()->route('search.helper');
            }
            $title      = "Checkout";
            $data       = compact('title','emp_cart');
            return view('checkout', $data);
        }
        else
        {
            $order_data = OrderHead::findOrfail(base64_decode($order_id));
            $title      = "Checkout Success";
            $data       = compact('title','order_data');
            return view('checkout_success', $data);
        }
    }

    public function checkout_data(Request $request)
    {
        $error_message = 	[
			'full_name.required'        => 'Full name should be required',
			'mobile_number.required' 	=> 'Mobile number should required',
			'full_address.required' 	=> 'Full address should be required',
			'post_code.required' 		=> 'Post code should be required',
		];

		$rules = [
			'full_name' 	    => 'required',
			'mobile_number' 	=> 'required',
			'full_address' 	    => 'required',
			'post_code' 	    => 'required',
		];

        $this->validate($request, $rules, $error_message);

        try
        {
            \DB::beginTransaction();
                $head = new OrderHead();
                $head->fill($request->all());
                $head->order_number     = rand(1111111111,9999999999);
                $head->user_id          = Auth::user()->user_id;
                $head->save();

                foreach(Session::get('emp_cart') as $rec)
                {
                    $detail = new OrderDetail;
                    $detail->order_id   = $head->order_id;
                    $detail->emp_id     = $rec['emp_id'];
                    $detail->save();
                }
            \DB::commit();
            session()->forget('emp_cart');
            return redirect()->route('checkout',base64_encode($head->order_id));
        }
        catch(\Throwable $e)
        {
            \DB::rollback();
            return back()->With('Failed', $e->getMessage())->withInput($request->all());
        }
    }

    public function booking_data($order_id = false)
    {
        if(empty($order_id))
        {
            $order_data = OrderHead::where('user_id',Auth::user()->user_id)->OrderBy('created_at','DESC')->get();
            $title      = "Bookings List";
            $data       = compact('title','order_data');
            return view('bookings', $data);
        }
        else
        {
            $order_data = OrderHead::findOrfail(base64_decode($order_id));
            $title      = "Book Helper";
            $data       = compact('title','order_data');
            return view('booking_emp', $data);
        }
    }

    public function change_password()
    {
        $title  = "Change Password";
        $data   = compact('title');
        return view('change_password', $data);
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
                return back()->with('Failed','Old password did not matched')->withInput($request->all());
            }

            $request['password'] = Hash::make($request->new_password);
            User::where('user_id',Auth::user()->user_id)->update($request->only(['password']));
            return back()->with('Success','Password changed successfully');
        }
        catch(\Throwable $e)
        {
            return redirect()->back()->With('Failed', $e->getMessage())->withInput($request->all());
        }
    }

    public function logout_user()
    {
        Auth::logout();
        return redirect()->route('login.user')->with('Success', 'Logout successfully');
    }
}
