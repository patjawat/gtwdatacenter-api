@extends('layouts.login')

@section('content')

    {{-- <div class="container">
        <div class="row justify-content-center"> --}}
            {{-- <div class="col-md-8"> --}}
                <div class="card card-widget widget-user shadow-lg">
                  <div class="widget-user-header text-white" style="background: url('https://adminlte.io/themes/v3/dist/img/photo1.png') center center;">
                    <h3 class="widget-user-username text-right">GTW Admin</h3>
                    <h5 class="widget-user-desc text-right">Back-office</h5>
                  </div>
                  <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg" alt="User Avatar">
                  </div>

                    {{-- <div class="card-header text-center">
                        <a href="#" class="h1"><b>GTW</b>Backoffice</a>
                    </div> --}}

                    <div class="card-body mt-4">
                        <p class="login-box-msg">ลงชื่อเพื่อเข้าใช้งานระบบ</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="input-group mb-3">
                                {{-- <input type="email" class="form-control"
                                    placeholder="Email"> --}}
                                <input id="email" type="email" placeholder="Email"
                                    class="form-control form-control-navbar @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input id="password" type="password" placeholder="Password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">


                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">

                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>

                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block"> {{ __('Login') }}</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                        {{-- <div class="social-auth-links text-center mt-2 mb-3">
                            <a href="#" class="btn btn-block btn-primary">
                                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                            </a>
                            <a href="#" class="btn btn-block btn-danger">
                                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                            </a>
                        </div> --}}
                        <!-- /.social-auth-links -->

                        <p class="mb-1">
                            <a href="forgot-password.html">I forgot my password</a>
                        </p>
                        <p class="mb-0">
                            <a href="register.html" class="text-center">Register a new membership</a>
                        </p>

                    </div>
                </div>
                {{--
            </div> --}}
            {{-- </div>
    </div> --}}

@endsection
