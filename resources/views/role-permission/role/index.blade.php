@extends('layouts.header')
@section('content')
<div class="container mt-5 ">
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            <script>
                // Hide the success message after 5 seconds
                setTimeout(function() {
                    $('#success-message').fadeOut('slow');
                }, 5000);
            </script>
            @endif
            <div class="card">
                <div class="card-header">
                    <h2 >Role
                    <a href="{{url("role/create")}}" class="btn btn-primary" style="float: right">Add Role</a>
                </h2>
                </div>
                <div class="card-body">
                      <!--begin::Table wrapper-->
                      <div class="table-responsive p-5">
                        <!--begin::Table-->
                        <table id="DataTable"

                            class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9 table-hover">
                            <!--begin::Thead-->
                            <thead>
                                <tr class=" fw-bolder text-center text-uppercase" style="color:#0F5299">
                                    <th class="text-center" style="font-weight: bold;">Id</th>
                                    <th class="text-center" style="font-weight: bold;">Name</th>
                                    <th class="text-center" style="font-weight: bold;">Action</th>
                                </tr>
                            </thead>
                            <!--end::Thead-->
                            <!--begin::Tbody-->
                            <tbody class="fw-6  text-gray-600">
                                @foreach ($roles as $role)
                                <tr @if ($loop->odd) class="bg-light  " @endif>
                                        <td class="border text-center">{{ $role->id }}</td>
                                        <td class="border text-center">{{ $role->name }}</td>
                                        <td class="border text-center">
                                            <a href="{{ url('role/'.$role->id.'/give-permission') }}" class="btn btn-primary">Add / Edit Role Permission</a>

                                            <a href="{{ url('role/'.$role->id.'/edit') }}" class="btn btn-info">Edit</a>
                                            @can('delete role')
                                            <a href="{{ url('role/'.$role->id.'/delete') }}" class="btn btn-danger">Delete</a>
                                            @endcan
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::Tbody-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <div class="d-felx justify-content-center">

                        {{ $roles->links() }}

                    </div>
                    <!--end::Table wrapper-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
