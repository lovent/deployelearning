@extends('layouts.app')

@section('content')

<div class="container">
    <section id="content">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <h1>{{trans('view.register-form')}}</h1>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" placeholder="Họ tên" name="user_name" required autofocus/>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{$errors->has('email') ? 'has-error' : ''}}">
                <input type="text" placeholder="Email" name="email"/>
                @if ($errors->has('email')) 
                    <span class="help-block">
                        <strong>{{ $errors->first('email')}}</strong>
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
                <input placeholder="Nhập lại mật khẩu" type="password" name="password_confirm" required>
            </div>

            <div class="form-group">
                <input type="submit" value="{{trans('view.register')}}" />
            </div>
        </form>
    </section>
</div>
@endsection
