<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class=" sidemenu-logo">
        <a class="main-logo" href="{{ url('/dashboard') }}">
            <img src="" class="header-brand-img desktop-logo">
            <img src="" class="header-brand-img icon-logo">
            <img src="" class="header-brand-img desktop-logo theme-logo">
            <img src="" class="header-brand-img icon-logo theme-logo">
        </a>
    </div>
    <div class="main-sidebar-body">
        <ul class="nav">
            @if (Auth::User()->id == '1')
                <li class="nav-label">Dashboard</li>
                <li class="nav-item {{ @$title == 'dashboard' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/dashboard') }}"><i class="fe fe-airplay"></i><span
                            class="sidemenu-label">Dashboard</span></a>
                </li>
            @endif
            <li class="nav-label">Image</li>
            <li class="nav-item {{ @$title == 'image_category' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/image_category') }}"><i class="fe fe-aperture"></i><span
                        class="sidemenu-label">Category</span></a>
            </li>
            <li class="nav-item {{ @$title == 'images' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/images') }}"><i class="fe fe-image"></i><span
                        class="sidemenu-label">Images</span></a>
            </li>
            <li class="nav-label">Video</li>
            <li class="nav-item {{ @$title == 'video_category' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/video_category') }}"><i class="fe fe-codepen"></i><span
                        class="sidemenu-label">Category</span></a>
            </li>
            <li class="nav-item {{ @$title == 'videos' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/videos') }}"><i class="fe fe-video"></i><span
                        class="sidemenu-label">Videos</span></a>
            </li>
            @if (Auth::User()->id == '1')
                <li class="nav-label">User</li>
                <li class="nav-item {{ @$title == 'user' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/user') }}"><i class="fe fe-user"></i><span
                            class="sidemenu-label">Users</span></a>
                </li>
            @endif
        </ul>
    </div>
</div>
