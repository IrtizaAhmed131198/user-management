@if (!in_array(Route::currentRouteName(), ['login.show'])) {{-- hide for login page only --}}
<aside class="sidebar navbar-default" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="index.html" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            @if(Auth::user()->role_id == 1)
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('user.create') }}">Create</a>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}">View</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Auth::user()->role_id == 2)
                <li>
                    <a href="{{ route('user.edit', ['id' => Auth::user()->id]) }}"><i class="fa fa-wrench fa-fw"></i> Edit Profile</a>
                </li>
            @endif
        </ul>
    </div>
</aside>
<!-- /.sidebar -->
@endif
