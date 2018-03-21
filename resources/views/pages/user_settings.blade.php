@extends('layouts.header')

@section('content') 
            
<section id="contact-page">
    <div class="container">
        <div class="center">        
            <h2>Drop Your Message</h2>
            <p class="lead">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div> 
        <div class="group-tabs " style="padding-left: 105px;">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">{{trans('view.profile')}}</a></li>
            <li role="presentation"><a href="#booked" aria-controls="profile" role="tab" data-toggle="tab">{{trans('view.booked-list')}}</a></li>
            <li role="presentation"><a href="#coimingup" aria-controls="profile" role="tab" data-toggle="tab">{{trans('view.comingup-list')}}</a></li>
          </ul>
        </div>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="row contact-wrap"> 
                    <div class="status alert alert-success" style="display: none"></div>
                    <form action="{{ route('edit_user', $setting->id)}}" method="post" role="form">
                        {{ csrf_field() }}
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group">
                                <label>{{trans('view.user-name')}} </label>
                                <input type="text" name="user_name" class="form-control" required="required" value="{{ $setting->user_name }}">
                            </div>
                            <div class="form-group">
                                <label>{{trans('view.email')}} </label>
                                <input type="email" name="email" class="form-control" required="required" value="{{ $setting->email }}">
                            </div>
                            <div class="form-group">
                                <label>{{trans('view.user-address')}}</label>
                                <input type="text" class="form-control" value="{{ $setting->address }}"" name="address">
                            </div>
                            <div class="form-group">
                                <label>{{trans('view.phonenumber')}}</label>
                                <input type="text" name="Phonenumber" class="form-control" value="{{ $setting->phonenumber }}">
                            </div>                                                
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">{{trans('view.save-button')}}</button>     
                            </div>       
                        </div>
                        <div class="col-sm-5">                       
                        </div>
                    </form> 
                </div><!--/.row-->                
            </div>

            <div role="tabpanel" class="tab-pane" id="booked">
                  <table class="table">
                    <thead>
                        <tr>
                            <th>{{trans('view.class-name')}}</th>
                            <th>{{trans('view.subject')}}</th>
                            <th>{{trans('view.begin-at')}}</th>
                            <th>{{trans('view.class-status')}}</th>
                            <th>{{trans('view.payment')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($booking as $booking)
                        <tr>
                            <td>{{ $booking->lophoc_name }}</td>
                            <td></td>
                            <td>{{ $booking->begin_at }}</td>
                            <td>{{ $booking->status }}</td>
                            @if($booking->fee == 0)
                            <td>{{trans('view.unpaid')}}</td>
                            @else
                            <td>{{trans('view.paid')}}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="comingup">
                  <table class="table">
                    <thead>
                        <tr>
                            <th>{{trans('view.class-name')}}</th>
                            <th>{{trans('view.subject')}}</th>
                            <th>{{trans('view.begin-at')}}</th>
                            <th>{{trans('view.class-status')}}</th>
                            <th>{{trans('view.payment')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($booking as $booking)
                        <tr>
                            <td>{{ $booking->lophoc_name }}</td>
                            <td></td>
                            <td>{{ $booking->begin_at }}</td>
                            <td>{{ $booking->status }}</td>
                            @if($booking->fee == 0)
                            <td>{{trans('view.unpaid')}}</td>
                            @else
                            <td>{{trans('view.paid')}}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>                
    </div><!--/.container-->
</section><!--/#contact-page-->

@include('layouts.footer');

@endsection