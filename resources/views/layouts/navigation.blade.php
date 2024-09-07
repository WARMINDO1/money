<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-home') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li>
    @role('Admin')
        <li class="nav-group" aria-expanded="false">
            <a class="nav-link nav-group-toggle">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-list') }}"></use>
                </svg>
                User Management
            </a>
            <ul class="nav-group-items" style="height: auto;">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg>
                        {{ __('Users') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-group') }}"></use>
                        </svg>
                        {{ __('Roles') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('permissions*') ? 'active' : '' }}"
                        href="{{ route('permissions.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
                        </svg>
                        {{ __('Permissions') }}
                    </a>
                </li>
            </ul>
        </li>
    @endrole
    {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            {{ __('Users') }}
        </a>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-group') }}"></use>
            </svg>
            {{ __('Roles') }}
        </a>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('permissions*') ? 'active' : '' }}"
            href="{{ route('permissions.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
            </svg>
            {{ __('Permissions') }}
        </a>
    </li> --}}

    @role('Admin')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('currencies*') ? 'active' : '' }}" href="{{ route('currencies.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-money') }}"></use>
                </svg>
                {{ __('Currency') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('pairs*') ? 'active' : '' }}" href="{{ route('pairs.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-paperclip') }}"></use>
                </svg>
                {{ __('Currency Pair') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-paperclip') }}"></use>
                </svg>
                {{ __('Rate') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-paperclip') }}"></use>
                </svg>
                {{ __('History Rates') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('sources*') ? 'active' : '' }}" href="{{ route('sources.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-chart') }}"></use>
                </svg>
                {{ __('Source') }}
            </a>
        </li>
    @endrole

    {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('pairs*') ? 'active' : '' }}" href="{{ route('pairs.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-paperclip') }}"></use>
            </svg>
            {{ __('Currency Pair') }}
        </a>
    </li> --}}

    {{-- <li class="nav-group" aria-expanded="false">
        <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-star') }}"></use>
            </svg>
            Two-level menu
        </a>
        <ul class="nav-group-items" style="height: 0px;">
            <li class="nav-item">
                <a class="nav-link" href="#" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-bug') }}"></use>
                    </svg>
                    Child menu
                </a>
            </li>
        </ul>
    </li> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navGroupToggles = document.querySelectorAll(".nav-group-toggle");
            const navGroupItems = document.querySelectorAll(".nav-group-items");

            navGroupToggles.forEach(function(toggle, index) {
                toggle.addEventListener("click", function() {
                    const isExpanded = toggle.getAttribute("aria-expanded") === "true";
                    toggle.setAttribute("aria-expanded", !isExpanded);

                    const groupItems = navGroupItems[index];
                    groupItems.style.height = isExpanded ? "0" : "auto";
                });

                const isDropdownOpen = /* Ambil status dari sesi atau cookie */ ;

                if (isDropdownOpen) {
                    navGroupItems[index].style.height = "auto";
                    toggle.setAttribute("aria-expanded", "true");
                }
            });
        });
    </script> --}}
</ul>
