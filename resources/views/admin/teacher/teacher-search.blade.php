@extends('admin.master')
@section('title')
@endsection
@section('style')
@endsection
@section('content')
    @parent
    <div class="row">
        <section class="content">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Danh sách giáo viên</h3></div>
                        <div class="pull-right">
                            <div class="btn-group">     
                                <a href="{{route('adminteacher.create')}}" class="btn btn-info" >Thêm gíao viên</a>
                            </div>
                        </div>

                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">    
                                <thead>
                                       <th>Mã số</th>
                                       <th>Họ tên giáo viên</th>
                                       <th>Trường công tác</th>
                                       <th>Bộ môn</th>
                                       <th>Giới tính</th>
                                       <th>Kinh nghiệm</th>
                                       <th>Lớp đã mở</th>
                                       <th>Ngày tham gia</th>
                                       <th>Chi tiết</th>
                                       <th></th>
                                       <th></th>
                                </thead>
                                <tbody>
                                    @if($teachers->count())
                                        @foreach($teachers as $teacher)
                                        <tr>
                                            <td>{{$teacher->id}}</td>
                                            <td><a href="{{route('adminteacher.edit', ['id'=>$teacher->id])}}">{{$teacher->tname}}</a></td>
                                            <td>{{$teacher->school_name}}</td>
                                            <td>{{$teacher->subject}}</td>
                                            <td>{{$teacher->gender}}</td>
                                            <td>{{$teacher->experience}} Năm</td>
                                            <td>{{$teacher->lophocs_count}} Lớp</td>
                                            <td>{{$teacher->created_at}}</td>
                                            <td></td>
                                            <td><a href="{{route('adminteacher.edit', ['id'=> $teacher->id])}}" class="btn btn-sm btn-info">Sửa</a></td>
                                            <td>
                                                <form action="{{route('adminteacher.destroy', ['id' =>$teacher->id])}}" method="post">{{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-sm btn-danger" type="submit">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">Không tìm thấy</td>
                                        </tr>
                                    @endif  
                                </tbody>
                            </table>
                            <div>{{$teachers->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
