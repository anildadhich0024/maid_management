<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Password;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\Banner;
use Auth;

class HomeController extends Controller
{
    public function home_index()
    {
        $testimonial    = Testimonial::OrderBy('created_at','DESC')->get();
        $faq            = Faq::take(5)->get();
        $banner         = Banner::get();
        $blog_home      = Blog::where('blog_type',config('constant.BLOG_TYPE.Home'))->OrderBy('created_at','DESC')->get();
        $blog_covid     = Blog::where('blog_type',config('constant.BLOG_TYPE.COVID-19'))->OrderBy('created_at','DESC')->get();
        $blog_record    = Blog::OrderBy('created_at','DESC')->first();
        $title          = "Home";
        $data           = compact('title','testimonial','faq','blog_home','blog_covid','blog_record','banner');
        return view('home', $data);
    }

    public function login_index()
    {
        if(Auth::check()) :
            return redirect()->route('dashboard');
        else :
            $title  = "Login Account";
            $data   = compact('title');
            return view('admin_panel.login', $data);
        endif;
    }

    public function login_user(Request $request)
    {
        $error_message = 	[
			'account_id.required' 		    => 'Account id should be required',
			'password.required' 	        => 'Password required',
			'login_password.regex' 			=> 'Provide password in valid format',
		];

		$rules = [
			'account_id' 	    => 'required',
			'login_password' 	=> 'required|min:8|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
		];

        $this->validate($request, $rules, $error_message);

        try
        {
            if(Auth::attempt(['account_id' => $request->account_id, 'password' => $request->login_password]))
            {
                return redirect()->route('dashboard');
            }
            return redirect()->back()->With('Failed', 'Invalid login details')->withInput($request->only(['account_id']));
        }
        catch(\Throwable $e)
        {
            return redirect()->back()->With('Failed', $e->getMessage());
        }
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

        $count_rec = User::where('email_address',$request->email_address)->count();
        if($count_rec > 0)
        {
            $password = new Password;
            $password->email        = $request->email_address;
            $password->token        = str::random(64);
            $password->created_at   = Carbon::now();
            $password->save();
            return redirect('control_panel')->with('Success', 'Verifaction link sent on your email');
        }
        return back()->with('Failed', 'We could not found account with that email address')->withInput();
    }

    public function forgot_password()
    {
        $title  = "Forgot Password";
        $data   = compact('title');
        return view('admin_panel.forget_password', $data);
    }

    public function send_fedback(Request $request)
    {
        $error_message = 	[
			'full_name.required'        => 'Name should be required',
			'email_address.required'    => 'Email address should be required',
			'mobile_number.required'    => 'Mobile number should be required',
			'message.required'          => 'Message should be required',
            'email_address.regex'       => 'Provide valid email adddress',
		];

		$validatedData = $request->validate([
			'full_name' 	    => 'required',
			'email_address' 	=> 'required|regex:^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^',
            'mobile_number' 	=> 'required',
            'message' 	        => 'required',
        ], $error_message);

        try
        {
            $email_data = ['full_name' => $request->full_name, 'email_address' => $request->email_address, 'mobile_number' => $request->mobile_number, 'message' => $request->message];
            \Mail::to('mmsdatas@gmail.com')->send(new \App\Mail\feedback($email_data)); 
            return back()->With('Success', 'Feedback sent successfully');
        }
        catch(\Throwable $e)
        {
            return redirect()->back()->With('Failed', $e->getMessage());
        }
    }
}
