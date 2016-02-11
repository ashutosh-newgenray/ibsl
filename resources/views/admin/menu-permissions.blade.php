@extends('layouts.master')
@section('title', 'Users')

@section('content')
    <h2>Update Permissions</h2>
    <div class="row">
        <div class="col-sm-12">
            <div ng-controller="CollapseDemoCtrl">
            	<button type="button" class="btn btn-default" ng-click="isCollapsed = !isCollapsed">Toggle collapse</button>
            	<hr>
            	<div uib-collapse="isCollapsed">
            		<div class="well well-lg">
                        <div class="row">
                            <div class="col-sm-12">`
                                cources
                            </div>
                            <div class="col-sm-4">

                            </div>
                            <div class="col-sm-8">

                            </div>
                        </div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
@endsection

