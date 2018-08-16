<header class="header-top">
    <div class="container">
        <div class="logo">
            <a href="./">
                <img src="./assets/images/logo.png" alt="" />
            </a>
        </div>

        @include('frontend.widgets.header-menu')

        @if( ! Auth::check() )
            <span class="pull-right user-header">
                    <span class="separate">&nbsp;</span>
                    <a href="{{ url('register') }}" class="btn btn-third">
                        <i class="icon ion-android-person"> </i>
                        <span class="btn-text">Đăng ký</span>
                    </a>
                    <a href="{{ url('login') }}" class="btn btn-second">
                        <i class="fa ion ion-android-unlock"></i>
                        <span class="btn-text">Đăng nhập</span>
                    </a>
                </span>
        @else
            <span class="pull-right">
                <span class="navi-wrapper">
                        <div class="navigation">
                            <ul>
                                <li>
                                    <a href="/profile"><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}</a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('profile') }}">@lang('profiles.account')</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('change-password') }}">@lang('profiles.changepassword')</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('profiles.logout')</a>
                                            {!! Form::open(array('route' => 'logout','method'=>'POST', 'id'=>'logout-form', 'style'=>"display: none;")) !!}{!! Form::close() !!}
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                </span>
        @endif
    </div>
</header>