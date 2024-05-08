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
                    <h2  class="text-center" >User Role And Permissions Management</h2>

                </div>
                <div class="card-body">
                      <!--begin::Table wrapper-->

                    <!--end::Table wrapper-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
