<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="description" content="Admin Template">
    <meta name="author" content="Zwolek">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>404</title>
    <!-- Custom Style-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/custom.css')}}">
    <!-- Theme Color Style-->
    <link rel="stylesheet" id="jssDefault" type="text/css" href="{{URL::asset('css/theme-purple.css')}}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- 404 Error -->
<div id="error">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 content">

                <div class="error-content center-block">
                    <p class="big">404</p>
                    <p class="medium m-t-20"> Page not found </p>
                    <p>An error occurred and your request couldn't be completed.</p>
                    <p>Please try again or go back home</p>
                    <a href="{{URL('/')}}" class=" btn btn-lg bg-purple m-t-30"><span>Home</span></a>
                </div>
            </div> 
        </div> 
    </div> 
</div>
<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>