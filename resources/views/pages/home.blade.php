@extends('layouts.header')

@section('content')

    <div class="slider">
        <div class="container">
            <div id="about-slider">
                <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators visible-xs">
                        <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-slider" data-slide-to="1" class="active"></li>
                        <li data-target="#carousel-slider" data-slide-to="2" class="active"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{asset('assets/demo-bower/images/home/slider_one.jpg')}}" class="img-responsive" alt=""> 
                       </div>
                       <div class="item">
                            <img src="{{asset('assets/demo-bower/images/home/slider_one.jpg')}}" class="img-responsive" alt=""> 
                       </div> 
                       <div class="item">
                            <img src="{{asset('assets/demo-bower/images/home/slider_one.jpg')}}" class="img-responsive" alt=""> 
                       </div> 
                    </div>
                    
                    <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
                        <i class="fa fa-angle-left"></i> 
                    </a>
                    
                    <a class=" right carousel-control hidden-xs" href="#carousel-slider" data-slide="next">
                        <i class="fa fa-angle-right"></i> 
                    </a>
                </div> <!--/#carousel-slider-->
            </div><!--/#about-slider-->
        </div>
    </div>

    <section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>{{trans('view.title')}}</h2>
                <p class="lead"></p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-laptop" href="{{route('teacher')}}"></i>
                            <h2><a href="{{route('teacher')}}">{{trans('view.teacher')}}</a></h2>
                            <h3>{{trans('view.teacher-title')}}</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-comments" href="{{route('register')}}"></i>
                            <h2><a href="{{route('register')}}">{{trans('view.register')}}</a></h2>
                            <h3>{{trans('view.register-title')}}</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-comments" href="{{route('login')}}"></i>
                            <h2><a href="{{route('login')}}">{{trans('view.login')}}</a></h2>
                            <h3>{{trans('view.login-title')}}</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    </div><!--/.col-md-4-->                                    
                </div><!--/.features-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->
    
     <section id="recent-works">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>{{trans('view.top-teacher')}}</h2>
            </div>

            <div class="infinite-scroll">
                @foreach($top_teacher as $teacher)
                <div class="col-md-3 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <a href="{{route('teacher_detail' , $teacher->id)}}">
                            <img src="{{asset("assets/demo-bower/images/home/$teacher->avatar_url")}}" class="img-circle" alt="" href="{{route('teacher_detail', $teacher->id)}}">
                            <h3></h3>
                            <h4><span>{{ $teacher->teacher_name }}</span></h4>
                            <h4><span>{{trans('view.subject')}} : {{ $teacher->subject }}</span></h4>
                            <h4><span>{{trans('view.experience')}} : {{ $teacher->experience }}</span></h4>
                            <div class="single-item-caption">
                                <a class="btn-primary" href="{{route('teacher_detail', $teacher->id)}}">{{trans('view.detail')}}</a>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
                {{$top_teacher->links()}}
            </div>
        </div><!--/.container-->
    </section><!--/#recent-works--> 
    @include('layouts.footer');
@endsection
