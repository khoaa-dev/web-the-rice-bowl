@extends('templates.default-page')

@section('css')
    <link rel="stylesheet" href="{{ asset('public/css/app.css?v=') . time() }}">
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <style>
        .fb {
            background-color: #3B5998;
            color: white;
        }

        .twitter {
            background-color: #55ACEE;
            color: white;
        }

        .google {
            background-color: #dd4b39;
            color: white;
        }

    </style>
    <div class="container-fluid">
        <div class="row">
            <div id="back">
                <canvas id="canvas" class="canvas-back"></canvas>
                <div class="backRight" style="background-color: rgb(233, 188, 67)">
                    <img src="{{ asset('public/front-end/images/anhFood1.jpg') }}" height="100%" alt=""
                        style="z-index: 1000">
                </div>
                <div class="backLeft" style="background-color: rgb(233, 188, 67)">
                    <img src="{{ asset('public/front-end/images/anhFood6.jpg') }}" width="100%" alt="">
                </div>
            </div>

            <div id="slideBox">
                <div class="topLayer">
                    <div class="left">
                        <div class="content">
                            <h2 style="color: rgb(233, 188, 67)">Đăng ký</h2>
                            <form id="form-signup" method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="form-element form-stack">
                                    <label for="name" class="form-label">{{ __('Họ và tên') }}</label>
                                    <input id="name" type="text" name="name" class="@error('email') is-invalid @enderror">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-element form-stack">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" name="email"
                                        class="@error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-element form-stack">
                                    <label for="password-signup" class="form-label">Mật khẩu</label>
                                    <input id="password-signup" type="password" name="password"
                                        class="@error('password') is-invalid @enderror" required
                                        autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-element form-stack">
                                    <label for="password-confirm"
                                        class="form-label">{{ __('Xác nhận mật khẩu') }}</label>
                                    <input id="password-confirm" type="password" name="password_confirmation"
                                        class="@error('password') is-invalid @enderror" required
                                        autocomplete="new-password">
                                </div>
                                <div class="form-element form-submit">
                                    <button id="signUp" class="signup" type="submit"
                                        style="background-color: rgb(233, 188, 67)"
                                        name="signup">{{ __('Đăng ký') }}</button>
                                </div>
                            </form>
                            <div class="form-switch-login">
                                <button id="goLeft" class="signup off" onsubmit="return false;"
                                    style="color: rgb(233, 188, 67)">Đăng nhập</button>
                            </div>
                        </div>
                    </div>
                    <div class="right" style="background-color: #2c3034">
                        <div class=" content">
                            <h2 style="color: rgb(233, 188, 67)">Đăng nhập</h2>
                            <form id="form-login" method="post" onsubmit="{{ route('login') }}">
                                @csrf
                                <div class="form-element form-stack">
                                    <label for="email" class="form-label" style="color: white">Email</label>
                                    <input id="email" type="email" name="email"
                                        class=" @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-element form-stack">
                                    <label for="password" class="form-label" style="color: white">Mật khẩu</label>
                                    <input id="password" type="password" class=" @error('password') is-invalid @enderror"
                                        name="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-element form-submit">
                                    <button id="logIn" class="login " type="submit"
                                        style="background-color: rgb(233, 188, 67)"
                                        name="login">{{ __('Đăng nhập') }}</button>
                                </div>

                            </form>
                            <div class="form-switch-signup">
                                <button id="goRight" class="login off" name="signup"
                                    style="color: rgb(233, 188, 67)">Đăng
                                    ký</button>
                            </div>
                            <div class="row">
                                <div class="col-12 row d-flex justify-content-center">
                                    <p style="color: rgb(214, 214, 214)">Hoặc đăng nhập với</p>
                                    <a href="{{ URL::to('/auth/redirect/facebook') }}"><i class="fab fa-facebook"
                                            style="font-size: 43px; color: #0950a0;margin-left: 10px;background-color: #fff; border-radius: 100%"></i>
                                    </a>
                                </div>
                                {{-- <div class="col">
                                    <a href="{{ URL::to('/auth/redirect/facebook') }}" class="fb btn">
                                        <i class="fa fa-facebook fa-fw"></i> Đằng nhập bằng Facebook
                                    </a>
                                    <a href="#" class="google btn">
                                        <i class="fa fa-google fa-fw"></i> Đăng nhập bằng Google
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
