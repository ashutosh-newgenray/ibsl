@extends('layouts.master')
@section('title', 'Users')

@section('content')
    <h3 class="text-center">Edit User</h3>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="card">
                @if(Session::get('message'))
                <p class="bg-message bg-success">{{Session::get('message')}}</p>
                @endif

                <form class="form-horizontal" action="{{route('admin::user.update',['id'=> $user->id])}}" method="POST">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="name" name="name" value="{{$user->name}}">
                          @if($errors->first('name'))<div class="error">{{ $errors->first('name') }}</div>@endif
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{$user->email}}">
                          @if($errors->first('email'))<div class="error">{{ $errors->first('email') }}</div>@endif
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputRoles" class="col-sm-2 control-label">Roles</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="inputRoles" name="roles[]" multiple>
                                @foreach($roles as $role)
                                   <option value="{{$role->id}}" @if($user->hasRole($role->name)) selected @endif>{{$role->display_name}}</option>
                                @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputStatus" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="inputStatus" name="is_active">
                              <option value="1" @if($user->is_active == 1) selected @endif>Active</option>
                              <option value="0" @if($user->is_active == 0) selected @endif>In Active</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-info">Update</button>
                        </div>
                      </div>
                </form>
            </div>
        </div>
    </div>
@endsection

