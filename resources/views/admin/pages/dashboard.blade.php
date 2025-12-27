@extends('admin.layouts.app')

@section('page-title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Welcome Message -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Welcome back, {{ auth()->guard('admin')->user()->name }}!</h4>
                    <p class="mb-0">You are logged in as:
                        @if(auth()->guard('admin')->user()->role == 1)
                            <span class="badge bg-success">Admin</span>
                        @elseif(auth()->guard('admin')->user()->role == 2)
                            <span class="badge bg-info">Manager</span>
                        @else
                            <span class="badge bg-secondary">Employee</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card bg-primary text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white mb-1">Total Projects</h6>
                            <h2 class="mb-0">{{ $stats['total_projects'] ?? 0 }}</h2>
                        </div>
                        <div class="fs-1">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card bg-success text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white mb-1">Total Employees</h6>
                            <h2 class="mb-0">{{ $stats['total_employees'] ?? 0 }}</h2>
                        </div>
                        <div class="fs-1">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card bg-info text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white mb-1">SEO Projects</h6>
                            <h2 class="mb-0">{{ $stats['total_seo'] ?? 0 }}</h2>
                        </div>
                        <div class="fs-1">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card bg-warning text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white mb-1">SMM Projects</h6>
                            <h2 class="mb-0">{{ $stats['total_smm'] ?? 0 }}</h2>
                        </div>
                        <div class="fs-1">
                            <i class="fas fa-share-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reminders Section -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-bell me-2"></i>Today's Reminders</h5>
                </div>
                <div class="card-body">
                    @if(count($todayReminders ?? []) > 0)
                        <div class="table-responsive">
                            <table class="table table-sm">
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
                        <p class="text-muted mb-0">No reminders for today</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fas fa-calendar me-2"></i>Upcoming Reminders</h5>
                </div>
                <div class="card-body">
                    @if(count($upcomingReminders ?? []) > 0)
                        <div class="table-responsive">
                            <table class="table table-sm">
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
                        <p class="text-muted mb-0">No upcoming reminders</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Access Links -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-tachometer-alt me-2"></i>Quick Access</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <!-- TNM Quick Links -->
                        <div class="col-md-6">
                            <h6 class="text-primary mb-3">The Night Marketer</h6>
                            <div class="row g-2">
                                <div class="col-6 col-lg-4">
                                    <a href="{{ route('blog-list') }}" class="btn btn-outline-primary btn-sm w-100">
                                        <i class="fas fa-blog"></i> Blogs
                                    </a>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <a href="{{ route('services.index') }}" class="btn btn-outline-primary btn-sm w-100">
                                        <i class="fas fa-concierge-bell"></i> Services
                                    </a>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <a href="{{ route('categories.index') }}" class="btn btn-outline-primary btn-sm w-100">
                                        <i class="fas fa-tags"></i> Categories
                                    </a>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <a href="{{ route('team.index') }}" class="btn btn-outline-primary btn-sm w-100">
                                        <i class="fas fa-users"></i> Team
                                    </a>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <a href="{{ route('admin.case-study.index') }}" class="btn btn-outline-primary btn-sm w-100">
                                        <i class="fas fa-file-alt"></i> Case Studies
                                    </a>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <a href="{{ route('contact-list') }}" class="btn btn-outline-primary btn-sm w-100">
                                        <i class="fas fa-envelope"></i> Contacts
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- CRM Quick Links -->
                        <div class="col-md-6">
                            <h6 class="text-success mb-3">CRM Management</h6>
                            <div class="row g-2">
                                <div class="col-6 col-lg-4">
                                    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-success btn-sm w-100">
                                        <i class="fas fa-project-diagram"></i> Projects
                                    </a>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <a href="{{ route('admin.clients.index') }}" class="btn btn-outline-success btn-sm w-100">
                                        <i class="fas fa-user-tie"></i> Clients
                                    </a>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <a href="{{ route('admin.notes.index') }}" class="btn btn-outline-success btn-sm w-100">
                                        <i class="fas fa-sticky-note"></i> Notes
                                    </a>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <a href="{{ route('admin.reminders.index') }}" class="btn btn-outline-success btn-sm w-100">
                                        <i class="fas fa-bell"></i> Reminders
                                    </a>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <a href="{{ route('admin.seo.index') }}" class="btn btn-outline-success btn-sm w-100">
                                        <i class="fas fa-search"></i> SEO
                                    </a>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <a href="{{ route('admin.smm.index') }}" class="btn btn-outline-success btn-sm w-100">
                                        <i class="fas fa-share-alt"></i> SMM
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
