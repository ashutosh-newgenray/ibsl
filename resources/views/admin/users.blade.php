@extends('layouts.master')
@section('title', 'Users')

@section('content')
    <h3>USER AND ROLES <a href="{{route('admin::user.create')}}" class="btn btn-info pull-right">Add User</a></h3>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <div ng-controller="UserCtrl">
                @if(Session::get('message'))
                    <p class="bg-message bg-success">{{Session::get('message')}}</p>
                @endif
                <table id="usersTable" class="table table-striped display responsive nowrap dataTable no-footer dtr-inline collapsed" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>#Id</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Active</th>
                              <th>Roles</th>
                              <th>Created_at</th>
                              <th class="sorting_disabled">Action</th>
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
                              <td>
                                @if(Auth::user()->can(['users-can-edit','users-can-create-new']))
                                    <a href="{{route('admin::user.edit',['id'=>$user->id])}}">edit</a>
                                    <form class="inline-list-item" action="{{route('admin::user.destroy',['id'=>$user->id])}}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn-link error">Delete</button>
                                    </form>

                                @endif
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection

