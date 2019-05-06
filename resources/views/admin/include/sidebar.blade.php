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
            <li class="{{ Route::current()->getName() == 'manager' ? 'active' : '' }}">
                <a href="{{route('admins.chart')}}"><i class="fa fa-line-chart" aria-hidden="true"></i>
                <!-- <i class="fas fa-chart-area"></i> -->
                    <span>Chart</span></a>
            </li>
            <li class="{{ Route::current()->getName() == 'manager' ? 'active' : '' }}">
                <a href="{{route('categories.create')}}"><i class="fa fa-list-alt" aria-hidden="true"></i>
                    <span>Add Categories</span></a>
            </li>
            <li class="{{ Route::current()->getName() == 'manager' ? 'active' : '' }}">
                <a href="{{route('categories.index')}}"><i class="fa fa-list-alt" aria-hidden="true"></i>
                    <span>List All Categories</span></a>
            </li>
            <li class="{{ Route::current()->getName() == 'manager' ? 'active' : '' }}">
                <a href="{{route('adminbooks.create')}}"><i class="fa fa-book" aria-hidden="true"></i>
                    <span>Add Books</span></a>
            </li>
            <li class="{{ Route::current()->getName() == 'manager' ? 'active' : '' }}">
                <a href="{{route('adminbooks.index')}}"><i class="fa fa-book" aria-hidden="true"></i>
                    <span>List All Books</span></a>
            </li>
        </ul>
    </section>
</aside>
