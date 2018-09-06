<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('inc.headers')
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        @include('inc.navbar')
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{url('/img/avatar5.png')}}" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>{{ Auth::user()->name }}</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> HR</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li><a href="{{url('/')}}"><i class="fa fa-angle-double-right"></i> Employee List</a></li>
                        <li><a href="{{url('/attendance')}}"><i class="fa fa-angle-double-right"></i> Employee's Attendance</a></li>
                        <li><a href="{{url('/report')}}"><i class="fa fa-angle-double-right"></i> Employee's Report</a></li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <aside class="right-side">
                <h1 class="content-header page-header">
                    @yield('page_header')
                </h1>
                <div class="row">
                    @yield('filters')
                </div>
                <div class="row">
                    @yield('content')
                </div>
            </aside>
        </div><!-- ./wrapper -->

        @include('inc.scripts')        

    </body>
</html>