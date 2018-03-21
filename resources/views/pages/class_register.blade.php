@extends('layouts.header')

@section('content')

<section id="contact-page">
    <div class="container">
        <div class="center">        
            <h2>Drop Your Message</h2>
            <p class="lead">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div> 
        <div class="row contact-wrap"> 
            <div class="status alert alert-success" style="display: none"></div>
            {!! Form::open(array('route' => 'addbook', 'class' => '')) !!}
                {{ csrf_field() }}
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                        <label>Name *</label>
                        {!! Form::text('name', Auth::user()->user_name, ['class' => 'form-control',]) !!}
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        {!! Form::text('email', Auth::user()->email, ['class' => 'form-control',]) !!}
                    </div>                        
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Message *</label>
                        {!! Form::textarea('message', null, ['class' => 'form-control', 'rows'=>"8"]) !!}
                    </div>                        
                    <div class="form-group">
                        {!! Form::submit('Submit Message', ['class' => 'button btn btn-primary btn-lg']) !!}
                    </div>
                </div>
            </form> 
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->


@include('layouts.footer');

@endsection
