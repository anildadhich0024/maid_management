<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">
            
    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="{{route('dashboard')}}" data-active="{{ Request::is('control_panel/dashboard') ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="#employee" data-toggle="collapse" data-active="{{ Request::is('control_panel/employee*') ? 'true' : 'false' }}" aria-expanded="{{ Request::is('control_panel/employee*') ? 'true' : 'false' }}" class="dropdown-toggle {{ Request::is('control_panel/employee*') ? '' : 'collapsed' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Maid / Caregivers</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('control_panel/employee*') ? 'collapse show' : '' }}" id="employee" data-parent="#accordionExample">
                    <li class="{{ Request::is('control_panel/employee/create') || Request::is('control_panel/employee/*/edit') ? 'active' : '' }}">
                        <a href="{{route('employee.create')}}"> Create Account  </a>
                    </li>                           
                    <li class="{{ Request::is('control_panel/employee') ? 'active' : '' }}">
                        <a href="{{route('employee.index')}}"> Account List  </a>
                    </li>                           
                </ul>
            </li>
            @if(Auth::user()->user_role->roles->role_title == 'ROLE_ADMIN')
                <li class="menu">
                    <a href="#subadmin" data-toggle="collapse" data-active="{{ Request::is('control_panel/sub_admin*') || Request::is('control_panel/customer') ? 'true' : 'false' }}" aria-expanded="{{ Request::is('control_panel/sub_admin*') || Request::is('control_panel/customer') ? 'true' : 'false' }}" class="dropdown-toggle {{ Request::is('control_panel/sub_admin*') || Request::is('control_panel/customer') ? '' : 'collapsed' }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            <span>Users</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('control_panel/sub_admin*') || Request::is('control_panel/customer') ? 'collapse show' : '' }}" id="subadmin" data-parent="#accordionExample">
                        <li class="{{ Request::is('control_panel/sub_admin/create') || Request::is('control_panel/sub_admin/*/edit') ? 'active' : '' }}">
                            <a href="{{route('sub_admin.create')}}"> Create Sub Admin  </a>
                        </li>                           
                        <li class="{{ Request::is('control_panel/sub_admin') ? 'active' : '' }}">
                            <a href="{{route('sub_admin.index')}}"> Sub Admin List  </a>
                        </li>                           
                        <li class="{{ Request::is('control_panel/customer') ? 'active' : '' }}">
                            <a href="{{route('customer')}}"> Customer List  </a>
                        </li>                           
                    </ul>
                </li>
                <li class="menu">
                    <a href="#banners" data-toggle="collapse" data-active="{{ Request::is('control_panel/banner*') ? 'true' : 'false' }}" aria-expanded="{{ Request::is('control_panel/banner*') ? 'true' : 'false' }}" class="dropdown-toggle {{ Request::is('control_panel/banner*') ? '' : 'collapsed' }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                            <span>Banners</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('control_panel/banner*') ? 'collapse show' : '' }}" id="banners" data-parent="#accordionExample">
                        <li class="{{ Request::is('control_panel/banner/create') || Request::is('control_panel/banner/*/edit') ? 'active' : '' }}">
                            <a href="{{route('banner.create')}}"> Create Banner  </a>
                        </li>                           
                        <li class="{{ Request::is('control_panel/banner') ? 'active' : '' }}">
                            <a href="{{route('banner.index')}}"> Banner List  </a>
                        </li>                           
                    </ul>
                </li>
                <li class="menu">
                    <a href="#training" data-toggle="collapse" data-active="{{ Request::is('control_panel/training*') ? 'true' : 'false' }}" aria-expanded="{{ Request::is('control_panel/training*') ? 'true' : 'false' }}" class="dropdown-toggle {{ Request::is('control_panel/training*') ? '' : 'collapsed' }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                            <span>Training Images</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('control_panel/training*') ? 'collapse show' : '' }}" id="training" data-parent="#accordionExample">
                        <li class="{{ Request::is('control_panel/training/create') || Request::is('control_panel/training/*/edit') ? 'active' : '' }}">
                            <a href="{{route('training.create')}}"> Create Training  </a>
                        </li>                           
                        <li class="{{ Request::is('control_panel/training') ? 'active' : '' }}">
                            <a href="{{route('training.index')}}"> Training List  </a>
                        </li>                           
                    </ul>
                </li>
                <li class="menu">
                    <a href="#services" data-toggle="collapse" data-active="{{ Request::is('control_panel/service*') ? 'true' : 'false' }}" aria-expanded="{{ Request::is('control_panel/service*') ? 'true' : 'false' }}" class="dropdown-toggle {{ Request::is('control_panel/service*') ? '' : 'collapsed' }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                            <span>Services</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('control_panel/service*') ? 'collapse show' : '' }}" id="services" data-parent="#accordionExample">
                        <li class="{{ Request::is('control_panel/service/create') || Request::is('control_panel/service/*/edit') ? 'active' : '' }}">
                            <a href="{{route('service.create')}}"> Create Service  </a>
                        </li>                           
                        <li class="{{ Request::is('control_panel/service') ? 'active' : '' }}">
                            <a href="{{route('service.index')}}"> Services List  </a>
                        </li>                           
                    </ul>
                </li>
                <li class="menu">
                    <a href="{{route('order.index')}}" data-active="{{ Request::is('control_panel/order*') ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                            <span>Bookings</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="#blog" data-toggle="collapse" data-active="{{ Request::is('control_panel/blog*') ? 'true' : 'false' }}" aria-expanded="{{ Request::is('control_panel/blog*') ? 'true' : 'false' }}" class="dropdown-toggle {{ Request::is('control_panel/blog*') ? '' : 'collapsed' }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-aperture"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
                            <span>Blog</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('control_panel/blog*') ? 'collapse show' : '' }}" id="blog" data-parent="#accordionExample">
                        <li class="{{ Request::is('control_panel/blog/create') || Request::is('control_panel/blog/*/edit') ? 'active' : '' }}">
                            <a href="{{route('blog.create')}}"> Create Blog  </a>
                        </li>                           
                        <li class="{{ Request::is('control_panel/blog') ? 'active' : '' }}">
                            <a href="{{route('blog.index')}}"> Blogs List  </a>
                        </li>                           
                    </ul>
                </li>
                <li class="menu">
                    <a href="#faq" data-toggle="collapse" data-active="{{ Request::is('control_panel/faq*') ? 'true' : 'false' }}" aria-expanded="{{ Request::is('control_panel/faq*') ? 'true' : 'false' }}" class="dropdown-toggle {{ Request::is('control_panel/faq*') ? '' : 'collapsed' }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                            <span>FAQ's</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('control_panel/faq*') ? 'collapse show' : '' }}" id="faq" data-parent="#accordionExample">
                        <li class="{{ Request::is('control_panel/faq/create') || Request::is('control_panel/faq/*/edit') ? 'active' : '' }}">
                            <a href="{{route('faq.create')}}"> Create FAQ  </a>
                        </li>                           
                        <li class="{{ Request::is('control_panel/faq') ? 'active' : '' }}">
                            <a href="{{route('faq.index')}}"> FAQ's List  </a>
                        </li>                           
                    </ul>
                </li>
                <li class="menu">
                    <a href="#testimonial" data-toggle="collapse" data-active="{{ Request::is('control_panel/testimonial*') ? 'true' : 'false' }}" aria-expanded="{{ Request::is('control_panel/testimonial*') ? 'true' : 'false' }}" class="dropdown-toggle {{ Request::is('control_panel/testimonial*') ? '' : 'collapsed' }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                            <span>Testimonial</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('control_panel/testimonial*') ? 'collapse show' : '' }}" id="testimonial" data-parent="#accordionExample">
                        <li class="{{ Request::is('control_panel/testimonial/create') || Request::is('control_panel/testimonial/*/edit') ? 'active' : '' }}">
                            <a href="{{route('testimonial.create')}}"> Create Testimonial  </a>
                        </li>                           
                        <li class="{{ Request::is('control_panel/testimonial') ? 'active' : '' }}">
                            <a href="{{route('testimonial.index')}}"> Testimonials List  </a>
                        </li>                           
                    </ul>
                </li>
                <li class="menu">
                    <a href="#address" data-toggle="collapse" data-active="{{ Request::is('control_panel/address*') ? 'true' : 'false' }}" aria-expanded="{{ Request::is('control_panel/address*') ? 'true' : 'false' }}" class="dropdown-toggle {{ Request::is('control_panel/address*') ? '' : 'collapsed' }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                            <span>Office Address</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('control_panel/address*') ? 'collapse show' : '' }}" id="address" data-parent="#accordionExample">
                        <li class="{{ Request::is('control_panel/address/create') || Request::is('control_panel/address/*/edit') ? 'active' : '' }}">
                            <a href="{{route('address.create')}}"> Create Address  </a>
                        </li>                           
                        <li class="{{ Request::is('control_panel/address') ? 'active' : '' }}">
                            <a href="{{route('address.index')}}"> Address List  </a>
                        </li>                           
                    </ul>
                </li>
                <li class="menu">
                    <a href="{{route('setting.edit',base64_encode(1))}}" data-active="{{ Request::is('control_panel/setting*') ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <span>Time Setting</span>
                        </div>
                    </a>
                </li>
            @endif
            <li class="menu">
                <a href="{{route('change.password')}}"  data-active="{{ Request::is('control_panel/change_password') ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                        <span>Change Password</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{route('admin.logout')}}"  data-active="{{ Request::is('/') ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        <span>Sign Out</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!--  END SIDEBAR  -->