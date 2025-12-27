@extends('admin.layouts.auth')

@section('content')
<div class="login-container">
    <div class="row g-0">
        <!-- Left Side -->
        <div class="col-lg-5 d-none d-lg-block">
            <div class="login-left">
                <img src="https://thenightmarketer.com/assets/images/logo.png" alt="TNM Logo" onerror="this.style.display='none'">
                <h3>TNM & CRM Admin</h3>
                <p>Manage your marketing agency and client relationships efficiently</p>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="col-lg-7">
            <div class="login-right">
                <div class="login-title">
                    <h4>Welcome Back!</h4>
                    <p class="text-muted">Please sign in to your account</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin-login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                               placeholder="Enter your username" required value="{{ old('username') }}">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" name="password" id="password"
                                   placeholder="Enter your password" required>
                            <span class="password-toggle">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>

                    <button type="submit" class="btn btn-login">
                        <i class="fas fa-sign-in-alt me-2"></i> Sign In
                    </button>
                </form>

                <div class="mt-4 text-center">
                    <p class="text-muted small">
                        <i class="fas fa-shield-alt me-1"></i>
                        Protected by enterprise security
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
