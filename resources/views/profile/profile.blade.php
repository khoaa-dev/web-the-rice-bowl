@extends('templates.default-page')

@section('css')
    <style>
        .container {
            font-family: GoogleSans;
            src: url('public/front-end/fonts/GoogleSans/GoogleSans-Medium.ttf');
        }

        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }

        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 90px;
            height: 90px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
        }

        .account-settings .about {
            margin: 1rem 0 0 0;
            font-size: 0.8rem;
            text-align: center;
        }

        .card {
            background: #262836;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }

        .form-control {
            border: 1px solid #596280;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: .825rem;
            background: #1A233A;
            color: #bcd0f7;
        }

        .infor,
        .history-order {
            /* background-color: #1e2c52; */
            margin-top: 10px;
        }

        input {
            color: #fff !important;

        }

    </style>
    {{-- @yield('css') --}}
@endsection

@section('content')
    <div class="row">
        <div class="col-1"></div>
        <div class="row gutters col-10">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-s ettings">
                            <div class="user-profile text-center">
                                <div class="user-avatar d-flex justify-content-center">
                                    <img src="{{ asset('public/front-end/images/' . $user->avatarUrl) }}"
                                        alt="Maxwell Admin" width="90px" height="90px" style="border-radius: 100px;">

                                </div>
                                <div class="change-avatar d-flex justify-content-center">
                                    <input type="file" name="avatar_image" id="avatar_image"
                                        style="opacity: 0; display: none">
                                    <label for="avatar_image">
                                        <p class="btn btn-primary" id="btn-change-avatar" style="display: none">Upload
                                            avatar
                                        </p>
                                    </label>
                                </div>
                                <h5 class="user-name" style="font-size: 18px">{{ $user->fullName }}</h5>
                                <h6 class="user-email" style="font-size: 14px">{{ $user->email }}</h6>
                                <div class="sidebar mt-5">
                                    <div class="infor" style="background-color: #303344;border-radius: 5px">
                                        <a href="{{ route('profile') }}">Thông tin cá nhân</a>
                                    </div>

                                
                                </div>


                            </div>
                            {{-- <div class="about">
              <h5 class="mb-2 text-primary">About</h5>
              <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" style="height: 620px">
                <div class="card h-100">
                    <div class="card-body">
                        @yield('profile-body')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(e) {

            $('#btn-change-avatar').on('click', function() {

            })
        })
    </script>
    @yield('js')
@endsection
