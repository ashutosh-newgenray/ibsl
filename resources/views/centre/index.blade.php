@extends('layouts.master')
@section('title', 'Centres')

@section('content')
    <h3 class="text-center">CENTRES
    @if(Auth::user()->can(['centres-can-create-new']))
        <a href="{{route('centre.create')}}" class="btn btn-info pull-right">Create New Centre</a>
    @endif
    </h3>
    <hr>
    <div class="message">
        @if(Session::get('message'))
            <p class="bg-message bg-success">{{Session::get('message')}}</p>
        @endif
    </div>
    <div class="table-search">
        <form class="form-inline">
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="row">
                            <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="centerStatus" class="control-label text-left">Status</label>
                                        <select class="form-control" name="status">
                                            <option class="Pending">Pending</option>
                                            <option class="Active">Active</option>
                                            <option class="Closed">Closed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="centerRegion" class="control-label text-left">Ofqual Region</label>
                                        <select name="centerRegion" class="form-control">
                                            <option class="any">Any</option>
                                            @foreach($regions as $region)
                                                <option class="{{$region->id}}">{{$region->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="centerSignArea" class="control-label text-left">Sign Area</label>
                                        <select name="centerSignArea" class="form-control">
                                            <option value="Any">Any</option>
                                            @foreach($signAreas as $signArea)
                                                <option class="{{$signArea->id}}">{{$signArea->sign_area}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 search-box">
                        <div class="form-group">
                            <input type="text" class="form-control search-input" id="searchCentres" placeholder="search centres">
                            <button type="submit" id="searchCentresBtn" class="btn btn-default search-btn">Search</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>

    <div class="row">
        <div class="col-xs-12">
              <table id="centresTable" class="table table-bordered card no-padding" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Centre No</th>
                        <th>Centre Name</th>
                        <th>Post Code</th>
                        <th>Region</th>
                        <th>Sign Area</th>
                        <th>Po Regd</th>
                        <th>On Hold</th>
                        <th>Hold Reason</th>
                        <th>Status</th>
                        <th>#Cources</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($centres  as $centre)
                        <tr>
                            <td>{{$centre->id}}</td>
                            <td>{{$centre->name}}</td>
                            <td>{{$centre->accounts_postcode}}</td>
                            <td>{{$centre->region->name}}</td>
                            <td>{{$centre->signArea->sign_area}}</td>
                            <td>{{$centre->po_registered}}</td>
                            <td>{{$centre->on_hold  == 0 ? 'No' : 'Yes'}}</td>
                            <td>{{$centre->hold_reason}}</td>
                            <td>@if($status = $centre->status()->orderBy('created_at')->first()){{$status->pluck('status')[0]}}@endif</td>
                            <td>{{$centre->courses()->count()}}</td>
                            <td><a href="">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection

