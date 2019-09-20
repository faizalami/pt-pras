<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            @if(Auth::user()->role == 1)
            <li>
                <a href="{{ url('/admin/jobs') }}">
                    <i class="fa fa-th"></i> <span>Jobs Available</span>
                </a>
            </li>
            @elseif(Auth::user()->role == 0)
            <li>
                <a href="{{ url('/profile') }}">
                    <i class="fa fa-th"></i> <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/certifications') }}">
                    <i class="fa fa-th"></i> <span>Certifications</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/applications') }}">
                    <i class="fa fa-th"></i> <span>My Applications</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/jobs') }}">
                    <i class="fa fa-th"></i> <span>Jobs Available</span>
                </a>
            </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
