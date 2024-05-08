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
                    <h2 >User
                    <a href="{{url("user/create")}}" class="btn btn-primary" style="float: right">Add User</a>
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
                                    <th class="text-center" style="font-weight: bold;text-align:center">Id</th>
                                    <th class="text-center" style="font-weight: bold;text-align:center">Name</th>
                                    <th class="text-center" style="font-weight: bold;text-align:center">Email</th>
                                    <th class="text-center" style="font-weight: bold;text-align:center">Roles</th>
                                    <th class="text-center" style="font-weight: bold;text-align:center">Action</th>
                                </tr>
                            </thead>
                            <!--end::Thead-->
                            <!--begin::Tbody-->
                            <tbody class="fw-6  text-gray-600">
                                @foreach ($users as $user)
                                <tr @if ($loop->odd) class="bg-light  " @endif>
                                        <td class="border text-center" style="font-weight: bold;text-align:center">{{ $user->id }}</td>
                                        <td class="border text-center">{{ $user->name }}</td>
                                        <td class="border text-center">{{ $user->email }}</td>
                                        <td class="border text-center">
                                            @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as  $roleName)
                                            <label class="badge badge-success">{{ $roleName }}</label>

                                            @endforeach

                                            @endif
                                        </td>

                                        <td class="border text-center">
                                            <a href="{{ url('user/'.$user->id.'/edit') }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('user/'.$user->id.'/delete') }}" class="btn btn-danger">Delete</a>

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::Tbody-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table wrapper-->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#DataTable').DataTable();
    });
</script>
@endsection

