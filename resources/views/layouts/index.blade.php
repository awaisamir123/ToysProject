<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="description" content="Square King">
    <meta name="author" content="Zwolek">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    <!-- Custom Style-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/custom.css')}}">
    <!-- Theme Style-->
    <link rel="stylesheet" id="jssDefault" type="text/css" href="{{URL::asset('css/theme-purple.css')}}">
    <!-- Morris Chart Default Style -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/morris/morris.css')}}">
    <!-- Nano Scroller Default Style -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/nanoscroller.css')}}">
    <!-- Data Tables Default Style -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/datatables/datatables.min.css')}}">
    <!-- VMap Script Default Style -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/vmap/jqvmap.css')}}">
    <!-- Date Range Picker Default Style -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/daterangepicker/daterangepicker.css')}}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script  type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>

</head>
<body>
<div id="header-panel">
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div id="navbar-header">
				<a class="navbar-brand" href="">
                    <span class="logo-img">M</span>
                </a> 
				<ul class="nav navbar-nav">
                    <li class="btn-menu hidden-xs hidden-sm"> <a id="menu-toggle" href="#" class="toggle"></a> </li>
                    <li class="btn-menu hidden-md hidden-lg"> <a id="mobile-menu-toggle" href="#" class="toggle"></a> </li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown user-menu">
						 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="" alt="" class="profile-img img-circle img-resposnive pull-left">
                            <span class="hidden-xs"></span> <span class="caret"></span></a>
						<ul class="dropdown-menu pull-right">
                            <li style="margin: 0 auto ; text-align:center;"><a  href="" style="width: 100%;"><i class="fa fa-sign-out" aria-hidden="true"></i>
                             Log out
                         </a>
                             </li>
						</ul>
                    </li>
				 </ul>
			 </div>
        </div>
    </nav>
</div>
@include('layouts.header')
<div id="content-panel">
    <div class="container-fluid">
        @yield('main-section')
    </div>
</div>
<script  type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script  type="text/javascript" src="{{URL::asset('/js/menu/metisMenu.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/menu/nanoscroller.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/moment.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/countTo/jquery.countTo.js')}}"></script>
<script  type="text/javascript" src="{{URL::asset('/js/morris-js/raphael.min.js')}}"></script>
<script  type="text/javascript" src="{{URL::asset('/js/morris-js/morris.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/chart-js/Chart.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/flot-js/excanvas.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/flot-js/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/flot-js/jquery.flot.resize.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/flot-js/jquery.flot.time.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/datatables/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/vmap/jquery.vmap.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/vmap/maps/jquery.vmap.usa.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/jQuery.style.switcher.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/jquery-functions.js')}}"></script>
</body>
</html>