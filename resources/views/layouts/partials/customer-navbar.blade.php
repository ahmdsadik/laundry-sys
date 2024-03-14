<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center justify-content-between" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="بحث..."
                    aria-label="Search..." />
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center">

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('assets/img/avatars/user.png') }}" alt
                            class="w-px-40 h-auto rounded-circle pull-up" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/img/avatars/user.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle pull-up" />
                                    </div>
                                </div>
                                <div class="flex-grow-1" style="text-align:start;padding-right:15px">
                                    <span class="fw-medium d-block">{{ auth()->user()->name }}</span>
                                    <small class="text-muted">
                                        عميل
                                    </small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" style="text-align:start" href="{{ route('customer.profile.show') }}">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">ملفي الشخصي</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}" style="text-align:start"
                                onclick="event.preventDefault();
                            this.closest('form').submit();">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">تسجيل خروج</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>

<!-- / Navbar -->