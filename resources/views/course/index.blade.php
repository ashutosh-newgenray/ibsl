@extends('layouts.master')
@section('title', 'Users')

@section('content')
    <h3>Courses <a href="{{route('admin::user.create')}}" class="btn btn-info pull-right">Add User</a></h3>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <div ng-controller="UserCtrl">
                @if(Session::get('message'))
                    <p class="bg-message bg-success">{{Session::get('message')}}</p>
                @endif

            </div>
        </div>
    </div>
@endsection

