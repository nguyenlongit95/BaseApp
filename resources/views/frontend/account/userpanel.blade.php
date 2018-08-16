<div class="blockTitle row  lineHorizontal">
    <h3><span><i class="fa fa-file-text"></i>  Tài khoản</span></h3>
</div>
<div class="blockContent row  border-left">
    <ul class="list-second-color">
        <li><a href="{{ url('profile') }}"><i class="fa fa-angle-right"></i> <strong>Thông tin tài khoản</strong></a></li>
        <li><a href="{{ url('wallet') }}"><i class="fa fa-angle-right"></i> <strong>Ví điện tử</strong></a></li>
        <li><a href="{{ url('history') }}"><i class="fa fa-angle-right"></i> <strong>Lịch sử giao dịch</strong></a></li>
        <li><a href="{{ url('change-password') }}"><i class="fa fa-angle-right"></i> <strong>Đổi mật khẩu</strong></a></li>
        <li><a href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-angle-right"></i> <strong>@lang('profiles.logout')</strong></a></li>
        {!! Form::open(array('route' => 'logout','method'=>'POST', 'id'=>'logout-form', 'style'=>"display: none;")) !!}{!! Form::close() !!}
    </ul>
</div>
