@extends('layouts.master')
@section('title', 'Users')

@section('content')
    <h3>Change Password</h3>
    <div class="row">
        <div class="col-sm-12">
            <div ng-controller="UserCtrl" class="card">
                <input type="hidden" name="_token" ng-model="userToken" value="<?php echo csrf_token(); ?>">
                <p class="bg-message bg-error" ng-if="errors.length > 0">
                <div ng-repeat="error in errors">
                    @{{error}}
                </div>
                </p>
                <p class="bg-message bg-success" ng-if="message">
                    @{{ message  }}
                </p>
                <table id="usersTable" class="table table-striped responsive collapsed" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>#Id</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Active</th>
                              <th>Roles</th>
                              <th>Created_at</th>
                              <th>Password</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($users as $user)
                          <tr>
                              <td>{{$user->id}}</td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>@if($user->is_active)Yes @else No @endif</td>
                              <td>@foreach($user->roles as $role) {{$role->display_name }} @endforeach</td>
                              <td>{{$user->created_at->format('d-M-Y')}}</td>
                              <td><input name="user[{{$user->id}}].password" ng-model="user[{{$user->id}}].password"></td>
                              <td><a ng-if="user[{{$user->id}}].password" ng-click="updateUserPassword('{{route('admin::user.password.update',['id'=>$user->id])}}',{{$user->id}})">update</a></td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
