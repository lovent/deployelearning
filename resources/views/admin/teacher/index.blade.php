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
                        <br>
                        <br>
                        <form method="GET" action="{{route('teachersearch')}}">
                            <div>
                                <div class="form-group">
                                    <input type="text" name="teachersearch" class="form-control" placeholder="Nhập tên giáo viên cần tìm" value="{{ old('teachersearch')}}"><button class="btn btn-success">Tìm kiếm</button>
                                </div>
                            </div>                        
                        </form>

                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">    
                                <thead>
                                    <th>Mã gíao viên</th>
                                    <th>Họ tên giáo viên</th>
                                    <th>Tên trường</th>
                                    <th>Bộ môn</th>
                                    <th>Giới tính</th>
                                    <th>Kinh nghiệm</th>
                                    <th>Số lớp đã mở</th>
                                    <th>Ngày tham gia</th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach($teachers as $teacher)
                                    <tr id='teacher-{{$teacher->tid}}'>
                                        <td>{{$teacher->tid}}</td>
                                        <td><a href="{{route('lophoclist', ['id'=> $teacher->tid])}}">{{$teacher->teacher_name}}</a></td>
                                        <td>{{$teacher->school_name}}</td>
                                        <td>{{$teacher->subject}}</td>
                                        <td>{{$teacher->gender}}</td>
                                        <td>{{$teacher->experience}} Năm</td>
                                        <td>{{$teacher->lophocs_count}} Lớp</td>
                                        <td>{{$teacher->created_at}}</td>
                                        <td><a href="{{route('adminteacher.edit', ['id'=> $teacher->tid])}}" class="btn btn-sm btn-info">Sửa</a></td>
                                        <td>
                                            <form action="{{route('adminteacher.destroy', ['id' =>$teacher->teacher_id])}}" method="post">{{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-sm btn-danger" type="submit">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>{{$teachers->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
