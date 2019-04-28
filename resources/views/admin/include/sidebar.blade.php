<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Route::current()->getName() == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="{{ Route::current()->getName() == 'manager' ? 'active' : '' }}">
                <a href="{{route('manager')}}"><i class="fa fa-picture-o" aria-hidden="true"></i>
                    <span>Manager</span></a>
            </li>
        </ul>
    </section>
</aside>
