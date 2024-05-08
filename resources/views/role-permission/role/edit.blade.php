@extends('layouts.header')
@section('content')
<div class="container mt-5 ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 >Role
                    <a href="{{url("permission")}}" class="btn btn-danger" style="float: right">Back</a>
                </h2>
                </div>
                <div class="card-body mt-5">
                      <h3 class="mt-5 mb-5 text-center">Update Role here</h3>
                    <form class="form-horizontal" action="{{url('role/'.$role->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="name">Role Name:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" style="float: right">Update</button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
