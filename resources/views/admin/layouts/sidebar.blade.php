<div class="py-4">
    <div class="text-center mb-4">
        <img src="https://thenightmarketer.com/assets/images/logo.png" alt="The Night Marketer" style="max-width: 150px;" onerror="this.style.display='none'">
        <h5 class="text-white mt-2">TNM & CRM Admin</h5>
    </div>

    <ul class="nav flex-column">
        <!-- Dashboard (Always visible) -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
        </li>

        <!-- Category with submenu -->
        @if(can_access('Service Categories', 'view') || can_access('Blog Categories', 'view'))
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#categoryMenu" role="button" aria-expanded="{{ request()->routeIs('categories.*') || request()->routeIs('blog-category*') ? 'true' : 'false' }}">
                <i class="fas fa-th-large me-2"></i> Category
                <i class="fas fa-chevron-down float-end mt-1"></i>
            </a>
            <div class="collapse {{ request()->routeIs('categories.*') || request()->routeIs('blog-category*') ? 'show' : '' }}" id="categoryMenu">
                <ul class="nav flex-column ms-3">
                    @if(can_access('Service Categories', 'view'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                            <i class="fas fa-tags me-2"></i> Service Categories
                        </a>
                    </li>
                    @endif
                    @if(can_access('Blog Categories', 'view'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('blog-category-list') ? 'active' : '' }}" href="{{ route('blog-category-list') }}">
                            <i class="fas fa-folder me-2"></i> Blog Categories
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif

        <!-- Blogs -->
        @if(can_access('Blogs', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('blog-list') || request()->routeIs('blog-*') ? 'active' : '' }}" href="{{ route('blog-list') }}">
                <i class="fas fa-blog me-2"></i> Blogs
            </a>
        </li>
        @endif

        <!-- Services -->
        @if(can_access('Services', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">
                <i class="fas fa-concierge-bell me-2"></i> Services
            </a>
        </li>
        @endif

        <!-- Manage Career with submenu -->
        @if(can_access('Careers', 'view') || can_access('Departments', 'view') || can_access('Job Types', 'view'))
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#careerMenu" role="button" aria-expanded="{{ request()->routeIs('career*') || request()->routeIs('departments.*') || request()->routeIs('types.*') ? 'true' : 'false' }}">
                <i class="fas fa-briefcase me-2"></i> Manage Career
                <i class="fas fa-chevron-down float-end mt-1"></i>
            </a>
            <div class="collapse {{ request()->routeIs('career*') || request()->routeIs('departments.*') || request()->routeIs('types.*') ? 'show' : '' }}" id="careerMenu">
                <ul class="nav flex-column ms-3">
                    @if(can_access('Careers', 'view'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('career-list') ? 'active' : '' }}" href="{{ route('career-list') }}">
                            <i class="fas fa-list me-2"></i> Career List
                        </a>
                    </li>
                    @endif
                    @if(can_access('Departments', 'view'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}" href="{{ route('departments.index') }}">
                            <i class="fas fa-building me-2"></i> Departments
                        </a>
                    </li>
                    @endif
                    @if(can_access('Job Types', 'view'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('types.*') ? 'active' : '' }}" href="{{ route('types.index') }}">
                            <i class="fas fa-layer-group me-2"></i> Types
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif

        <!-- Pages Meta -->
        @if(can_access('Pages Meta', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('pagemeta.*') ? 'active' : '' }}" href="{{ route('pagemeta.index') }}">
                <i class="fas fa-file-code me-2"></i> Pages Meta
            </a>
        </li>
        @endif

        <!-- Team -->
        @if(can_access('Team', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('team.*') ? 'active' : '' }}" href="{{ route('team.index') }}">
                <i class="fas fa-users me-2"></i> Team
            </a>
        </li>
        @endif

        <!-- Industries -->
        @if(can_access('Industries', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('industries.*') ? 'active' : '' }}" href="{{ route('industries.index') }}">
                <i class="fas fa-industry me-2"></i> Industries
            </a>
        </li>
        @endif

        <!-- Clients -->
        @if(can_access('Clients', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('clients.index') ? 'active' : '' }}" href="{{ route('clients.index') }}">
                <i class="fas fa-handshake me-2"></i> Clients
            </a>
        </li>
        @endif

        <!-- Contact Forms -->
        @if(can_access('Contact Forms', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('contact-list') ? 'active' : '' }}" href="{{ route('contact-list') }}">
                <i class="fas fa-envelope me-2"></i> Contact Forms
            </a>
        </li>
        @endif

        <!-- Case Studies -->
        @if(can_access('Case Studies', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.case-study.*') ? 'active' : '' }}" href="{{ route('admin.case-study.index') }}">
                <i class="fas fa-file-alt me-2"></i> Case Studies
            </a>
        </li>
        @endif

        <!-- Divider -->
        <li class="nav-item mt-3">
            <hr class="text-white-50">
            <h6 class="text-white-50 text-uppercase px-3 mb-2" style="font-size: 0.75rem;">CRM Management</h6>
        </li>

        <!-- CRM Projects -->
        @if(can_access('CRM Projects', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">
                <i class="fas fa-project-diagram me-2"></i> CRM Projects
            </a>
        </li>
        @endif

        <!-- CRM Clients -->
        @if(can_access('CRM Clients', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}" href="{{ route('admin.clients.index') }}">
                <i class="fas fa-user-tie me-2"></i> CRM Clients
            </a>
        </li>
        @endif

        <!-- Notes -->
        @if(can_access('Notes', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.notes.*') ? 'active' : '' }}" href="{{ route('admin.notes.index') }}">
                <i class="fas fa-sticky-note me-2"></i> Notes
            </a>
        </li>
        @endif

        <!-- Reminders -->
        @if(can_access('Reminders', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.reminders.*') ? 'active' : '' }}" href="{{ route('admin.reminders.index') }}">
                <i class="fas fa-bell me-2"></i> Reminders
            </a>
        </li>
        @endif

        <!-- Portfolios -->
        @if(can_access('Portfolios', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}" href="{{ route('admin.portfolios.index') }}">
                <i class="fas fa-images me-2"></i> Portfolio
            </a>
        </li>
        @endif

        <!-- Meetings -->
        @if(can_access('Meetings', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.meetings.*') ? 'active' : '' }}" href="{{ route('admin.meetings.index') }}">
                <i class="fas fa-calendar-alt me-2"></i> Meetings
            </a>
        </li>
        @endif

        <!-- SEO -->
        @if(can_access('SEO', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.seo.*') ? 'active' : '' }}" href="{{ route('admin.seo.index') }}">
                <i class="fas fa-search me-2"></i> SEO
            </a>
        </li>
        @endif

        <!-- SMM -->
        @if(can_access('SMM', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.smm.*') ? 'active' : '' }}" href="{{ route('admin.smm.index') }}">
                <i class="fas fa-share-alt me-2"></i> SMM
            </a>
        </li>
        @endif

        <!-- Assets -->
        @if(can_access('Assets', 'view'))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.assets.*') ? 'active' : '' }}" href="{{ route('admin.assets.index') }}">
                <i class="fas fa-folder-open me-2"></i> Assets
            </a>
        </li>
        @endif

        <!-- Divider -->
        <li class="nav-item mt-3">
            <hr class="text-white-50">
        </li>

        <!-- Admins (Super Admin Only) -->
        @if(is_super_admin())
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user-list') ? 'active' : '' }}" href="{{ route('user-list') }}">
                <i class="fas fa-user-shield me-2"></i> Admins
            </a>
        </li>

        <!-- Roles & Permissions (Super Admin Only) -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
                <i class="fas fa-user-tag me-2"></i> Roles & Permissions
            </a>
        </li>
        @endif

        <!-- Logout -->
        <li class="nav-item">
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </li>
    </ul>
</div>

<style>
.sidebar .nav-link[data-bs-toggle="collapse"] {
    cursor: pointer;
}
.sidebar .nav-link[data-bs-toggle="collapse"] i.fa-chevron-down {
    transition: transform 0.3s;
    font-size: 0.75rem;
}
.sidebar .nav-link[data-bs-toggle="collapse"]:not(.collapsed) i.fa-chevron-down {
    transform: rotate(180deg);
}
.sidebar .collapse .nav-link {
    padding-left: 45px;
    font-size: 0.9rem;
}
</style>
