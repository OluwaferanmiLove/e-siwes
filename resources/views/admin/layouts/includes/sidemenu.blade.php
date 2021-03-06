<div class="dashboard-sidebar">
    <div class="dashboard-nav-trigger">
        <div class="dashboard-nav-trigger-btn">
            <i class="la la-bars"></i> Dashboard Navigation
        </div>
    </div>
    <div class="dashboard-nav-container">
        <div class="humburger-menu">
            <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
        </div><!-- end humburger-menu -->
        <div class="side-menu-wrap">
            <ul class="side-menu-ul">
                <li class="{{ request()->is('admin')  ? 'page-active' : '' }}"><a href="{{ url('admin') }}"><i class="la la-dashboard icon-element"></i> Dashboard</a></li>

                <li class="{{ request()->is('admin/manage-siwes*')  ? 'page-active' : '' }}">
                    <a href="{{ route('admin_manage_siwes') }}">
                        <i class="la la-book icon-element"></i> Manage Siwes
                    </a>
                </li>

                <li class="{{ request()->is('admin/schools*') || request()->is('admin/view-school*') || request()->is('admin/edit-school*') || request()->is('admin/create-school')  ? 'page-active' : '' }}">
                    <a href="#"><i class="la la-book icon-element"></i> Schools <span class="la la-caret-down btn-toggle"></span></a>
                    <ul class="dropdown-menu-item">
                        <li><a href="{{ url('admin/schools') }}"> All Schools</a></li>
                        <li><a href="{{ url('admin/create-school') }}"> Add New School</a></li>
                    </ul>
                </li>

                <li class="{{ request()->is('admin/departments') || request()->is('admin/create-department') || request()->is('admin/edit-department*') || request()->is('admin/view-dept-level*') || request()->is('admin/view-department*') || request()->is('admin/edit-department*')  ? 'page-active' : '' }}">
                    <a href="#"><i class="la la-book icon-element"></i> Departments <span class="la la-caret-down btn-toggle"></span></a>
                    <ul class="dropdown-menu-item">
                        <li><a href="{{ url('admin/departments') }}"> All Departments</a></li>
                        <li><a href="{{ url('admin/create-department') }}"> Add New Department</a></li>
                    </ul>
                </li>
                <li class="{{ request()->is('admin/supervisors*') || request()->is('admin/add-supervisor*') || request()->is('admin/edit-supervisor*') || request()->is('admin/view-supervisor*')  ? 'page-active' : '' }}">
                    <a href="#"><i class="la la-user icon-element"></i> Supervisors <span class="la la-caret-down btn-toggle"></span></a>
                    <ul class="dropdown-menu-item">
                        <li><a href="{{ url('admin/supervisors') }}"> All Supervisors</a></li>
                        <li><a href="{{ url('admin/add-supervisor') }}"> Add New Supervisor</a></li>
                    </ul>
                </li>


                <li class="{{ request()->is('admin/students*') || request()->is('admin/create-student') || request()->is('admin/edit-student*') || request()->is('admin/view-student*')  ? 'page-active' : '' }}">
                    <a href="#"><i class="la la-users icon-element"></i> Students <span class="la la-caret-down btn-toggle"></span></a>
                    <ul class="dropdown-menu-item">
                        <li><a href="{{ url('admin/students') }}"> All Students</a></li>
                        <li><a href="{{ url('admin/create-student') }}"> Add New Student</a></li>
                    </ul>
                </li>

                <!-- <li class="{{ request()->is('admin/course*') || request()->is('admin/create-course') || request()->is('admin/edit-course*') || request()->is('admin/view-course*')  ? 'page-active' : '' }}">
                    <a href="#"><i class="la la-book icon-element"></i> Courses <span class="la la-caret-down btn-toggle"></span></a>
                    <ul class="dropdown-menu-item">
                        <li><a href="{{ url('admin/courses') }}"> All Courses</a></li>
                        <li><a href="{{ url('admin/create-course') }}"> Add New Course</a></li>
                    </ul>
                </li> -->

                <!-- <li class="{{ request()->is('admin/assignments*') ? 'page-active' : '' }}"><a href="{{ url('admin/assignments') }}"><i class="la la-book icon-element"></i> Assignments</a></li> -->

                <li class="{{ request()->is('admin/profile*') || request()->is('admin/change-password*')  ? 'page-active' : '' }}">
                    <a href="#"><i class="la la-gear icon-element"></i> Settings <span class="la la-caret-down btn-toggle"></span></a>
                    <ul class="dropdown-menu-item">
                        <li><a href="{{ url('admin/profile') }}">Edit Profile</a></li>
                        <li><a href="{{ url('admin/change-password') }}">Change Password</a></li>
                    </ul>
                </li>

                <li><a href="{{ url('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <i class="la la-power-off icon-element"></i> Logout
                    </a></li>
            </ul>
        </div><!-- end side-menu-wrap -->
    </div>
</div><!-- end dashboard-sidebar -->