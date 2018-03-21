<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elearning</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/demo-bower/home/bootstrap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/demo-bower/home/font-awesome.min.css')}}">
	<link href="{{ asset('assets/demo-bower/home/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/demo-bower/home/prettyPhoto.css')}}" rel="stylesheet">      
	<link href="{{ asset('assets/demo-bower/home/main.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/demo-bower/home/responsive.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.js"></script>   
    
  </head>
  <body class="homepage">   
	<header id="header">
        <nav class="navbar navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    
                    <a class="navbar-brand" href="{{route('home')}}">Elearning</a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- <li class="active"><a href="index.html">Home</a></li> --> 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">{{trans('view.language')}}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('user.change-language', ['language'=>'en'])}}">{{trans('view.english')}}</a></li>
                                <li><a href="{{route('user.change-language', ['language'=>'vi'])}}">{{trans('view.vietnamese')}}</a></li>
                            </ul>                                
                        </li>
                        <li><a href="{{route('teacher')}}">{{trans('view.teacher')}}</a></li>
                        <li><a href="{{route('classes')}}">{{trans('view.classes')}}</a></li>
                         
                          
                        @guest
                            <li><a href="{{ route('login') }}">{{trans('view.login')}}</a></li>
                            <li><a href="{{ route('register') }}">{{trans('view.register')}}</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->user_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('settings' , Auth::user()->id)}}">{{trans('view.profile')}}</a>
                                    </li>
                                    <li><a href="">{{trans('view.cart')}} (
                                        @if(Session::has('booking')){{Session('booking')->totalQty}}
                                        @else 0
                                        @endif)</a></li>                                 
                                    <li>
                                        <a href="{{ route('logout') }}">
                                            {{trans('view.logout')}}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endguest                    
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->
    @yield('content')

    <script src="{{asset('assets/demo-bower/js/home/jquery.js')}}"></script>
    <script src="{{asset('assets/demo-bower/js/home/notify.js')}}"></script>
    <script src="{{asset('assets/demo-bower/js/home/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/demo-bower/js/home/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('assets/demo-bower/js/home/jquery.isotope.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.js"></script>
    <script src="{{asset('assets/demo-bower/js/home/wow.min.js')}}"></script>
    <script src="{{asset('assets/demo-bower/js/home/main.js')}}"></script>
</body>
</html>