@extends('layouts.master')
@section('title', 'Centres')

@section('content')
    <form action="{{route('centre.store')}}" class="form-horizontal" method="POST">
        {{ csrf_field() }}
        <h3 class="text-center">
        <button type="submit" class="btn btn-info pull-left">Save Changes</button>
        CREATE A CENTRE</h3>
        <div>
            @if(Session::get('message'))
                <p class="bg-message bg-success">{{Session::get('message')}}</p>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="form-group @if($errors->centre->first('name')) has-error @endif">
                        <label class="col-sm-3 control-label text-left">Centre Name</label>
                        <div class="col-sm-9">
                              <input type="text" class="form-control"  name="name" value="{{ old('name') }}">
                              <span class="error">{{$errors->centre->first('name')}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="centerRegion" class="col-sm-3 control-label text-left">Ofqual Region</label>
                        <div class="col-sm-9">
                            <select name="region_id" class="form-control" value="{{ old('region_id') }}">
                                <option class="">Any</option>
                                @foreach($regions as $region)
                                    <option class="{{$region->id}}">{{$region->name}}</option>
                                @endforeach
                            </select>
                            <span class="error">{{$errors->centre->first('region_id')}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="centerSignArea" class="col-sm-3 control-label text-left">Sign Area</label>
                        <div class="col-sm-9">
                            <select name="sign_area_id" class="form-control" value="{{old('sign_area_id')}}">
                                <option value="">Any</option>
                                @foreach($signAreas as $signArea)
                                    <option class="{{$signArea->id}}">{{$signArea->sign_area}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                      <div class="form-group">
                        <label class="col-sm-3 control-label text-left">Date Registered</label>
                        <div class="col-sm-9">
                              <input type="date" class="form-control"  name="date">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label text-left">Status</label>
                        <div class="col-sm-9">
                              <label class="radio-inline">
                                <input type="radio" name="centerStatus" value="Pending"> Pending
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="centerStatus"  value="Active"> Active
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="centerStatus" value="Closed"> Closed
                              </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label text-left">Active</label>
                        <div class="col-sm-9">
                              <label class="radio-inline">
                                <input type="radio" name="centerActive" value="Pending"> Yes
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="centerActive"  value="Active"> No
                              </label>
                        </div>
                      </div>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                      <uib-tabset >
                        <uib-tab heading="Primary">
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Admin Address</label>
                                <div class="col-sm-9">
                                      <textarea type="date" class="form-control"  name="admin_address_1"></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Admin Post code</label>
                                <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="admin_postcode_1">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Admin Contact</label>
                                <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="admin_contact_1">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Admin Email</label>
                                <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="admin_email_1">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Admin Phone</label>
                                <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="admin_phone_1">
                                </div>
                              </div>
                        </uib-tab>
                        <uib-tab heading="Alternate">
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Admin Address</label>
                                <div class="col-sm-9">
                                      <textarea type="date" class="form-control"  name="admin_address_2"></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Admin Post code</label>
                                <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="admin_postcode_2">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Admin Contact</label>
                                <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="admin_contact_2">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Admin Email</label>
                                <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="admin_email_2">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Admin Phone</label>
                                <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="admin_phone_2">
                                </div>
                              </div>
                        </uib-tab>
                        <uib-tab heading="Accounts">
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Account Address</label>
                                <div class="col-sm-9">
                                      <textarea type="date" class="form-control"  name="accounts_address"></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Account Post code</label>
                                <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="accounts_postcode">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Account Contact</label>
                                <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="accounts_contact">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Account Email</label>
                                <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="accounts_email">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label text-left">Account Phone</label>
                                <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="accounts_phone">
                                </div>
                              </div>
                        </uib-tab>
                    </uib-tabset>
                 </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                      <div class="form-group">
                        <label class="col-sm-3 control-label text-left">PO Registered</label>
                        <div class="col-sm-9">
                              <label class="radio-inline">
                                <input type="radio" name="po_registered" value="Pending"> Yes
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="po_registered"  value="Active"> No
                              </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label text-left">On Hold?</label>
                        <div class="col-sm-9">
                              <label class="radio-inline">
                                <input type="radio" name="on_hold" value="Pending"> Yes
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="on_hold"  value="Active"> No
                              </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label text-left">On Hold?</label>
                        <div class="col-sm-9">
                            <textarea name="hold_reason" class="form-control">

                            </textarea>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </form>
@endsection

