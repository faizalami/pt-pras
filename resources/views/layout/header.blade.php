<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>PRAS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">PT <b>PRAS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user()->profile)
                            <img src="{{ asset('uploads/photo/'.Auth::user()->profile->photo) }}" class="user-image"
                                 alt="User Image">
                        @else
                            <img src="{{ asset('images/default/user.png') }}" class="user-image"
                                 alt="User Image">
                        @endif
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">

                            @if(Auth::user()->profile)
                                <img src="{{ asset('uploads/photo/'.Auth::user()->profile->photo) }}" class="img-circle"
                                     alt="User Image">
                            @else
                                <img src="{{ asset('images/default/user.png') }}" class="img-circle"
                                     alt="User Image">
                            @endif

                            <p>
                                {{ Auth::user()->name }}
                                @if(Auth::user()->role == 1)
                                    <small>Admin</small>
                                @endif
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-default btn-flat" type="submit">Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
