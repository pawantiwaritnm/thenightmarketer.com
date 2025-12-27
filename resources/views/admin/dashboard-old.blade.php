<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - The Night CRM</title>

    <link rel="stylesheet" href="{{ asset('admin/css/plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
</head>

<body class="layout-light side-menu">
    <div class="mobile-search">
        <form action="/" class="search-form">
            <img src="{{ asset('admin_assets/assets/img/svg/search.svg') }}" alt="search" class="svg">
            <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
        </form>
    </div>

    <div class="mobile-author-actions"></div>

    <!-- Sidebar Navigation -->
    <aside class="sidebar-wrapper">
        <div class="sidebar sidebar-collapse" id="sidebar">
            <div class="sidebar__menu-group">
                <ul class="sidebar_nav">
                    <li class="menu-title">
                        <span>Main Menu</span>
                    </li>

                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="active">
                            <span class="nav-icon las la-home"></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>

                    <!-- Projects -->
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon las la-project-diagram"></span>
                            <span class="menu-text">Projects</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.projects.index') }}">All Projects</a></li>
                            <li><a href="{{ route('admin.projects.create') }}">Add Project</a></li>
                        </ul>
                    </li>

                    <!-- Clients -->
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon las la-users"></span>
                            <span class="menu-text">Clients</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.clients.index') }}">All Clients</a></li>
                            <li><a href="{{ route('admin.clients.create') }}">Add Client</a></li>
                        </ul>
                    </li>

                    <!-- Notes -->
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon las la-sticky-note"></span>
                            <span class="menu-text">Notes</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.notes.index') }}">All Notes</a></li>
                            <li><a href="{{ route('admin.notes.create') }}">Add Note</a></li>
                            <li><a href="{{ route('admin.notes.index') }}">View All</a></li>
                        </ul>
                    </li>

                    <!-- Reminders -->
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon las la-bell"></span>
                            <span class="menu-text">Reminders</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.reminders.index') }}">All Reminders</a></li>
                            <li><a href="{{ route('admin.reminders.create') }}">Add Reminder</a></li>
                        </ul>
                    </li>

                    <!-- Meetings -->
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon las la-calendar"></span>
                            <span class="menu-text">Meetings</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.meetings.index') }}">All Meetings</a></li>
                            <li><a href="{{ route('admin.meetings.create') }}">Add Meeting</a></li>
                        </ul>
                    </li>

                    <li class="menu-title mt-30">
                        <span>Marketing</span>
                    </li>

                    <!-- SEO -->
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon las la-search"></span>
                            <span class="menu-text">SEO</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.seo.index') }}">SEO Reports</a></li>
                            <li><a href="{{ route('admin.seo.create') }}">Add SEO</a></li>
                        </ul>
                    </li>

                    <!-- SMM -->
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon lab la-facebook"></span>
                            <span class="menu-text">SMM</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.smm.index') }}">SMM Reports</a></li>
                            <li><a href="{{ route('admin.smm.create') }}">Add SMM</a></li>
                            <li><a href="{{ route('admin.smm.index') }}">Calendar</a></li>
                        </ul>
                    </li>

                    <li class="menu-title mt-30">
                        <span>Resources</span>
                    </li>

                    <!-- Portfolio -->
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon las la-briefcase"></span>
                            <span class="menu-text">Portfolio</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.portfolios.index') }}">All Portfolio</a></li>
                            <li><a href="{{ route('admin.portfolios.create') }}">Add Portfolio</a></li>
                        </ul>
                    </li>

                    <!-- Assets -->
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon las la-file"></span>
                            <span class="menu-text">Assets</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.assets.index') }}">All Assets</a></li>
                            <li><a href="{{ route('admin.assets.create') }}">Add Asset</a></li>
                        </ul>
                    </li>

                    <!-- Apps -->
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon las la-mobile"></span>
                            <span class="menu-text">Apps</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.apps.index') }}">All Apps</a></li>
                            <li><a href="{{ route('admin.apps.add') }}">Add App</a></li>
                        </ul>
                    </li>

                    <!-- Requirements -->
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon las la-clipboard-list"></span>
                            <span class="menu-text">Requirements</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.requirements.index') }}">All Requirements</a></li>
                            <li><a href="{{ route('admin.requirements.add') }}">Add Requirement</a></li>
                        </ul>
                    </li>

                    <li class="menu-title mt-30">
                        <span>System</span>
                    </li>

                    <!-- Users -->
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon las la-user-cog"></span>
                            <span class="menu-text">Users</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.users.index') }}">All Users</a></li>
                            <li><a href="{{ route('admin.users.add') }}">Add User</a></li>
                            <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                            <li><a href="{{ route('admin.roles.add') }}">Add Role</a></li>
                        </ul>
                    </li>

                    <!-- Logout -->
                    <li>
                        <form id="sidebar-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">
                            <span class="nav-icon las la-sign-out-alt"></span>
                            <span class="menu-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>

    <main class="main-content">
        <!-- Header -->
        <div class="contents">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-main user-member justify-content-sm-between">
                            <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                                <div class="d-flex align-items-center user-member__title justify-content-center me-sm-25">
                                    <h4 class="text-capitalize fw-500 breadcrumb-title">Dashboard</h4>
                                </div>
                            </div>
                            <div class="action-btn">
                                <form id="header-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn px-15 btn-primary">
                                        <i class="las la-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Welcome Message -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-default card-md mb-4">
                            <div class="card-body">
                                <h5>Welcome back, {{ auth()->guard('admin')->user()->name }}!</h5>
                                <p class="mb-0">You are logged in as:
                                    @if(auth()->guard('admin')->user()->role == 1)
                                        <span class="badge badge-success">Admin</span>
                                    @elseif(auth()->guard('admin')->user()->role == 2)
                                        <span class="badge badge-info">Manager</span>
                                    @else
                                        <span class="badge badge-secondary">Employee</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics Row -->
                <div class="row">
                    <div class="col-xxl-3 col-sm-6 mb-25">
                        <div class="ap-po-details ap-po-details--2 p-25 radius-xl bg-white d-flex justify-content-between">
                            <div>
                                <div class="overview-content">
                                    <h1>{{ $stats['total_projects'] ?? 0 }}</h1>
                                    <p>Total Projects</p>
                                </div>
                            </div>
                            <div class="ap-po-icon">
                                <i class="las la-project-diagram"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-sm-6 mb-25">
                        <div class="ap-po-details ap-po-details--2 p-25 radius-xl bg-white d-flex justify-content-between">
                            <div>
                                <div class="overview-content">
                                    <h1>{{ $stats['total_employees'] ?? 0 }}</h1>
                                    <p>Total Employees</p>
                                </div>
                            </div>
                            <div class="ap-po-icon">
                                <i class="las la-users"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-sm-6 mb-25">
                        <div class="ap-po-details ap-po-details--2 p-25 radius-xl bg-white d-flex justify-content-between">
                            <div>
                                <div class="overview-content">
                                    <h1>{{ $stats['total_seo'] ?? 0 }}</h1>
                                    <p>SEO Projects</p>
                                </div>
                            </div>
                            <div class="ap-po-icon">
                                <i class="las la-search"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-sm-6 mb-25">
                        <div class="ap-po-details ap-po-details--2 p-25 radius-xl bg-white d-flex justify-content-between">
                            <div>
                                <div class="overview-content">
                                    <h1>{{ $stats['total_smm'] ?? 0 }}</h1>
                                    <p>SMM Projects</p>
                                </div>
                            </div>
                            <div class="ap-po-icon">
                                <i class="lab la-facebook"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Today's Reminders -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-default card-md mb-4">
                            <div class="card-header">
                                <h6>Today's Reminders</h6>
                            </div>
                            <div class="card-body">
                                @if(count($todayReminders ?? []) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Client</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($todayReminders as $reminder)
                                                <tr>
                                                    <td>{{ $reminder->title ?? 'N/A' }}</td>
                                                    <td>{{ $reminder->company_name ?? 'N/A' }}</td>
                                                    <td>{{ $reminder->date }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-muted">No reminders for today</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card card-default card-md mb-4">
                            <div class="card-header">
                                <h6>Upcoming Reminders</h6>
                            </div>
                            <div class="card-body">
                                @if(count($upcomingReminders ?? []) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Client</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($upcomingReminders as $reminder)
                                                <tr>
                                                    <td>{{ $reminder->title ?? 'N/A' }}</td>
                                                    <td>{{ $reminder->company_name ?? 'N/A' }}</td>
                                                    <td>{{ $reminder->date }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-muted">No upcoming reminders</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-default card-md mb-4">
                            <div class="card-header">
                                <h6>Quick Access</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Projects -->
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary btn-block">
                                            <i class="las la-project-diagram"></i> Projects
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.projects.create') }}" class="btn btn-outline-success btn-block">
                                            <i class="las la-plus"></i> Add Project
                                        </a>
                                    </div>

                                    <!-- Clients -->
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.clients.index') }}" class="btn btn-outline-primary btn-block">
                                            <i class="las la-users"></i> Clients
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.clients.create') }}" class="btn btn-outline-success btn-block">
                                            <i class="las la-user-plus"></i> Add Client
                                        </a>
                                    </div>

                                    <!-- Notes -->
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.notes.index') }}" class="btn btn-outline-primary btn-block">
                                            <i class="las la-sticky-note"></i> Notes
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.notes.create') }}" class="btn btn-outline-success btn-block">
                                            <i class="las la-plus"></i> Add Note
                                        </a>
                                    </div>

                                    <!-- Reminders -->
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.reminders.index') }}" class="btn btn-outline-primary btn-block">
                                            <i class="las la-bell"></i> Reminders
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.reminders.create') }}" class="btn btn-outline-success btn-block">
                                            <i class="las la-plus"></i> Add Reminder
                                        </a>
                                    </div>

                                    <!-- Users -->
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary btn-block">
                                            <i class="las la-user-cog"></i> Users
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.users.add') }}" class="btn btn-outline-success btn-block">
                                            <i class="las la-user-plus"></i> Add User
                                        </a>
                                    </div>

                                    <!-- SEO -->
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.seo.index') }}" class="btn btn-outline-primary btn-block">
                                            <i class="las la-search"></i> SEO
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.seo.create') }}" class="btn btn-outline-success btn-block">
                                            <i class="las la-plus"></i> Add SEO
                                        </a>
                                    </div>

                                    <!-- SMM -->
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.smm.index') }}" class="btn btn-outline-primary btn-block">
                                            <i class="lab la-facebook"></i> SMM
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.smm.create') }}" class="btn btn-outline-success btn-block">
                                            <i class="las la-plus"></i> Add SMM
                                        </a>
                                    </div>

                                    <!-- Portfolio -->
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.portfolios.index') }}" class="btn btn-outline-primary btn-block">
                                            <i class="las la-briefcase"></i> Portfolio
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.portfolios.create') }}" class="btn btn-outline-success btn-block">
                                            <i class="las la-plus"></i> Add Portfolio
                                        </a>
                                    </div>

                                    <!-- Meetings -->
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.meetings.index') }}" class="btn btn-outline-primary btn-block">
                                            <i class="las la-calendar"></i> Meetings
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.meetings.create') }}" class="btn btn-outline-success btn-block">
                                            <i class="las la-plus"></i> Add Meeting
                                        </a>
                                    </div>

                                    <!-- Assets -->
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.assets.index') }}" class="btn btn-outline-primary btn-block">
                                            <i class="las la-file"></i> Assets
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.assets.create') }}" class="btn btn-outline-success btn-block">
                                            <i class="las la-plus"></i> Add Asset
                                        </a>
                                    </div>

                                    <!-- Apps -->
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.apps.index') }}" class="btn btn-outline-primary btn-block">
                                            <i class="las la-mobile"></i> Apps
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.apps.add') }}" class="btn btn-outline-success btn-block">
                                            <i class="las la-plus"></i> Add App
                                        </a>
                                    </div>

                                    <!-- Requirements -->
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.requirements.index') }}" class="btn btn-outline-primary btn-block">
                                            <i class="las la-clipboard-list"></i> Requirements
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.requirements.add') }}" class="btn btn-outline-success btn-block">
                                            <i class="las la-plus"></i> Add Requirement
                                        </a>
                                    </div>

                                    <!-- Roles -->
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-primary btn-block">
                                            <i class="las la-user-shield"></i> Roles
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <a href="{{ route('admin.smm.index') }}" class="btn btn-outline-info btn-block">
                                            <i class="las la-calendar-alt"></i> SMM Calendar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-default card-md mb-4">
                            <div class="card-header">
                                <h6>All Modules</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-4">
                                        <h6 class="text-primary"><i class="las la-folder"></i> Project Management</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="{{ route('admin.projects.index') }}">All Projects</a></li>
                                            <li><a href="{{ route('admin.projects.create') }}">Add Project</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3 mb-4">
                                        <h6 class="text-primary"><i class="las la-users"></i> Client Management</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="{{ route('admin.clients.index') }}">All Clients</a></li>
                                            <li><a href="{{ route('admin.clients.create') }}">Add Client</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3 mb-4">
                                        <h6 class="text-primary"><i class="las la-sticky-note"></i> Notes & Tasks</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="{{ route('admin.notes.index') }}">All Notes</a></li>
                                            <li><a href="{{ route('admin.notes.create') }}">Add Note</a></li>
                                            <li><a href="{{ route('admin.notes.index') }}">View All Notes</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3 mb-4">
                                        <h6 class="text-primary"><i class="las la-bell"></i> Reminders</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="{{ route('admin.reminders.index') }}">All Reminders</a></li>
                                            <li><a href="{{ route('admin.reminders.create') }}">Add Reminder</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3 mb-4">
                                        <h6 class="text-primary"><i class="las la-user-cog"></i> User Management</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="{{ route('admin.users.index') }}">All Users</a></li>
                                            <li><a href="{{ route('admin.users.add') }}">Add User</a></li>
                                            <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                                            <li><a href="{{ route('admin.roles.add') }}">Add Role</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3 mb-4">
                                        <h6 class="text-primary"><i class="las la-search"></i> SEO</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="{{ route('admin.seo.index') }}">SEO Reports</a></li>
                                            <li><a href="{{ route('admin.seo.create') }}">Add SEO Project</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3 mb-4">
                                        <h6 class="text-primary"><i class="lab la-facebook"></i> SMM</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="{{ route('admin.smm.index') }}">SMM Reports</a></li>
                                            <li><a href="{{ route('admin.smm.create') }}">Add SMM Project</a></li>
                                            <li><a href="{{ route('admin.smm.index') }}">Calendar View</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3 mb-4">
                                        <h6 class="text-primary"><i class="las la-briefcase"></i> Portfolio & Assets</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="{{ route('admin.portfolios.index') }}">Portfolio</a></li>
                                            <li><a href="{{ route('admin.portfolios.create') }}">Add Portfolio</a></li>
                                            <li><a href="{{ route('admin.assets.index') }}">Assets</a></li>
                                            <li><a href="{{ route('admin.assets.create') }}">Add Asset</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3 mb-4">
                                        <h6 class="text-primary"><i class="las la-calendar"></i> Meetings</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="{{ route('admin.meetings.index') }}">All Meetings</a></li>
                                            <li><a href="{{ route('admin.meetings.create') }}">Add Meeting</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3 mb-4">
                                        <h6 class="text-primary"><i class="las la-mobile"></i> Apps</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="{{ route('admin.apps.index') }}">All Apps</a></li>
                                            <li><a href="{{ route('admin.apps.add') }}">Add App</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3 mb-4">
                                        <h6 class="text-primary"><i class="las la-clipboard-list"></i> Requirements</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="{{ route('admin.requirements.index') }}">All Requirements</a></li>
                                            <li><a href="{{ route('admin.requirements.add') }}">Add Requirement</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="{{ asset('admin/js/plugins.min.js') }}"></script>
    <script src="{{ asset('admin/js/script.min.js') }}"></script>
</body>
</html>
