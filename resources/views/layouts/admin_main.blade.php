<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MoToo | Admin</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo_SISI_sq.png') }}">
    <!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">


    <!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css"/>
    <!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />



    <!-- main CSS -->
    <link type="text/css" rel="stylesheet" href="/css/admin.css">
        
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
    <!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">


</head>
<body>
{{--     
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/chart.js/Chart.min.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/js/bootstrap.bundle.min.js') }}"></script>
         --}}

    <script src="https://code.highcharts.com/highcharts.js"> </script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/xrange.js"></script>
    <script src="https://code.highcharts.com/6.1.4/highcharts.js"></script> 
    
    <div id="header-admin">
        <div id="logo_sisi_merah">
            <a href="/"> <img src={{ asset('img/logo_SISI_merah.jpg') }} width="168px"> </a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8" style="margin-left:15px">
                    <a href="/store" style="color:white;font-weight:bold"><i class="fa fa-bars" aria-hidden="true"></i>  Katalog</a>
                </div>
                <div class="col-md-2">
                    <div id="akun">
                        <i class="fa fa-user" aria-hidden="true"></i> {{ auth()->user()->Nama_User }}
                    </div>
                    <div class="my-account" style="margin-top:-2px;margin-right:-330px;float:right">
                        <form action="{{ Route('logout') }} " method="post">
                        @csrf
                        <div>
                            <button style="border:none;background-color:#BF2C45"> <b> Logout </b></button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="sidebar">
        <a href="/dashboard"> <i class="fa fa-tachometer" aria-hidden="true"></i> <b> Dashboard </b></a>
        <br><br>
        <a href="/chart"><i class="fa fa-bar-chart" aria-hidden="true"></i> <b> Chart </b></a>
        <br><br>
        <a href="/report"><i class="fa fa-file" aria-hidden="true"></i> <b> Report </b> </a>
        <br><br>
        <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> <b> Help & Guide </b> </a>
        <br><br>
        <a href="/profile/{{ auth()->user()->id }}"> <i class="fa fa-user" aria-hidden="true"></i> <b> Profile <b></a>
    </div>

    <div id="main-content">
        @yield('container')
    </div>

</body>
</html>