@extends('frontend.master')


@section('content')
    <style>
        #menuLeft a{
            display: block;
        }
    </style>
    <section class="main">
        <div class="section">
            <div class="container">
                <div class="fullColumn">
                    <div class="blockTitle text-center bg-shadowimg">
                        <h3><span class="text-uppercase">Tài khoản</span></h3>
                    </div>

                    <div class="blockContent">
                        <div class="col-sm-12 right-seperate">

                            @include('frontend.account.userpanel')
                            <div class="col-sm-8">
                                <h4><span class="text-uppercase">Đổi mật khẩu</span></h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
