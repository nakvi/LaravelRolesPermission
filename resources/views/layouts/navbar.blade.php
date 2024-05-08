<nav class="navbar navbar-default container mt-5">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{url('/')}}">Laravel Role and Permission</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="{{url('permission')}}">Permission</a></li>
        <li><a href="{{url('role')}}">Role</a></li>
        <li><a href="{{url('user')}}">User</a></li>
        @guest
        <li><a href="{{ url('login') }}">Login</a></li>
        <li><a href="{{ url('register') }}">Register</a></li>
    @else
        <li class="dropdown">
            <button style="margin-top:10px" class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="text-align: center;">
                <button class="btn btn-primary dropdown-item " href="{{ url('profile.edit') }}" style="margin:10px">Profile</button>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST" class="form-horizontal">
                    @csrf
                    <button type="submit" class="btn btn-danger dropdown-item" style="margin:10px">Logout</button>
                </form>
            </div>
        </li>
    @endguest

      </ul>
    </div>
  </nav>
