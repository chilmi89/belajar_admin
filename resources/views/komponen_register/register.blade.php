<!DOCTYPE html>
<html lang="en">

<head>
    @include('komponen_register.link_register')
</head>

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <!-- Login Logo -->
        <div class="login-logo">
            <a href="../index2.html"><b> Halaman register</b>LTE</a>
        </div>
        <!-- /.login-logo -->

        <!-- Card -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <!-- Login Form -->
                <form action="{{ route('register.proses') }}" method="POST">
                    @csrf
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required>
                    
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                    
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                    
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                    
                    <button type="submit">Register</button>
                </form>
                <!-- /.Login Form -->

                <!-- Social Auth Links -->

                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="{{ route('login') }}">Kembali ke halaman login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- Third Party Plugins -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>

    <!-- OverlayScrollbars Configuration -->

    <script>
        // SweetAlert untuk pesan error
        @if (Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal!',
                text: '{{ Session::get('error') }}',
            });
        @endif
    </script>

</body>

</html>
