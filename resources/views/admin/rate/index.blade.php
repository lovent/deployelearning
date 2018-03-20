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
                            <th>Tên lớp</th>
                            <th>Số lượt đánh gía</th>
                            <th>Điểm số TB</th>
                        </thead>                                
                        <tbody>
                            @foreach($lophocs as $lophoc)
                            <tr id='lophoc-{{$lophoc->lid}}'>
                                <td>{{$lophoc->lid}}</td>
                                <td><a href="{{route('ratelist', ['id'=> $lophoc->lid])}}">{{$lophoc->lophoc_name}}</a></td>
                                <td>{{$lophoc->rates_count}} Lượt</td>
                                <td>{{$lophoc->avgPoint}} Điểm</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        <div>{{$lophocs->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
