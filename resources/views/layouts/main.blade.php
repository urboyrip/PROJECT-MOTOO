<!DOCTYPE html>
<html lang="en">
     <head>
        <meta charset="utf-8">
        <title>
            MoToo | {{ $page }}
        </title>

        <link rel="icon" type="image/x-icon" href="{{ asset('img/logo_SISI_sq.png') }}">
        <!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
        </script>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css"/>

        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

        <!-- main CSS -->
        <link type="text/css" rel="stylesheet" href="/css/main.css">

        
        <!-- style CSS -->
        <link type="text/css" rel="stylesheet" href="/css/style.css">
        
        <!-- Slick -->
		<link type="text/css" rel="stylesheet" href="/css/slick.css">
		<link type="text/css" rel="stylesheet" href="/css/slick-theme.css">

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="nouislider.min.css">

     </head>

     <body>
        @guest
         <span style="float:right;margin-top:20px;margin-right:9%">
             <a href="#"><i class="fa fa-question-circle fa-2x" aria-hidden="true"></i></a>
         </span>
         @endguest
         @auth
         <form action="{{ Route('logout') }} " method="post">
            @csrf
            <div id="logout-button">
                <button style="border:none;background-color:white"> <b> Logout </b></button>
            </div>
            <span style="float:right;margin-top:20px;margin-right:7px;">
               <a href="#"><i class="fa fa-question-circle fa-2x" aria-hidden="true"></i></a>
           </span>
        </form>
        
        @endauth
        @include('partials.header')
        @yield('container')

        @include('partials.footer')
         
        
        <!-- ChartJS -->
        
        <!-- jQuery ../plugins -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/slick.min.js') }}"></script>
		<script src="{{ asset('js/nouslider.min.js') }}"></script>
		<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
		<script src="/js/main.js"></script>
        <script src="/js/app.js"></script>
     </body>
</html>