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
                <div class="panel panel-body">
                    <div class="pull-left"><h3>Danh sách đánh gía</h3></div>          
                    <div class="table-container">
                        <table id="mytable" class="table table-bordred table-striped"> 
                        <thead>              
                            <th>Mã số</th>
                            <th>Tên học viên</th>
                            <th>Điểm số</th>
                            <th>Đánh gía chi tiết</th>
                            <th></th>
                        </thead>                                
                        <tbody>
                            @foreach($rates as $rate)
                            <tr name='rate-{{$rate->name}}'>
                                <td>{{$rate->id}}</td>
                                <td>{{$rate->user_name}}</td>
                                <td>{{$rate->point}}</td>
                                <td>{{$rate->content}}</td>
                                <td> 
                                    <form action="{{route('adminrate.destroy', ['id' =>$rate->id])}}" method="post">{{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-sm btn-danger" type="submit">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        <div>{{$rates->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
