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
                        <div class="pull-left"><h3>Danh sách đăng ký học</h3></div>
                        <br>
                        <br>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">       
                                <thead>              
                                       <th>Mã số</th>
                                       <th>Tên học viên</th>
                                       <th>Tên lớp</th>
                                       <th>Ngày đăng ký</th>
                                       <th>Ngày xác nhận</th>
                                </thead>                                
                                <tbody>
                                    @foreach($bookings as $booking)
                                    <tr id='booking-{{$booking->bid}}'>
                                        <td>{{$booking->bid}}</td>
                                        <td>{{$booking->user_name}}</td>
                                        <td>{{$booking->lophoc_name}}</td>
                                        <td>{{$booking->bcreated_at}}</td>
                                        <td>{{$booking->bupdated_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>{{$bookings->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

