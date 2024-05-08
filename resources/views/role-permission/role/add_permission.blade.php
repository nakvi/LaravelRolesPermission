@extends('layouts.header')
@section('content')
<div class="container mt-5 ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                <script>
                    // Hide the success message after 5 seconds
                    setTimeout(function() {
                        $('#success-message').fadeOut('slow');
                    }, 5000);
                </script>
                @endif
                <div class="card-header">
                    <h2 >Role  : {{$role->name}}
                    <a href="{{url("permission")}}" class="btn btn-danger" style="float: right">Back</a>
                </h2>
                </div>
                <div class="card-body mt-5">
                      <h3 class="mt-5 mb-5 text-center">Update Role here</h3>
                    <form class="form-horizontal" action="{{url('role/'.$role->id.'/add-permission')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <div class="row">
                            @foreach ($permissions as $permission )
                            <div class="col-md-3">
                                <label>
                                <input type="checkbox"  id="name" name="permission[]" value="{{$permission->name}}"
                                {{in_array($permission->id, $rolePermissions) ? 'checked' : ''}}
                                />
                                {{$permission->name}}
                                </label>
                            </div>
                            @endforeach
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
