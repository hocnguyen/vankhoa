<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">Van Khoa School <?php echo \App\Http\Controllers\StudentController::getYear() ; ?></a>
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
                @if(Auth::User()->role == \App\User::ROLE_ADMIN)
                <li class="{{ (Route::currentRouteName() == 'users')?"active":"" }}">
                    <a href="{{ url('/users') }}"><i class="fa fa-user-times fa-fw"></i> Teachers</a>
                </li>
                <li class="{{ (Route::currentRouteName() == 'grades')?"active":"" }}">
                    <a href="{{ url('/grades') }}"><i class="fa fa-table fa-fw"></i> Grades</a>
                </li>
                @endif
                <li class="{{ (Route::currentRouteName() == 'attendances')?"active":"" }}">
                    <a href="{{ url('/attendances') }}"><i class="fa fa-list-ul"></i> Attendances</a>
                </li>
                <li class="{{ (Route::currentRouteName() == 'formList')?"active":"" }}">
                    <a href="{{ url('/student/formList') }}"><i class="fa fa-users"></i>Students List</a>
                </li>
                <?php
                if (Auth::User()->role == \App\User::ROLE_ADMIN) { ?>
                    <li class="{{ (Route::currentRouteName() == 'histories')?"active":"" }}">
                        <a href="{{ url('/histories') }}"><i class="fa fa-list-ol"></i>Histories Login</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>