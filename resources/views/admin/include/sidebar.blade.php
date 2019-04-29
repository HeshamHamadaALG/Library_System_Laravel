<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Route::current()->getName() == 'dashboard' ? 'active' : '' }}">
            <!-- { { route('dashboard') }} -->
                <a href="#"><i class="fa fa-tachometer" aria-hidden="true"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="{{ Route::current()->getName() == 'manager' ? 'active' : '' }}">
                <a href="{{route('admin.index')}}"><i class="fa fa-picture-o" aria-hidden="true"></i>
                    <span>Manager</span></a>
            </li>
            <li class="{{ Route::current()->getName() == 'manager' ? 'active' : '' }}">
                <a href="{{route('admin.chart')}}"><i class="fa fa-line-chart" aria-hidden="true"></i>
                <!-- <i class="fas fa-chart-area"></i> -->
                    <span>Chart</span></a>
            </li>
        </ul>
    </section>
</aside>
