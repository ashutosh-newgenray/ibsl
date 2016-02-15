@extends('layouts.master')
@section('title', 'Not Authorized')
@section('head-style')
<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <style>
            .title {
               color: #B0BEC5;
               font-weight: 100;
               font-family: 'Lato';
               font-size: 72px;
               margin-bottom: 40px;
               text-align: center;
               padding-top: 10%;
            }
             .title a{text-decoration: none;}
             .title a .fa{
                    font-size: 38px;
                    vertical-align: middle;
             }
        </style>
@endsection
@section('content')
        <div class="title">You are not Authroized.<br>
            <a href="{{url('/')}}"> <i  class="fa fa-backward"></i> Home </a>
        </div>
@endsection

