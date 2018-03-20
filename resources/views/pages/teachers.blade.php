
@extends('layouts.header')

@section('content') 
        
    <section id="feature" class="transparent-bg">
        <div class="container">
            <div class="get-started center wow fadeInDown">
                <h2>{{trans('view.teacher-title')}}</h2>
            </div><!--/.get-started-->

            <div class="clients-area center wow fadeInDown">
                <form method="GET" action="{{ route('teacher') }}">
                    <h2><input type="text" name="titlesearch" id="faq_search_input" class="form-control search_box" autocomplete="off" placeholder="{{trans('view.search-placeholder')}}"></h2>
                    <button class="btn btn-success">{{trans('view.search-button')}}</button>                
                    <div id="searchresultdata" class="faq-articles"></div>
                    <p class="lead"></p>
                </form>
            </div>

            <div class="row">
                @if($teachers->count())
                    @foreach($teachers as $teacher)
                    <div class="col-md-4 wow fadeInDown">
                        <div class="clients-comments text-center">
                            <a href="{{route('teacher_detail' , $teacher->id)}}">
                                <img src="{{asset("assets/demo-bower/images/home/$teacher->avatar_url")}}" class="img-circle" alt="">
                                <h3></h3>
                                <h4><span>{{ $teacher->teacher_name }}</span></h4>
                                <h4><span>{{trans('view.subject')}} : {{ $teacher->subject }}</span></h4>
                                <h4><span>{{trans('view.experience')}} : {{ $teacher->experience }}</span></h4>
                            </a>
                        </div>
                    </div>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">{{trans('view.no-result')}}</td>
                    </tr>
                @endif                

            </div>
            <div class="center wow fadeInDown">
                {!! $teachers->render() !!}
            </div>  
        </div><!--/.container-->
    </section><!--/#feature-->

        @include('layouts.footer');
@endsection
