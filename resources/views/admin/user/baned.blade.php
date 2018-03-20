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
                        <div class="pull-left"><h3>Danh sách học viên bị cấm</h3></div>
                        <br>
                        <br>
                        <form method="GET" action="{{route('usersearch')}}">
                            <div>
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
                                       <th>Tên trường</th>
                                       <th>Email</th>
                                       <th>Giới tính</th>
                                       <th>Địa chỉ</th>
                                       <th>SĐT</th>
                                       <th></th>
                                </thead>                                
                                <tbody>
                                    @foreach($users as $user)
                                    <tr id='user $user-{{$user->uid}}'>
                                        <td>{{$user->uid}}</td>
                                        <td>{{$user->user_name}}</td>
                                        <td>{{$user->school_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->gender}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->phone_number}}</td>
                                        <td><a href="{{route('unbaned', ['id'=> $user->uid])}}" class="btn btn-sm btn-info">Gỡ ban</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>{{$users->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

