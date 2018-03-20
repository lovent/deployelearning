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
                        <div class="pull-left"><h3>Danh sách học viên</h3></div>
                        <br>
                        <br>
                        <form method="GET" action="{{route('usersearch')}}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="usersearch" class="form-control" placeholder="Nhập tên học viên cần tìm" value="{{ old('usersearch')}}"><button class="btn btn-success">Tìm kiếm</button>
                                </div>
                            </div>                        
                        </form>

                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">       
                                <thead>              
                                       <th>Mã số</th>
                                       <th>Tên học viên</th>
                                       <th>Email</th>
                                       <th>Giới tính</th>
                                       <th>Địa chỉ</th>
                                       <th>SĐT</th>
                                       <th></th>
                                       <th></th>
                                </thead>                                
                                <tbody>
                                    @if($users->count())
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->gender}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->phone_number}}</td>
                                            <td>{{$user->description}}</td>
                                            <td><a href="{{route('adminuser.update', ['id'=> $user->id])}}" class="btn btn-sm btn-info">Cấm</a></td>
                                            <td> 
                                                <form action="{{route('adminuser.destroy', ['id' =>$user->id])}}" method="post">{{csrf_field()}}
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
                            <div>{{$users->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

