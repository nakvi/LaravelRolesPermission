@extends('layouts.header')
@section('content')
<div class="container mt-5 ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 >User
                    <a href="{{url("user")}}" class="btn btn-danger" style="float: right">Back</a>
                </h2>
                </div>
                <div class="card-body mt-5">
                      <h3 class="mt-5 mb-5 text-center">Update User</h3>
                    <form class="form-horizontal" action="{{url('user/'.$user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="name">User Name:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">User Eamil:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-sm-2" for="name">User Password:</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="email" name="password" placeholder="Enter password">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="name">User Role </label>
                            <div class="col-sm-10">
                              <select  class="form-control"  id="email" name="role[]" multiple>
                                <option disabled>Select Role</option>
                                @foreach ($roles as $role  )
                                <option value="{{$role}}"
                                {{in_array($role,$userRoles) ? 'Selected' : ''}}
                                >
                                    {{$role}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Update</button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
