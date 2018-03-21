@extends('layouts.app')

@section('content')

<div class="container">
    <section id="content">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <h1>{{trans('view.login-form')}}</h1>
            <div class="form-group{{$errors->has('email') ? 'has-error' : ''}}">
                <input type="text" placeholder="Email" name="email"/>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{$errors->has('password') ? 'has-error' : ''}}">
                <input type="password" placeholder="Mật khẩu" name="password"/>
                @if ($errors->has('password')) 
                    <span class="help-block">
                        <strong>{{ $errors->first('password')}}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="submit" value="{{trans('view.login')}}" />
            </div>
        </form>
    </section>
</div>

@endsection
