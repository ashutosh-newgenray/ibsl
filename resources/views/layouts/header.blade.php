<nav class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" ng-init="navCollapsed = true" ng-click="navCollapsed = !navCollapsed">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="{{route('home')}}"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" uib-collapse="navCollapsed">
      <ul class="nav navbar-nav">
        <li><a href="{{route('home')}}">Home</a></li>
        <li class="dropdown" uib-dropdown >
          <a href="#" uib-dropdown-toggle   role="button">Courses<span class="caret"></span></a>
          <ul class="dropdown-menu" uib-dropdown-menu role="menu" aria-labelledby="split-button" >
            <li><a href="{{route('courses.index')}}">Courses</a></li>
            <li><a href="#">Register Learners</a></li>
            <li><a href="#">Course Certificates</a></li>
            <li><a href="#">Mark Unit Assessment</a></li>
            <li><a href="#">Unit Certificates</a></li>
            <li><a href="#">Unit Resit</a></li>
            <li><a href="#">Mark Unit Resit</a></li>
            <li><a href="#">Examiners</a></li>
          </ul>
        </li>
        <li class="dropdown" uib-dropdown >
          <a href="#" uib-dropdown-toggle  role="button">Centres<span class="caret"></span></a>
          <ul class="dropdown-menu" uib-dropdown-menu role="menu" aria-labelledby="split-button">
            <li><a href="{{route('centres.index')}}">Centres</a></li>
            <li><a href="#">Regions</a></li>
          </ul>
        </li>
        <li class="dropdown" uib-dropdown >
          <a href="#" uib-dropdown-toggle  role="button">Learners<span class="caret"></span></a>
          <ul class="dropdown-menu" uib-dropdown-menu  role="menu" aria-labelledby="split-button">
            <li><a href="#">Learners</a></li>
            <li><a href="#">Ethnic Codes</a></li>
          </ul>
        </li>
        <li class="dropdown" uib-dropdown >
          <a href="#" uib-dropdown-toggle  role="button">Qualifications<span class="caret"></span></a>
          <ul class="dropdown-menu" uib-dropdown-menu role="menu" aria-labelledby="split-button">
            <li><a href="#">Qualifications</a></li>
            <li><a href="#">Qualification Statistics</a></li>
            <li><a href="#">Qualification Units</a></li>
            <li><a href="#">Media</a></li>
            <li><a href="#">Signers</a></li>
            <li><a href="#">Sign Areas</a></li>
          </ul>
        </li>
        <li class="dropdown {{ Request::is('admin/*') ? 'active' : '' }}" uib-dropdown  >
          <a href="#" uib-dropdown-toggle  role="button">Admin<span class="caret"></span></a>
          <ul class="dropdown-menu" uib-dropdown-menu role="menu" aria-labelledby="split-button">
            <li class="{{ Route::currentRouteName() == 'admin::users.index' ? 'active' : '' }}"><a href="{{route('admin::users.index')}}">Users</a></li>
            <li class="{{ Route::currentRouteName() == 'admin::roles.index' ? 'active' : '' }}"><a href="{{route('admin::roles.index')}}">Roles</a></li>
            <li class="{{ Route::currentRouteName() == 'admin::users.password' ? 'active' : '' }}"><a href="{{route('admin::users.password')}}">Change Password</a></li>
            <li class="{{ Route::currentRouteName() == 'admin::role.permission' ? 'active' : '' }}"><a href="{{route('admin::role.permission',[ 'role' => 'admin'])}}">Update Menu Permissions</a></li>
          </ul>
        </li>
      </ul>
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
            @else
                <li cclass="dropdown" uib-dropdown >
                    <a href="#" class="dropdown-toggle" uib-dropdown-toggle role="button" aria-expanded="false">
                        {{ Auth::user()->name}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" uib-dropdown-menu role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>