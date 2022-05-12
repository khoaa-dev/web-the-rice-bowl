@extends('templates.default-page')

@section('css')
    <link rel="stylesheet" href="{{ asset('public/front-end/css/menu.css') }}">

@endsection

@section('content')

    <section class="home-slider owl-carousel img" style="background-image: url({{ asset($restaurant->menu_banner) }});">

        <div class="slider-item" style="background-image: url({{ asset($restaurant->menu_banner) }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h2 class="mb-3 mt-5 bread">THỰC ĐƠN ĐA DẠNG - PHONG PHÚ</h2>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span>
                            <span>Thực đơn</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Danh sách món ăn</h2>
                    <p>Các món ăn hấp dẫn, đa dạng, phù hợp với mọi lứa tuối. Đáp ứng nhu cầu cho tất cả mọi người.</p>
                </div>
            </div>
        </div>
        <div class="container-wrap">

            <div class="row no-gutters d-flex">

                @foreach ($foods as $food)
                    <div class="col-lg-4 d-flex ftco-animate" style="height: 250px">
                        <div class="services-wrap d-flex">
                            @if ($food->id <= 3)
                                <a href="#" class="img"
                                    style="background-image: url({{ asset($food->image) }});"></a>
                            @else
                                <a href="#" class="img order-lg-last"
                                    style="background-image: url({{ asset($food->image) }});"></a>
                            @endif

                            <div class="text p-4">
                                <h3>{{ $food->name }}</h3>
                                <p>The rice bowl</p>
                                <p class="price" style="margin-top: 50px">
                                    <span>{{ number_format($food->price, 0) }} đ</span> <a href="#"
                                        class="ml-2 btn btn-white btn-outline-white">Order</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Danh sách thực đơn</h2>
                    <p class="flip"><span class="deg1"></span><span class="deg2"></span><span
                            class="deg3"></span></p>
                    <p class="mt-5">Thực đơn được các chuyên gia hàng đầu thế giới tạo ra, đầy đủ tất cả chất
                        dinh dưỡng cho chúng ta</p>
                </div>
            </div>
            <div class="row">

                @foreach ($menus as $menu)
                    <div class="col-md-6" style="margin-bottom: 70px">
                        <h2 class="menu-title">Menu</h2>
                        @foreach ($menu->menuFoods as $mf)
                            <div class="pricing-entry d-flex ftco-animate">
                                <div class="img" style="background-image: url({{ asset($mf->food->image) }});">
                                </div>
                                <div class="desc pl-3" style="margin-top: 20px">
                                    <div class="d-flex text align-items-center">
                                        <h3><span>{{ $mf->food->name }}</span></h3>
                                        <span class="price">{{ number_format($mf->food->price, 0) }} đ</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
