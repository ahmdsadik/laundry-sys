<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand justify-content-center demo">
        <a href="{{ route('overview') }}" class="app-brand-link">
            <img src="{{ asset('assets/img/logo.webp') }}" style="width: 160px" alt="">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->

        <a href="{{ route('overview') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Dashboards">نظرة عامة</div>
        </a>
        </li>

        {{-- user --}}
        @if (auth()->user()->isAdmin())
            <li class="mt-2 menu-item {{ activeMainLi('users.*') }}">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class='bx bxs-user me-3'></i>
                    <div>الموظفون</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ activeChildLi('users.index') }}">
                        <a href="{{ route('users.index') }}" class="menu-link">
                            <div>قائمة الموظفون</div>
                        </a>
                    </li>
                    <li class="menu-item {{ activeChildLi('users.create') }}">
                        <a href="{{ route('users.create') }}" class="menu-link">
                            <div>إضافة موظف</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        {{-- customer --}}
        <li class="mt-2 menu-item {{ activeMainLi('customers.*') }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class='bx bxs-customer me-3'></i>
                <div>العملاء</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ activeChildLi('customers.index') }}">
                    <a href="{{ route('customers.index') }}" class="menu-link">
                        <div>قائمة العملاء</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- item --}}
        @if (auth()->user()->isAdmin())
            <li class="mt-2 menu-item {{ activeMainLi('items.*') }}">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class='bx bxs-user me-3'></i>
                    <div>الاصناف</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ activeChildLi('items.index') }}">
                        <a href="{{ route('items.index') }}" class="menu-link">
                            <div>قائمة الاصناف</div>
                        </a>
                    </li>
                    <li class="menu-item {{ activeChildLi('items.create') }}">
                        <a href="{{ route('items.create') }}" class="menu-link">
                            <div>إضافة صنف</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</aside>
