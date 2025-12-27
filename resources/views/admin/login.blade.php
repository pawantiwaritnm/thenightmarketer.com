<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>The Night CRM - Admin Login</title>

    <link rel="stylesheet" href="{{ asset('admin_assets/assets/css/plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/style.css') }}">
</head>

<body>
    <main class="main-content">
        <div class="signUP-admin">
            <div class="container-fluid">
                <div class="row justify-content-center align-center">
                    <div class="col-xl-4 col-lg-5 col-md-5 p-0">
                        <div class="signUP-admin-left signIn-admin-left position-relative" style="background-image: url('{{ asset('admin_assets/assets/img/admin-cover-webp.webp') }}');background-size: cover;background-repeat: no-repeat;">
                            <div class="signUP-admin-left__content">
                                <!-- Logo area if needed -->
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-7 col-md-7 col-sm-8">
                        <div class="signUp-admin-right signIn-admin-right p-md-40 p-10">
                            <div class="signUp-topbar d-flex align-items-center justify-content-md-end justify-content-center mt-md-0 mb-md-0 mt-20 mb-1">
                                <p class="mb-0">
                                    Welcome to The Night CRM
                                </p>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-xl-7 col-lg-8 col-md-12">
                                    <div class="edit-profile mt-md-25 mt-0">
                                        <div class="card border-0">
                                            <div class="card-header border-0 pb-md-15 pb-10 pt-md-20 pt-10">
                                                <div class="edit-profile__title">
                                                    <h6>Sign in to <span class="color-primary">Admin Panel</span></h6>
                                                </div>
                                            </div>

                                            <form id="loginForm" method="POST" action="{{ route('admin.process') }}">
                                                @csrf
                                                <div class="card-body">
                                                    <div id="login-error" class="alert alert-danger" style="display: none;"></div>

                                                    @if(session('success'))
                                                        <div class="alert alert-success">
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif

                                                    <div class="edit-profile__body">
                                                        <div class="form-group mb-20">
                                                            <label for="username">Username or Email Address</label>
                                                            <input type="text" class="form-control" id="username" name="username" required placeholder="Username or Email">
                                                        </div>

                                                        <div class="form-group mb-15">
                                                            <label for="password-field">Password</label>
                                                            <div class="position-relative">
                                                                <input id="password-field" type="password" class="form-control" name="password" required placeholder="Password">
                                                                <div style="cursor: pointer;" class="fa fa-fw fa-eye-slash text-light fs-16 field-icon toggle-password2" onclick="togglePassword()"></div>
                                                            </div>
                                                        </div>

                                                        <div class="signUp-condition signIn-condition">
                                                            <div class="checkbox-theme-default custom-checkbox">
                                                                <input class="checkbox" type="checkbox" id="check-1" name="remember">
                                                                <label for="check-1">
                                                                    <span class="checkbox-text">Keep me logged in</span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                            <button type="submit" id="login_btn" class="btn btn-primary btn-default btn-squared mr-15 text-capitalize lh-normal px-50 py-15 signIn-createBtn">
                                                                Sign In
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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
    <script src="{{ asset('admin_assets/assets/js/plugins.min.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/script.min.js') }}"></script>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password-field");
            var icon = document.querySelector(".toggle-password2");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }

        $(document).ready(function() {
            $("#loginForm").submit(function(event) {
                $("#login-error").html('');
                $("#login-error").hide();
                event.preventDefault();

                $('#login_btn').text('Processing...').prop('disabled', true);

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.process') }}",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == 1) {
                            $("#login-error").hide();
                            window.location.href = response.redirect || "{{ route('admin.dashboard') }}";
                        } else {
                            $("#login-error").html(response.msg || 'Login failed').show();
                            $('#login_btn').text('Sign In').prop('disabled', false);
                        }
                    },
                    error: function(xhr, status, error) {
                        $("#login-error").html('An error occurred. Please try again.').show();
                        $('#login_btn').text('Sign In').prop('disabled', false);
                    }
                });
            });
        });
    </script>
</body>
</html>
