@extends('templates.default-page')
@section('content')
<section class="home-slider owl-carousel img" style="background-image: url({{ asset('public/front-end/images/bg_1.jpgs') }});">

    <div class="slider-item" style="background-image: url({{ asset('public/front-end/images/bg_3.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Về chúng tôi</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span>
                        <span>Về chúng tôi</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>


<section class="ftco-intro">
    <div class="container-wrap">
        <div class="wrap d-md-flex">
            <div class="info">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-phone"></span></div>
                        <div class="text">
                            <h3>0765 700 777</h3>
                            <p>Gần sông Hàn - Đà Nẵng</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-my_location"></span></div>
                        <div class="text">
                            <h3>123 Nguyễn Văn Linh</h3>
                            <p>Thành phố Đà Nẵng</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-clock-o"></span></div>
                        <div class="text">
                            <h3>Mở cửa cả ngày trong tuần</h3>
                            <p>7:00 am - 10:00 pm</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-md-flex pl-md-5 p-4 align-items-center">
                <ul class="social-icon">
                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="ftco-about d-md-flex">
    <div class="one-half img" style="background-image: url(images/about.jpg);"></div>
    <div class="one-half ftco-animate">
        <div class="heading-section ftco-animate ">
            <h2 class="mb-4">Chào mừng <span class="flaticon-pizza">The Rice Bowl</span> Restaurant</h2>
        </div>
        <div>
            <p>Theo tôi, dịch vụ của nhà hàng làm tôi hài lòng nhất chính là dịch vụ của The Rice Bowl. 
                The Rice Bowl là một nhà hàng kiêm dịch vụ thuộc tập đoàn Chiếc Thìa Vàng. Nó có một số chi nhánh, 
                tôi đã thử một số trong đó và nhân viên đều tốt cả. Khi chúng tôi đến nhà hàng, 
                sẽ có một nhân viên đến và đưa chúng tôi vào bàn. Anh ấy hoặc cô ấy cũng cho chúng tôi khăn ăn, 
                dây buộc tóc, một túi nhựa nhỏ để giữ điện thoại của chúng tôi an toàn khỏi nước lẩu. 
                Tôi hoàn toàn ấn tượng về những hành động nhỏ nhưng đầy ý nghĩa này. Tôi nghĩ rằng các nhân viên rất tốt, 
                từ đầu đến cuối, họ hẳn là đã được đào tạo cẩn thận. Ngoài ra, nếu có khách hàng sinh nhật vào ngày hôm đó, 
                nhà hàng sẽ tặng họ một chiếc bánh kem miễn phí và một tiết mục văn nghệ nhỏ để chúc mừng. 
                Mỗi lần đến The Rice Bowl, tôi không chỉ hài lòng với đồ ăn mà còn cả dịch vụ ở đây.</p>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Đầu bếp của chúng tôi</h2>
                <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
                <p class="mt-5">Đầu bếp được đào tạo chính quy, có tinh thần và tay nghề làm việc rất tốt</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4" style="background-image: url(images/person_1.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Võ Tiến</a></h3>
                        <span class="position">Nam</span>
                        <div class="text">
                            <p>Đầu bếp được đào tạo chính quy, có tinh thần và tay nghề làm việc rất tốt.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4" style="background-image: url(images/person_2.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Quốc Tuấn</a></h3>
                        <span class="position">Nam</span>
                        <div class="text">
                            <p>Đầu bếp được đào tạo chính quy, có tinh thần và tay nghề làm việc rất tốt.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4" style="background-image: url(images/person_3.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Đình Khoa</a></h3>
                        <span class="position">Nam</span>
                        <div class="text">
                            <p>Đầu bếp được đào tạo chính quy, có tinh thần và tay nghề làm việc rất tốt.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4" style="background-image: url(images/person_4.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Cao Hằng</a></h3>
                        <span class="position">Nữ</span>
                        <div class="text">
                            <p>Đầu bếp được đào tạo chính quy, có tinh thần và tay nghề làm việc rất tốt.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-pizza-1"></span></div>
                                <strong class="number" data-number="100">0</strong>
                                <span>Thực đơn</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-medal"></span></div>
                                <strong class="number" data-number="85">0</strong>
                                <span>Các giải thưởng</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-laugh"></span></div>
                                <strong class="number" data-number="10567">0</strong>
                                <span>Khách hàng hài lòng</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-chef"></span></div>
                                <strong class="number" data-number="900">0</strong>
                                <span>Nhân viên</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-appointment">
    <div class="overlay"></div>
    <div class="container-wrap">
        <div class="row no-gutters d-md-flex align-items-center">
            <div class="col-md-6 d-flex align-self-stretch">
                <div id="map"></div>
            </div>
            <div class="col-md-6 appointment ftco-animate">
                <h3 class="mb-3">Liên hệ với chúng tôi</h3>
                <form action="#" class="appointment-form">
                    <div class="d-md-flex">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tên">
                        </div>
                    </div>
                    <div class="d-me-flex">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Họ">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Tin nhắn"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Gửi" class="btn btn-primary py-3 px-4">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection