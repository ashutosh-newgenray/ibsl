@extends('layouts.master')
@section('title', 'Edit Role')

@section('content')
    <h3 class="text-center">Edit Role</h3>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="card">
                @if(Session::get('message'))
                <p class="bg-message bg-success">{{Session::get('message')}}</p>
                @endif

                <form class="form-horizontal" action="{{route('admin::role.update',['id'=> $role->id])}}" method="POST">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="inputName" placeholder="name" name="name" value="{{$role->name}}">
                          @if($errors->first('name'))<div class="error">{{ $errors->first('name') }}</div>@endif
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputDisplayName" class="col-sm-3 control-label">Display Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="inputDisplayName" placeholder="display name" name="display_name" value="{{$role->display_name}}">
                          @if($errors->first('email'))<div class="error">{{ $errors->first('inputDisplayName') }}</div>@endif
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputDescription" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="inputDescription" placeholder="Description" name="description" value="{{$role->description}}">
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

