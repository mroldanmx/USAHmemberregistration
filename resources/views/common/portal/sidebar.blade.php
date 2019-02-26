<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!--div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="{{ Auth::user()->name }}">
            </div>
            <div class="pull-left info">
                <p>
                    {{ Auth::user()->name }}
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div-->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i><span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.registrations.index') }}">
                    <i class="fa fa-list"></i>
                    <span>Members List</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.registrations.index') }}">
                    <i class="fa fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            <!--li class="treeview">
                <a href="{{ route('admin.pricing.index') }}">
                    <i class="fa fa-credit-card"></i>
                    <span>Pricing</span>
                    <span class="pull-right-container">
                       <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.pricing.index') }}"> Player/Coach - USAH</a></li>
                    <li><a href="{{ route('admin.pricing.index') }}"> Player/Coach - AFF</a></li>
                    <li><a href="{{ route('admin.pricing.index') }}"> Ice Official</a></li>
                    <li><a href="{{ route('admin.pricing.index') }}"> Ice Official - AFF</a></li>
                    <li><a href="{{ route('admin.pricing.index') }}"> Inline</a></li>
                    <li><a href="{{ route('admin.pricing.index') }}"> Allied</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.coupons.index') }}">
                    <i class="fa fa-user"></i>
                    <span>Coupons</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reports.index') }}">
                    <i class="fa fa-flag-o"></i>
                    <span>Reports</span>
                </a>
            </li-->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>