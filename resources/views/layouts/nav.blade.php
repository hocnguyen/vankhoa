<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">Van Khoa School <?php echo date("Y"); ?></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{ url('/profile') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="{{ url('/settings') }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav in" id="side-menu">
                <li class="&quot;active&quot;">
                    <a href="/" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href=""><i class="fa fa-user-times fa-fw"></i> Teachers</a>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href=""><i class="fa fa-table fa-fw"></i> Grades</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Students<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="{{ (Route::currentRouteName() == 'students')?"active":"" }}">
                            <a href="{{ url('/histories') }}">Students List</a>
                        </li>
                        <li class="{{ (Route::currentRouteName() == 'attendance')?"active":"" }}">
                            <a href="{{ url('/histories') }}">Make Attendance</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> Manage<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="{{ (Route::currentRouteName() == 'histories')?"active":"" }}">
                            <a href="{{ url('/histories') }}">Histories Login</a>
                        </li>
                        <li class="{{ (Route::currentRouteName() == 'users')?"active":"" }}">
                            <a href="{{ url('/users') }}">Users</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>