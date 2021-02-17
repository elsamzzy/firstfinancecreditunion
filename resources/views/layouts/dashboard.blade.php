<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ $name }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('css/dashboard/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/dashboard/light-bootstrap-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('css/dashboard/demo.css') }}" rel="stylesheet" />
</head>

<body>
<div class="wrapper" style="background-color: rgba(0,0,0,0.5); background-image: url({{ asset('img/dashboard.jpg') }}); background-size: cover;">
    <div class="sidebar" data-color="orange" data-image="{{ asset('img/sidebar-5.jpg') }}">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ route('home') }}" class="simple-text">
                    <img src="{{ asset('img/logo.png') }}" style="width: 100%" />
                </a>
            </div>
            @if(auth()->guard('admin')->user())
                <ul class="nav">
                    <li class="@if($title === 'dash') nav-item active @endif">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            <p>{{ __('Dashboard') }}</p>
                        </a>
                    </li>
                    <li class="@if($title === 'message') nav-item active @endif">
                        <a class="nav-link" href="{{ route('admin.message') }}">
                            <i class="fa fa-inbox"></i>
                            <p>{{ __('Messages') }}</p>
                        </a>
                    </li>
                    <li class="@if($title === 'setting') nav-item active @endif">
                        <a class="nav-link" href="{{ route('admin.settings') }}">
                            <i class="fa fa-gears"></i>
                            <p>{{ __('Setting') }}</p>
                        </a>
                    </li>
                </ul>
            @else
                @if($title === 'id')
                    <ul class="nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="fa fa-home"></i>
                                <p>{{ __('Dashboard') }}</p>
                            </a>
                        </li>
                    </ul>
                @else
                    <ul class="nav">
                        <li class="@if($title === 'dashboard') nav-item active @endif">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="fa fa-home"></i>
                                <p>{{ __('Dashboard') }}</p>
                            </a>
                        </li>
                        <li class="@if($title === 'user') nav-item active @endif">
                            <a class="nav-link" href="{{ route('user') }}">
                                <i class="fa fa-user"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>


                        <li class="@if($title === 'trans') nav-item active @endif">
                            <a class="nav-link" href="{{ route('transactions') }}">
                                <i class="fa fa-money"></i>
                                <p>{{ __('Transactions') }}</p>
                            </a>
                        </li>

                        <li class="@if($title === 'socials') nav-item active @endif">
                            <a class="nav-link" href="{{ route('social') }}">
                                <i class="fa fa-inbox"></i>
                                <p>{{ __('Socials/Support') }}</p>
                            </a>
                        </li>
                    </ul>
                @endif
            @endif
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg " color-on-scroll="500"  style="background-color: rgba(255, 165, 52, 0.7);">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">{{ __('Dashboard') }} </a>
                <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item">
                            @if(auth()->guard('admin')->user())
                                <a href="{{ route('admin.dashboard') }}" class="nav-link" data-toggle="dropdown">
                                    <span class="d-lg-none">{{ __('Dashboard') }}</span>
                                </a>
                            @else
                                <a href="{{ route('home') }}" class="nav-link" data-toggle="dropdown">
                                    <span class="d-lg-none">{{ __('Dashboard') }}</span>
                                </a>
                            @endif
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            @if(auth()->guard('admin')->user())
                                <a class="nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="no-icon txt-white">{{ __('Log out') }}</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="no-icon txt-white">{{ __('Log out') }}</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        @yield('contents')
        <footer class="footer" style="background-color: rgba(255, 165, 52, 0.7);">
            <div class="container-fluid" style="background-color: rgba(255, 165, 52, 0.7);">
                <div class="row" style="background-color: rgba(255, 165, 52, 0.7);">
                    <div class="col-md-3">
                        <h4>Oklahoma Branch</h4>
                        <h5 class="txt-white">
                            Address: 1050 North Rockford Ardmore, OK, 73401</br>
                            Phone Contact: + 1 (405) 266-2830</br>
                        </h5>
                    </div>
                    <div class="col-md-3">
                        <h4>Canada Branch</h4>
                        <h5 class="txt-white">
                            Address: Calgary 2810 32Nd Avenue N.e.</br>
                            Phone Contact: + 1 (587) 205-4582</br>
                        </h5>
                    </div>
                    <div class="col-md-3">
                        <h4>New Mexico Branch</h4>
                        <h5 class="txt-white">
                            Address: 1501 Mercantile Ave NE, Albuquerque, NM 87107</br>
                            Phone Contact: +1 (505) 372 5803</br>
                        </h5>
                    </div>
                    <div class="col-md-3">
                        <h4>New Mexico Branch</h4>
                        <h5 class="txt-white">
                            Address: 1501 Mercantile Ave NE, Albuquerque, NM 87107</br>
                            Phone Contact: +1 (505) 370 9422</br>
                        </h5>
                    </div>
                </div>
                <div class="row justify-content-center" style="background-color: rgba(255, 165, 52, 0.7);">
                    <center>
                        <p class="copyright text-center">
                           Contact Us @ contact@firstfinancialcreditunion.com
                        </p>
                    </center>
                </div>
                <div class="row justify-content-center" style="background-color: rgba(255, 165, 52, 0.7);">
                    <center>
                    <p class="copyright text-center">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        First Credit Union, Secured online banking
                    </p>
                    </center>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
<!--  Chartist Plugin  -->
<script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{ asset('js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('js/demo.js') }}"></script>
@if($title === 'dashboard')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script>
@endif
<script>

    var today = new Date();

    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

    var dateTime = date+' '+time;

    document.getElementById('date').innerHTML = time;
</script>
<script>

    var today = new Date();

    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

    document.getElementById('dates').innerHTML = time;
</script>
@if(auth()->guard('admin')->user())
    <script>
        setInterval(function() {
            var element =  document.getElementById('message');
            var fadeTarget = document.getElementById("message");
            if (typeof(element) != 'undefined' && element != null)
            {
                if (!fadeTarget.style.opacity) {
                    fadeTarget.style.opacity = 1;
                }
                if (fadeTarget.style.opacity > 0) {
                    fadeTarget.style.opacity -= 0.1;
                }
            }
        }, 300);
    </script>
@else
    {!! $admins->disChat() !!}
@endif
@if(session('insufficient'))
    <script>
        setInterval(function() {
            var element =  document.getElementById('message');
            var fadeTarget = document.getElementById("message");
            if (typeof(element) != 'undefined' && element != null)
            {
                if (!fadeTarget.style.opacity) {
                    fadeTarget.style.opacity = 1;
                }
                if (fadeTarget.style.opacity > 0) {
                    fadeTarget.style.opacity -= 0.1;
                }
            }
        }, 300);
    </script>
@endif
@if(session('send'))
    <!--Displaying the loader -->
    <script src="{{ asset('js/loader.js') }}"></script>

    <script>
        setInterval(function() {
            const elements = document.getElementById("myModal2");
            if (elements.classList.contains("dis-block")) {
                elements.classList.remove("dis-block");
            }
            elements.classList.add("dis-none");
            const element = document.getElementById("message");
            if (element.classList.contains("dis-none")) {
                element.classList.remove("dis-none");
            }
            element.classList.add("dis-block");
        }, 3500);
    </script>
    <script>
        setInterval(function() {
            var element =  document.getElementById('message');
            var fadeTarget = document.getElementById("message");
            if (typeof(element) != 'undefined' && element != null)
            {
                if (!fadeTarget.style.opacity) {
                    fadeTarget.style.opacity = 1;
                }
                if (fadeTarget.style.opacity > 0) {
                    fadeTarget.style.opacity -= 0.1;
                }
            }
        }, 1000);
    </script>
@endif
</html>
