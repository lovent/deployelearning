
@extends('layouts.header')

@section('content') 
    <section id="services" class="service-item">
       <div class="container">
            <div class="center wow fadeInDown">
                <h2>{{trans('view.class-title')}}</h2>
                <p class="lead">{{trans('view.class-invite')}}</p>
            </div>

            <!-- filter -->
            <!-- <div class="form-group">
                <label for="exampleFormControlSelect1">{trans('view.subject')Ư</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option value="1">{trans('view.math')Ư</option>
                        <option value="2">{trans('view.physic')Ư</option>
                        <option value="3">{trans('view.chemis')Ư</option>
                        <option value="4">{trans('view.bio')Ư</option>
                        <option value="5">{trans('view.literature')Ư</option>
                        <option value="6">{trans('view.history')Ư</option>
                        <option value="7">{trans('view.geography')Ư</option>
                        <option value="8">{trans('view.english')Ư</option>
                    </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">{trans('view.price')Ư</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option value="1">{trans('view.under5')Ư</option>
                        <option value="2">{trans('view.fr5to10')Ư</option>
                        <option value="3">{trans('view.over10')Ư</option>
                    </select>
            </div> -->

            <div class="row">          
                @foreach($classes as $class)

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="{{asset('assets/demo-bower/images/home/services/services1.png')}}">
                        </div>
                        <div class="media-body">
                            <a href="{{route('class_detail' , $class->id)}}"><h3 class="media-heading">{{ $class->lophoc_name}}</h3></a>
                            <p>{{ $class->status }}</p>
                        </div>
                    </div>
                </div>

                @endforeach

            </div><!--/.row-->
        </div><!--/.container-->        
    </section><!--/#services-->
@include('layouts.footer');
@endsection

