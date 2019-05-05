<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Route::current()->getName() == 'manager' ? 'active' : '' }}">
                <a href="{{route('admins.create')}}"><i class="fa fa-users" aria-hidden="true"></i>
                    <span>Add Users</span></a>
            </li>
            <li class="{{ Route::current()->getName() == 'manager' ? 'active' : '' }}">
                <a href="{{route('admins.index')}}"><i class="fa fa-users" aria-hidden="true"></i>
                    <span>List All Users</span></a>
            </li>
            <!-- <li class="{{ Route::current()->getName() == 'manager' ? 'active' : '' }}">
                <a href="#"><i class="fa fa-users" aria-hidden="true"></i>
                    <span>Update Users</span>
                </a>
            </li> -->
            <li class="{{ Route::current()->getName() == 'manager' ? 'active' : '' }}">
                <a href="{{route('admin.chart')}}"><i class="fa fa-line-chart" aria-hidden="true"></i>
                <!-- <i class="fas fa-chart-area"></i> -->
                    <span>Chart</span></a>
            </li>
        </ul>
    </section>
</aside>
