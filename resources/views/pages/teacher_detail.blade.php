@extends('layouts.header')

@section('content') 

    <section id="portfolio">
        <div class="container">
            <div class="center">
                <h2>{{trans('view.teacher-detail')}}</h2>
            </div> 

            <div class="row">
                <div class="col-md-4 center wow fadeInDown">
                </div>
                <div class="col-md-4 center wow fadeInDown">
                    <div class="clients-comments text-center center">
                        <a href="#">
                            <img src="{{asset("assets/demo-bower/images/home/$id->avatar_url")}}" class="img-circle" alt="">
                            <h3>{{ $id->teacher_name }}</h3>
                            <h4><span>{{ $id->name }}</span></h4>
                            <h4><span>{{trans('view.subject')}}: {{ $id->subject }}</span></h4>
                            <h4><span>{{trans('view.experience')}}: {{ $id->experience }}</span></h4>
                        </a>
                    </div>
                </div>
            </div>

            <div class="center">
                <h2>{{trans('view.video')}}</h2>
                <iframe width="854" height="480" src="https://www.youtube.com/embed/XCyPY6SLIco" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>

            <div class="center">
                <h2>{{trans('view.class-list')}}</h2>
            </div>
            <div class="table-container">
                    <table id="mytable" class="table table-bordred">
                        <thead>
                                <th>Mã lớp</th>
                                <th>Tên lớp</th>
                                <th>Số buổi học</th>
                                <th>Ngày bắt đầu</th>
                        </thead>

                        <tbody>
                            @foreach($lophocs as $lophoc)
                            <tr id='lophoc-{{$lophoc->lid}}'>
                                <td>{{$lophoc->lid}}</td>
                                <td><a href="{{route('class_detail', ['id'=> $lophoc->lid])}}">{{$lophoc->lophoc_name}}</a></td>
                                <td>{{$lophoc->number_of_lesson}}</td>
                                <td>{{$lophoc->begin_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>{{$lophocs->links()}}</div>
                </div>
        </div>
    </section><!--/#portfolio-item-->
		
@include('layouts.footer');

@endsection