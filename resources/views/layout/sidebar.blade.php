<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            @if (setting()->logo)
                <img src="/upload/{{ setting()->logo }}" alt="" width="80px">
            @endif
            <img src="/upload/default.png" alt="" width="80px">
        </div>
        <div class="sidebar-brand-text">{{ setting()->name_short }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brs"
            aria-expanded="true" aria-controls="brs">
            <i class="fas fa-fw fa-users"></i>
            <span>বিআরএস</span>
        </a>
        <div id="brs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html"><i class="fas fa-fw fa-arrow-right mr-2"></i> নতুন বিআরএস</a>
                <a class="collapse-item" href="cards.html"><i class="fas fa-fw fa-arrow-right mr-2"></i> বিআরএস তালিকা</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sa"
            aria-expanded="true" aria-controls="sa">
            <i class="fas fa-fw fa-users"></i>
            <span>এসএ</span>
        </a>
        <div id="sa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html"><i class="fas fa-fw fa-arrow-right mr-2"></i> নতুন এসএ</a>
                <a class="collapse-item" href="cards.html"><i class="fas fa-fw fa-arrow-right mr-2"></i> এসএ তালিকা</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cs"
            aria-expanded="true" aria-controls="cs">
            <i class="fas fa-fw fa-users"></i>
            <span>সিএস</span>
        </a>
        <div id="cs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html"><i class="fas fa-fw fa-arrow-right mr-2"></i> নতুন সিএস</a>
                <a class="collapse-item" href="cards.html"><i class="fas fa-fw fa-arrow-right mr-2"></i> সিএস তালিকা</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dolil"
            aria-expanded="true" aria-controls="dolil">
            <i class="fas fa-fw fa-users"></i>
            <span>দলিল</span>
        </a>
        <div id="dolil" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html"><i class="fas fa-fw fa-arrow-right mr-2"></i> নতুন দলিল</a>
                <a class="collapse-item" href="cards.html"><i class="fas fa-fw fa-arrow-right mr-2"></i> দলিল তালিকা</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dag"
            aria-expanded="true" aria-controls="dag">
            <i class="fas fa-fw fa-users"></i>
            <span>দাগ নং</span>
        </a>
        <div id="dag" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html"><i class="fas fa-fw fa-arrow-right mr-2"></i> নতুন দাগ নং</a>
                <a class="collapse-item" href="cards.html"><i class="fas fa-fw fa-arrow-right mr-2"></i> দাগ নং তালিকা</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link {{ Request::is('setting*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
            data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-wrench"></i>
            <span>সেটিংস</span>
        </a>
        <div id="collapsePages" class="collapse {{ Request::is('setting*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('setting/division') ? 'active' : '' }}"
                    href="{{ route('division.index') }}">
                    <i class="fas fa-fw fa-arrow-right mr-2"></i>বিভাগ</a>
                <a class="collapse-item {{ Request::is('setting/district') ? 'active' : '' }}"
                    href="{{ route('district.index') }}">
                    <i class="fas fa-fw fa-arrow-right mr-2"></i>জেলা</a>
                <a class="collapse-item {{ Request::is('setting/upazila') ? 'active' : '' }}"
                    href="{{ route('upazila.index') }}">
                    <i class="fas fa-fw fa-arrow-right mr-2"></i>থানা</a>
                <a class="collapse-item {{ Request::is('setting/mouja') ? 'active' : '' }}"
                    href="{{ route('mouja.index') }}">
                    <i class="fas fa-fw fa-arrow-right mr-2"></i>মৌজা</a>
                <a class="collapse-item {{ Request::is('setting/jlno') ? 'active' : '' }}"
                    href="{{ route('jlno.index') }}">
                    <i class="fas fa-fw fa-arrow-right mr-2"></i>জেএলনং</a>
                <a class="collapse-item {{ Request::is('setting/role') ? 'active' : '' }}"
                    href="{{ route('plottype.index') }}">
                    <i class="fas fa-fw fa-arrow-right mr-2"></i>জমির শ্রেনী</a>
                <a class="collapse-item {{ Request::is('setting/role') ? 'active' : '' }}"
                    href="{{ route('role.index') }}">
                    <i class="fas fa-fw fa-arrow-right mr-2"></i>ভূমিকা</a>
                <a class="collapse-item {{ Request::is('setting/user') ? 'active' : '' }}"
                    href="{{ route('user.index') }}">
                    <i class="fas fa-fw fa-arrow-right mr-2"></i>ব্যবহারকারী</a>
                <a class="collapse-item {{ Request::is('setting/site_setting') ? 'active' : '' }}"
                    href="{{ route('site_setting.index') }}"> <i class="fas fa-fw fa-arrow-right mr-2"></i>Site
                    Setting</a>
            </div>
        </div>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
