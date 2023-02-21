<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class=" sidemenu-logo">
        <a class="main-logo" href="{{ url('/status_image_category') }}">
            <img src="{{ asset('logo.jpg') }}" class="header-brand-img desktop-logo">
            <img src="{{ asset('logo.jpg') }}" class="header-brand-img icon-logo">
            <img src="{{ asset('logo.jpg') }}" class="header-brand-img desktop-logo theme-logo">
            <img src="{{ asset('logo.jpg') }}" class="header-brand-img icon-logo theme-logo">
        </a>
    </div>
    <div class="main-sidebar-body">
        <ul class="nav">
            <li class="nav-label">Dashboard</li>
            <li class="nav-item {{ @$title == 'dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/dashboard') }}"><i class="fe fe-airplay"></i><span
                        class="sidemenu-label">Dashboard</span></a>
            </li>
            <li class="nav-label">Status Image</li>
            <li class="nav-item {{ @$title == 'status_image_category' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/status_image_category') }}"><i class="fe fe-aperture"></i><span
                        class="sidemenu-label">Category</span></a>
            </li>
            <li class="nav-item {{ @$title == 'status_image' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/status_image') }}"><i class="fe fe-image"></i><span
                        class="sidemenu-label">Images</span></a>
            </li>
            <li class="nav-label">Status Video</li>
            <li class="nav-item {{ @$title == 'status_video_category' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/status_video_category') }}"><i class="fe fe-codepen"></i><span
                        class="sidemenu-label">Category</span></a>
            </li>
            <li class="nav-item {{ @$title == 'status_video' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/status_video') }}"><i class="fe fe-video"></i><span
                        class="sidemenu-label">Videos</span></a>
            </li>
            <li class="nav-label">User</li>
            <li class="nav-item {{ @$title == 'user' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/user') }}"><i class="fe fe-user"></i><span
                        class="sidemenu-label">Users</span></a>
            </li>
        </ul>
    </div>
</div>
