<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    @yield('meta-tags')
    <title>@yield('title')</title>
    @include('frontend.widgets.headcss')
    @yield('customstyle')
</head>
<body>
<div class="page category">
    @include('frontend.widgets.header')
    @include('frontend.widgets.breadcrumb')
    <section class="main">
        <div class="section">
            <div class="container">
                <div class="col-sm-12">
                    <div class="row mainpage-wrapper">

                        @yield('content')

                    </div>
                </div>

            </div>
        </div>
    </section>
    @include('frontend.widgets.contacts')
    @include('frontend.widgets.footer')
</div>
@include('frontend.widgets.systemjs')
@yield('js-footer')
</body>

</html>