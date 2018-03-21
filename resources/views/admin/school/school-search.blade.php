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
                <div class="pull-left"><h3>Danh sách trường học</h3></div>
                <div class="pull-right">
                    <div class="btn-group">     
                        <a href="{{route('adminschool.create')}}" class="btn btn-info" >Thêm trường</a>
                    </div>
                </div>
                            
                <div class="table-container">
                    <table id="mytable" class="table table-bordred table-striped">       
                    <thead>              
                        <th>Mã số</th>
                        <th>Tên trường</th>
                        <th>Thành phố</th>
                        <th>Số gíao viên tham gia</th>
                        <th>Số học viên tham gia</th>
                        <th>Mô tả</th>
                        <th></th>
                        <th></th>
                    </thead>            

                    <tbody>
                        @if($schools->count())
                            @foreach($schools as $school)
                            <tr>
                                <td>{{$school->id}}</td>
                                <td><a href="{{route('adminschool.edit', ['id'=> $school->id])}}">{{$school->school_name}}</a></td>
                                <td>{{$school->city}}</td>
                                <td>{{$school->teachers_count}}</td>
                                <td>{{$school->users_count}}</td>
                                <td>{{$school->description}}</td>
                                <td><a href="{{route('adminschool.edit', ['id'=> $school->id])}}" class="btn btn-sm btn-info">Sửa</a></td>
                                <td> 
                                    <form action="{{route('adminschool.destroy', ['id' =>$school->id])}}" method="post">{{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-sm btn-danger" type="submit">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">Không tìm thấy trường.</td>
                            </tr>
                        @endif    
                    </tbody>
                    </table>
                    <div>{{$schools->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
