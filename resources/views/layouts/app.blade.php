<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" type="image/png" href="{{asset('public/images/favicon.png')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/style.css')}}?v={{date('dmyhis')}}">
    <script type="text/javascript" src="{{asset('js/common.js')}}">
    </script>
    <title>{{$title}} | Maid Management Pte Ltd</title>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/60c829ef7f4b000ac037a09c/1f86u7kfd';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</head>
@php
    $get_time = \App\Models\Setting::first();
@endphp
<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <ul>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('about_us')}}">About Us </a></li>
            <li><a href="{{route('services.list')}}">Services</a></li>
            <li><a href="{{route('search.helper')}}?role={{base64_encode(config('constant.RMP_ROLE.Maid'))}}">Search Helper <span class="menu-dropdown"></span> <i class="fas fa-angle-down"></i></a>
              <ul>
                  <li><a href="{{route('search.helper')}}?role={{base64_encode(config('constant.EMP_ROLE.Maid'))}}">Search Maid</a></li>
                  <li><a href="{{route('search.helper')}}?role={{base64_encode(config('constant.EMP_ROLE.Caregivers'))}}">Search Caregiver</a></li>
              </ul>
            </li>
            <li><a href="{{route('training')}}">Training </a></li>
            <li><a href="{{route('contact')}}">Contact</a></li>

        </ul>
        <ul class="mobile-sec-ul">
            @if(!Auth::check() || Auth::user()->user_role->roles->role_title != 'ROLE_USER')
                <li class="displaiinline-a"><a href="{{route('login')}}">Sign In</a> | <a href="{{route('register')}}">Sign Up</a></li>
            @else
                <li class="displaiinline-a"><a href="{{route('account.user')}}">My Account</a></li>
            @endif
            <li><a href="{{route('cart.list')}}"><img src="{{asset('images/menu-cart.svg')}}" alt=""><span class="cart-count">{{ !empty(Session::get('emp_cart')) ? count(Session::get('emp_cart')) : 0 }}</span></a>
            </li>
        </ul>
      </div>
     <div class="mobile-header">
            <div class="mobile-logo"> <a href="{{route('home')}}"><img src="{{asset('images/Maid-logo-svg.svg')}}" alt=""></a></div>
            <span class="menu-toggle" onclick="openNav()">&#9776;</span>
     </div>

      <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul  style="top: 5px">
                        <li><a href="callto:6345 9978"><img src="{{asset('images/call-icon-top.svg')}}" /> +65 6345 9978 / 6466 6136</a></li>
                        <li><a href="mailto:mmsdatas@gmail.com"><img src="{{asset('images/email-icon-top.svg')}}" /> mmsdatas@gmail.com</a></li>
                        <li><img src="{{asset('images/clock-icon-top.svg')}}" /> Open {{date('h:i A', strtotime($get_time->mon_fri_open))}} - {{date('h:i A', strtotime($get_time->mon_fri_close))}} (Mon-Fri)
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="top-social-media">
                        @if(!Auth::check() || Auth::user()->user_role->roles->role_title != 'ROLE_USER')
                            <li class="displaiinline-a"><a href="{{route('login')}}">Sign In</a> | <a href="{{route('register')}}">Sign Up</a></li>
                        @else
                            <li class="displaiinline-a"><a href="{{route('account.user')}}">My Account  <i style="top: 2px;
                                position: relative;" class="fas fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="{{route('bookings')}}">My Bookings</a></li>
                                    <li><a href="{{route('search.helper')}}?role={{base64_encode(config('constant.EMP_ROLE.Maid'))}}">Find Maid</a></li>
                                    <li><a href="{{route('search.helper')}}?role={{base64_encode(config('constant.EMP_ROLE.Caregivers'))}}">Find Caregivers</a></li>
                                    <li><a href="{{route('user.change.password')}}">Change Password</a></li>
                                    <li><a href="{{route('logout.user')}}">Logout</a></li>
                                </ul>
                            </li>
                        @endif
                        <li><a href="https://www.facebook.com/maidmanagementservices" target="_blank"><img src="{{asset('images/facebook-icon-top.svg')}}" style="top: -2px"></a></li>
                        <li><a href="https://wa.me/+6594591290?text=Hello, I am looking for some maid services" target="_blank"><img src="{{asset('images/whatsapp-icon-top.svg')}}" style="top: -2px"></a></li>
                        <li><a href="https://t.me/maidmanagementservices?text=Hello, I am looking for some maid services" target="_blank"><img src="{{asset('images/telegram-icon-top.svg')}}" style="top: -2px"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu" id="sticky-scroll">
        <div class="container">
            <div class="row">
                <div class="col-md-4 main-logo">
                    <a href="{{route('home')}}"><img src="{{asset('images/Maid-logo-svg.svg')}}" alt=""></a>
                </div>
                <div class="col-md-8 text-right position-relative">

                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('about_us')}}">About Us </a></li>
                        <li><a href="{{route('services.list')}}">Services</a></li>
                        <li><a href="{{route('search.helper')}}?role={{base64_encode(config('constant.RMP_ROLE.Maid'))}}">Search Helper <span class="menu-dropdown"></span> <i class="fas fa-angle-down"></i></a>
                          <ul>
                              <li><a href="{{route('search.helper')}}?role={{base64_encode(config('constant.EMP_ROLE.Maid'))}}">Search Maid</a></li>
                              <li><a href="{{route('search.helper')}}?role={{base64_encode(config('constant.EMP_ROLE.Caregivers'))}}">Search Caregiver</a></li>
                          </ul>
                        </li>
                        <li><a href="{{route('training')}}">Training </a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>

                    </ul>
                    <ul class="menu-btn-area">
                        <li><a href="{{route('cart.list')}}"><img src="{{asset('images/menu-cart.svg')}}" alt=""><span class="cart-count">{{ !empty(Session::get('emp_cart')) ? count(Session::get('emp_cart')) : 0 }}</span></a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <div class="section section-padding common-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{route('home')}}"><img src="{{asset('images/Maid-logo-svg.svg')}}" alt=""></a><br><br>
                    <p class="font-14">Welcome to Maid Management Services Pte Ltd (Formerly known as Maid Management Services – Sole Proprietorship).</p>
                    <a href="https://www.facebook.com/maidmanagementservices" target="_blank" class="footer-icon"><img src="{{asset('images/facebook-icon-footer.svg')}}" alt=""></a>
                    <a href="https://t.me/maidmanagementservices?text=Hello, I am looking for some maid services" target="_blank" class="footer-icon"><img src="{{asset('images/telegram-icon-footer.svg')}}" alt=""></a>
                    <a href="https://wa.me/+6594591290?text=Hello, I am looking for some maid services" target="_blank" class="footer-icon"><img src="{{asset('images/whatsapp-icon-footer.svg')}}" alt=""></a>
                </div>
                <div class="col-md-3 col-padding-left">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('about_us')}}">About Us</a></li>
                        <li><a href="{{route('services.list')}}">Services</a></li>
                        <li><a href="{{route('search.helper')}}?role={{base64_encode(config('constant.EMP_ROLE.Maid'))}}"> Maid Search</a></li>
                        <li><a href="{{route('search.helper')}}?role={{base64_encode(config('constant.EMP_ROLE.Caregivers'))}}"> Caregiver Search</a></li>
                        <li><a href="{{route('training')}}"> Training</a></li>
                        <li><a href="{{route('faq.list')}}"> FAQs</a></li>
                        <li><a href="{{route('blog.list')}}"> Blogs</a></li>
                        <li><a href="{{route('contact')}}"> Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="https://www.mom.gov.sg/passes-and-permits/work-permit-for-foreign-domestic-worker/eligibility-and-requirements/employers-orientation-programme-eop" target="_blank">EOP Registration</a></li>
                        <li><a href="https://www.singpass.gov.sg/spauth/login/loginpage" target="_blank">Singpass</a></li>
                        <li><a href="https://www.mom.gov.sg/passes-and-permits/work-permit-for-foreign-domestic-worker/employers-guide/employment-rules" target="_blank">Employer Guidelines</a></li>
                        <li><a href="https://www.mas.gov.sg/" target="_blank">Authority of SG (MAS)</a></li>
                        <li><a href="https://www.iras.gov.sg/irashome/default.aspx" target="_blank">IRAS</a></li>
                        <li><a href="https://www.mom.gov.sg/eservices/services/check-and-pay-levy" target="_blank">Levy Billing</a></li>
                        <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                        <li><a href="{{route('terms')}}">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>Operating Hours</h4>
                    <p class="font-14">
                        <b style="margin-bottom: 5px; display: block">Monday to Friday</b>
                        {{date('h:i A', strtotime($get_time->mon_fri_open))}} to {{date('h:i A', strtotime($get_time->mon_fri_close))}}<br><br>
                        <b style="margin-bottom: 5px ;display: block">Saturday to Sunday</b>
                        {{date('h:i A', strtotime($get_time->sat_sun_open))}} to {{date('h:i A', strtotime($get_time->sat_sun_close))}}
                    </p>
                    <h4>Contact Us</h4>
                    <a href="mailto:mmsdatas@gmail.com">mmsdatas@gmail.com</a>
                    <a href="{{route('home')}}">www.maidms.com.sg</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <h4>Foreign
                        Embassy</h4>
                </div>
                <div class="col-md-2 flag">
                    <a href="http://www.philippine-embassy.org.sg/" target="_blank">
                        <img src="{{asset('images/philippine-flag.svg')}}" alt=""><p>Philippine<br>Embassy</p>
                    </a>
                </div>
                <div class="col-md-2 flag">
                    <a href="https://kemlu.go.id/singapore/en" target="_blank">
                        <img src="{{asset('images/Indonesia-flag.svg')}}" alt=""><p>Indonesia<br>Embassy</p>
                    </a>
                </div>
                <div class="col-md-2 flag">
                    <a href="http://www.myanmarembassy.sg/" target="_blank">
                        <img src="{{asset('images/Myanmar-flag.svg')}}" alt=""><p>Myanmar<br>Embassy</p>
                    </a>
                </div>
                <div class="col-md-2 flag">
                    <a href="https://www.lanka.com.sg/" target="_blank">
                        <img src="{{asset('images/Srilanka-flag.svg')}}" alt=""><p>SriLanka<br>Embassy</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center">
        <p> Copyright © {{date('Y')}} Maid Management Services Pte Ltd | Design & Developed by <a href="https://icore.sg/" style="color: #fff;font-weight:500;font-size:14px" target="_blank">Icore Singapore</a></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/form-validation.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-maxlength/custom-bs-maxlength.js')}}"></script>

<script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    $(window).scroll(function() {
    var scroll = $(window).scrollTop();

     //>=, not <=
    if (scroll >= 500) {
        //clearHeader, not clearheader - caps H
        $(".main-menu").addClass("active");
    }
    else{
        $(".main-menu").removeClass("active");
    }
}); //missing );
    </script>

</body>
</html>
