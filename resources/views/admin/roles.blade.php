@extends('layouts.master')
@section('title', 'Roles')

@section('content')
    <h3>ROLES
    @if(Auth::user()->can(['users-can-create-new']))
        <a href="{{route('admin::role.create')}}" class="btn btn-info pull-right">Add Role</a>
    @endif
   </h3>
    <div class="row">
        <div class="col-sm-12">
            <div ng-controller="UserCtrl" class="card">
                @if(Session::get('message'))
                    <p class="bg-message bg-success">{{Session::get('message')}}</p>
                @endif
                <table id="rolesTable" class="table table-striped responsive collapsed" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>#Id</th>
                              <th>Name</th>
                              <th>Display Name</th>
                              <th>Description</th>
                              <th>Created_at</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($roles as $role)
                          <tr>
                              <td>{{$role->id}}</td>
                              <td>{{$role->name}}</td>
                              <td>{{$role->display_name}}</td>
                              <td>{{$role->description}}</td>
                              <td>{{$role->created_at->format('d-M-Y')}}</td>
                              <td>
                                @if(Auth::user()->can(['roles-can-edit','roles-can-create-new']))
                                    <a class="inline-list-item" href="{{route('admin::role.edit',['id'=>$role->id])}}">Edit</a>
                                    <form class="inline-list-item" action="{{route('admin::role.destroy',['id'=>$role->id])}}" method="POST">
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

