@extends('layouts.master')
@section('title', 'Users')

@section('content')
    <form action="{{route('admin::role.permission.update',[ 'role' => $roleName])}}" method="POST">
        {{ csrf_field() }}
        <h3 class="text-center menu-permission" ng-init="showSaveBtn = false">
            <button ng-show="showSaveBtn" type="submit" class="btn btn-danger ">Save Changes</button>
             Update Menu Permissions</h3>
        <div class="row">
            <div class="col-sm-8">
                <ul class="list-unstyled card">
                    @foreach($menus as  $index => $menu)
                    <li>
                        <a ng-click="isCollapsed{{$menu->id}} = !isCollapsed{{$menu->id}}" ng-init="isCollapsed{{$menu->id}} = true"><i class="fa fa-caret-down" ng-class="{ 'fa-caret-down': isCollapsed{{$menu->id}}, 'fa-caret-right':!isCollapsed{{$menu->id}}  }"></i> {{$menu->display_name}}</a>
                        <div uib-collapse="!isCollapsed{{$menu->id}}" class="sub-list">
                            @foreach($menu->submenus as $submenu)
                            <div class="row">
                                <div class="col-sm-4">
                                    {{$submenu->display_name}}
                                </div>
                                <div class="col-sm-8">
                                    <label class="radio-inline" ng-mousedown='showSaveBtn = true'>
                                      <input type="radio" name="permission['{{$submenu->name}}']" value="{{$submenu->name}}-no-access" @if(in_array("$submenu->name-no-access",$permissions)) checked @endif> No Access
                                    </label>
                                    <label class="radio-inline" ng-mousedown='showSaveBtn = true'>
                                      <input type="radio" name="permission['{{$submenu->name}}']" value="{{$submenu->name}}-can-view" @if(in_array("$submenu->name-can-view",$permissions)) checked @endif> Can View
                                    </label>
                                    <label class="radio-inline" ng-mousedown='showSaveBtn = true'>
                                      <input type="radio" name="permission['{{$submenu->name}}']" value="{{$submenu->name}}-can-edit" @if(in_array("$submenu->name-can-edit",$permissions)) checked @endif> Can Edit
                                    </label>
                                    <label class="radio-inline" ng-mousedown='showSaveBtn = true'>
                                      <input type="radio" name="permission['{{$submenu->name}}']" value="{{$submenu->name}}-can-create-new" @if(in_array("$submenu->name-can-create-new",$permissions)) checked @endif> Can Create New
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <hr>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-4">
                <h4>Please select a Role</h4>
                <div class="list-group">
                    @foreach($roles as $role)
                        <a href="{{route('admin::role.permission',[ 'role' => $role->name])}}" class="list-group-item @if($roleName == $role->name) active @endif"> {{$role->display_name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </form>
@endsection

