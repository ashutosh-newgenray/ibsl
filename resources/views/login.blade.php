@extends('layouts.master')
@section('title', 'Login')
@section('content')
<div class="login-page">
        <div class="container">
            <div class="login-wrapper">
                <h1 class="logo text-center"><img src="/assets/img/logo.jpg"></h1>
                <h2 class="text-center">Institute of British Sign Language</h2>
                @if (Session::has('message'))
                   <div class="alert alert-danger">{{ Session::get('message') }}</div>
                @endif
                <form class="form-inline text-center" role="form" method="POST" action="{{ route('post-login') }}">
                    {!! csrf_field() !!}
                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" name="email" placeholder="Enter your email address" value="{{ old('email') }}">
                      </div>
                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <input type="password" name="password" class="form-control" placeholder="Enter your password">
                        </div>
                      <button type="submit" class="btn btn-success btn-lg">Login!</button>
                </form>
                <div class="login-errors">
                    @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    @endif;
                </div>

            </div>
        </div>
    </div>
@endsection
