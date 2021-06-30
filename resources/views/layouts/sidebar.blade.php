<div class="col-md-3">
    <ul class="dashboard-list">
        <li><a class="{{ Request::is('account') ? 'active' : '' }}" href="{{route('account.user')}}">My Account</a></li>
        <li><a class="{{ Request::is('bookings*') ? 'active' : '' }}" href="{{route('bookings')}}">My Bookings</a></li>
        <li><a href="{{route('search.helper')}}?role={{base64_encode(config('constant.EMP_ROLE.Maid'))}}">Find Maid</a></li>
        <li><a href="{{route('search.helper')}}?role={{base64_encode(config('constant.EMP_ROLE.Caregivers'))}}">Find Caregivers</a></li>
        <li><a class="{{ Request::is('customer/change_password') ? 'active' : '' }}" href="{{route('user.change.password')}}">Change Password</a></li>
        <li><a href="{{route('logout.user')}}">Logout</a></li>
    </ul>
</div>