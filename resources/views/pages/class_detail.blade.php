@extends('layouts.header')

@section('content') 
            
<section id="contact-page">
    <div class="container">
        <div class="center">        
            <h2>{{ $class->lophoc_name }}</h2>
            <p class="lead"></p>
        </div>             
        <div class="row contact-wrap"> 
            <div class="status alert alert-success" style="display: none"></div>
            <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="">
                <div class="col-sm-5 col-sm-offset-1">
                    <h2>{{trans('view.teacher')}}: 
                        <label>{{ $teacher->teacher_name }}</label>
                    </h2>

                    <h2>{{trans('view.class-detail')}} :</h2>
                    <div class="">
                        <span>
                            Khóa học bao quát 7 chuyên đề thuộc chương trình Vật lí lớp 12, dần dần cập nhật các kiến thức thuộc chương trình lớp 11 có thể xuất hiện trong đề thi như thông tin mà Bộ Giáo dục và đào tạo đã công bố.
                            Cung cấp toàn bộ các dạng bài thường gặp và phương pháp giải tối ưu nhất
                        </span>
                    </div>
                    <h2>{{trans('view.class-require')}} :</h2>
                    <div class="">
                        <span>
                            Học sinh cần trang bị hệ thống kiến thức cơ bản trong chương trình SGK trước khi tham gia khóa học.
                            Chăm chỉ luyện tập và làm bài tập để ghi nhớ công thức và rèn phản xạ làm bài.
                        </span>
                    </div>
                    <div>
                        <br>
                        <label>{{trans('view.num-lesson')}} : </label> {{ $class->number_of_lesson }}
                    </div>
                    
                    @guest
                    <div>
                        
                    </div>
                    @else   
                    <div class="form-group">
                        <a href="{{route('addtocart', $class->id)}}" type="submit" name="submit" class="btn btn-primary btn-lg" required="required">
                                {{trans('view.add-cart')}}
                        </a>
                    </div> 
                    @endguest                                                                    
                </div>
            </form>           
        </div><!--/.row-->
        @guest
        <div class=" well row contact-wrap">
            <!-- xem binh luan -->
            <h4>{{trans('view.review')}} <span class="glyphicon glyphicon-pencil"></span></h4>
            <table id="mytable" class="table table-bordred table-striped"> 
                <thead>              
                    <th>{{trans('view.user-name')}}</th>
                    <th>{{trans('view.review-content')}}</th>
                    <th>{{trans('view.timestamp')}}</th>
                </thead>                                
                <tbody class="infinite-scroll">
                    @foreach($comments as $comment)
                    <tr id='comment-{{$comment->id}}'>
                        <td>{{ $comment->user_name }}</td>
                        <td>{{ $comment->content}}</td>
                        <td>{{ $comment->created_at }}</td>
                    </tr>
                    @endforeach         
                </tbody>
            </table>
            <div>{{$comments->links()}}</div>                           
        </div>
        @else
        <div class="well row contact-wrap">
            <!-- rating -->
            <h4>{{trans('view.leave-rate')}} <span class="glyphicon glyphicon-pencil"></span></h4>
            <form action="{{ route('comment' , $class->id)}}" method="post" role="form">
                {{ csrf_field() }}
                <div class='stars s-0.5' data-default='0.5'>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">{{trans('view.send')}}</button>
            </form>
        </div>

        <div class=" well row contact-wrap">
            <!-- xem binh luan -->
            <h4>{{trans('view.review')}} <span class="glyphicon glyphicon-pencil"></span></h4>
            <table id="mytable" class="table table-bordred table-striped"> 
                <thead>              
                    <th>{{trans('view.user-name')}}</th>
                    <th>{{trans('view.review-content')}}</th>
                    <th>{{trans('view.timestamp')}}</th>
                </thead>                                
                <tbody class="infinite-scroll">
                    @foreach($comments as $comment)
                    <tr id='comment-{{$comment->id}}'>
                        <td><a href="">{{ $comment->user_name }}</a></td>
                        <td>{{ $comment->content}}</td>
                        <td>{{ $comment->created_at }}</td>
                    </tr>
                    @endforeach         
                </tbody>
            </table>
            {{$comments->links()}}                           
        </div>
        @endguest  
    </div><!--/.container-->

    <script type="text/javascript">
        // ẩn thanh phân trang của laravel
        $('ul.pagination').hide();
        
        $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'tbody.infinite-scroll',
                callback: function() {
                    // xóa thanh phân trang ra khỏi html mỗi khi load xong nội dung
                    $('ul.pagination').remove();
                }
            });
        });
    </script>
</section><!--/#contact-page-->

@include('layouts.footer');

@endsection