<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Maid Management - Password Reset!</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<style type="text/css">
	*{font-family: 'Roboto', sans-serif;margin:0px;padding: 0px;}
	h2{color: #000; font-size: 34px;font-weight: 400;margin-bottom: 10px;}
	strong{color: #000; font-size: 26px;font-weight: 300;margin-bottom: 15px;}
	p{color: #555555;font-size: 15px;margin-bottom: 20px;line-height: 25px;}
</style>
</head>

<body>  
                
	<div style="max-width: 600px; margin:0 auto;">
		<div style ="display:block; position:relative; padding:25px; background-color: #eef0f3">
			  <div style="display: block; position: relative;padding: 32px;background-color: #fff;border-radius: 10px;box-shadow: 0px 0px 10px #e2e2e2;">
					<p><strong>Hi {{$email_data['user_name']}}</strong></p>
					<p>You recently requested to reset your Maid Management Account password.</p>
					<p>Please click on the button below to reset your password.</p>
					<p style="text-align: center;"><a href="{{url('customer/reset_password')}}/{{$email_data['token']}}" style="display: inline-block;background-color: #203869;color: #fff;position: relative;border-radius: 60px;padding: 12px 30px;text-decoration: none;">Reset Password</a></p>
					<p style="text-align: left;">If you did not request a password reset then, please ignore this email</p>
					<p style="text-align: left;">If you are having trouble clicking the password reset button, please copy and paste the URL into your web browser </p>
					<p style="text-align: left;"><a href="{{url('customer/reset_password')}}/{{$email_data['token']}}">{{url('customer/reset_password')}}/{{$email_data['token']}}</a></p>
					<p> and follow the steps to reset your Maid Management Account password.</p>
				</div>
			   <div style="display:block; position:relative; padding: 15px;">
                    <div style="display:block; position:relative; padding: 15px;">  
						<p style="text-align: left;font-size: 13px;color: #555555;line-height: 22px;">Kind Regards,</p>
						<p style="text-align: left;font-size: 13px;color: #555555;line-height: 22px;">Maid Management</p>
					</div>
			   </div>
		</div>
	</div>
</body>
</html>