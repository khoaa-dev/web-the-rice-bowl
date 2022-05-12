@extends('templates.default-page')

@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/offer-detail.css') }}">

@endsection

@section('content')
    <section class="ftco-section ftco-services">
        <div class="container">
            <h2>{{ $package[0]->content }} <button class="btn btn-dark">Đặt ngay</button></h2>
            <br>
            {{-- {{ $package[0]->detail }} --}}

            <h3>Bao gồm</h3>

            <h4>Trang trí lễ cưới</h4>
            <ul>
                <li>Trang trí lễ cưới Deluxe với: Bảng chào mừng, ghế tiffany trắng cài hoa, vòm hoa, lối đi trải thảm</li>
                <li>Rượu sủi tăm để nâng ly (dành cho cô dâu và chú rể) và bánh cưới một tầng cho lễ cắt bánh </li>
                <li>Người dẫn dắt lễ cưới </li>
                <li>Hoa bó cầm tay cho cô dâu và hoa cài áo cho chú rể </li>
                <li>Miễn phí 30 phút sử dụng đồ uống được sáng tạo bởi cặp đôi (thức uống không cồn) </li>
            </ul>
            <br>
            <h4>Tiệc chiêu đãi </h4>
            <ul>
                <li>Trang trí tiệc chiêu đãi gói Deluxe, bao gồm: Bàn tiếp đón, bàn tiệc, số bàn tiệc và thực đơn in theo
                    phong cách đã chọn </li>
                <li>Gói tiệc tối Premium với ẩm thực Việt hay tiệc buffet quốc tế </li>
                <li>Miễn phí đồ uống không cồn và bia địa phương (hai giờ) </li>
            </ul>
            <br>
            <h4>Dịch vụ bổ sung</h4>
            <ul>
                <li>Chuyên gia hoạch định tiệc cưới </li>
                <li>Thực đơn dùng thử cho tối đa bốn khách (1-2 tuần trước ngày cưới) </li>
                <li>Hệ thống âm thanh và ánh sáng chuyên nghiệp </li>
                <li>Miễn phí một đêm lưu trú hạng phòng Deluxe cho cặp đôi với trang trí lãng mạn </li>
                <li>Giá phòng ưu đãi cho bạn bè và người thân tham dự với trang đặt phòng trực tiếp dành cho đám cưới </li>
            </ul>
            <img src="https://images.pexels.com/photos/169190/pexels-photo-169190.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                alt="">
            <img src="https://images.pexels.com/photos/2306281/pexels-photo-2306281.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                alt="">
            <img src="https://images.pexels.com/photos/3730915/pexels-photo-3730915.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                alt="">
            <img src="https://images.pexels.com/photos/4668572/pexels-photo-4668572.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                alt="">

        </div>
    </section>

@endsection
