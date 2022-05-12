@extends('templates.default-page')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('public/css/app.css?v=') . time() }}"> --}}
    {{-- <script src="{{ asset('public/js/app.js') }}" defer></script> --}}
    <link rel="stylesheet" href="{{ asset('public/css/cart.css?v=') . time() }}">


@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 m-0">
                <div class="status" style="margin: 10px 0">
                    @if (session('status'))
                        <h6 class="alert alert-success" style="font-size: 20px">{{ session('status') }}</h6>
                    @endif
                </div>
            </div>
        </div>
        <div class="row" id="wrapper">

            <div class="col-6 mt-2">
                <div class="mb-5">

                    <div class="row">
                        <div class="col-12 p-4" id="infor">
                            <h4 class="text-center">ĐƠN HÀNG CỦA BẠN</h4>
                            <span style="font-size: 20px; color:#fff;">Loại dịch vụ:</span>
                            <span style="color: #fac564">{{ $order->service->name }}</span>
                            <br>
                            <span style="font-size: 20px; color:#fff;">Số lượng khách:</span>
                            <span style=" color: #fac564">{{ $order->peopleNumber }}</span>
                            <br>
                            <span style="font-size: 20px; color:#fff;">Thời gian tổ chức:</span>
                            <span
                                style="color: #fac564">{{ date('d-m-Y H:i', strtotime($order->organizationDate)) }}</span>
                            <br>
                            <span style="font-size: 20px; color:#fff;">Ghi chú:</span>
                            <span style=" color: #fac564">Không</span>
                            <br><br>
                            <span style="font-size: 20px; color:#fff;">Thực đơn:</span>

                            <div class="col-12 pt-3" style="margin-bottom: 50px">
                                {{-- <div class="title_menu ">{{ $menu->name }}</div> --}}
                                <div class="pricing-entry">
                                    @if (isset($menu))
                                        @foreach ($menu->menuFoods as $mf)
                                            <div class="d-flex text align-items-center" style="margin-bottom: 35px">
                                                <img src="{{ asset($mf->food->image) }}"
                                                    style=" border-radius: 100%;margin-top: -10px; height: 50px; width:50px;max-width: 50px; max-height: 50px;min-width: 50px; min-height: 50px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                box-shadow: 0 4px 8px 0 rgba(192, 151, 16, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" />
                                                &nbsp;&nbsp;
                                                <h3 style="background: none"><span>{{ $mf->food->name }}</h3>
                                                <span
                                                    class="price">{{ number_format($mf->food->price, 0) }}đ</span>
                                            </div>
                                        @endforeach

                                    @else
                                        @foreach ($foods as $food)
                                            <div class="d-flex text align-items-center" style="margin-bottom: 35px">
                                                <img src="{{ asset($food->image) }}"
                                                    style=" border-radius: 100%;margin-top: -10px; height: 50px; width:50px;max-width: 50px; max-height: 50px;min-width: 50px; min-height: 50px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                box-shadow: 0 4px 8px 0 rgba(192, 151, 16, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" />
                                                &nbsp;&nbsp;
                                                <h3 style="background: none"><span>{{ $food->name }}</h3>
                                                <span class="price">{{ number_format($food->price, 0) }}đ</span>
                                            </div>
                                        @endforeach

                                    @endif
                                </div>

                            </div>



                        </div>
                    </div>
                </div>
            </div>


            <div class="col-6" id="checkout">
                <div class="mt-2">
                    <div class="row">
                        <div class="cart-total-prices">
                            <div class="cart-total-prices__inner sticky ">
                                <div class="customer-address">
                                    <p class="heading d-flex justify-content-between title-r">
                                        <span class="" style=" color: #000000;font-size: 20px"><b>Thông tin
                                                khách hàng</b></span>
                                        <span data-view-id="" style="color: #2f4257">Thay
                                            đổi</span>
                                    </p>
                                    <span style="font-size: 20px; color:#081d31; font-weight: bold;">Tên khách
                                        hàng:</span>
                                    <span style="color: #34495e">{{ $user->fullName }}</span>
                                    <br>
                                    <span style="font-size: 20px; color:#081d31; font-weight: bold">Số điện
                                        thoại:</span>
                                    <span style="color: #34495e">{{ $user->phone }}</span>
                                    <br>
                                    <span style="font-size: 20px; color:#081d31; font-weight: bold">Địa chỉ:</span>
                                    <span style="color: #34495e">Kiệt 109/35 Phạm Như Xương, Phường Hòa Khánh Nam, Quận
                                        Liên Chiểu, Đà Nẵng</span>
                                    <br>

                                </div>

                                <div class="prices">
                                    <p class="title-r title-2" style="">
                                        <span class="tt" style=" color: #000000;"><b>Chi
                                                phí</b></span>
                                    </p>
                                    @csrf
                                    <ul class="prices__items pl-0 pb-3">
                                        <li class="prices__item d-flex justify-content-between">
                                            <span class="prices__text" style="color: rgb(0, 0, 0)">Tạm tính</span>
                                            <span class="prices__value"
                                                style="color: #34495e">{{ number_format($totalCost, 0) }}đ</span>
                                        </li>
                                        <li class="prices__item d-flex justify-content-between">
                                            <span class="prices__text" style="color: rgb(0, 0, 0)">Thuế</span>
                                            <span class="prices__value" style="color: #34495e">0đ</span>
                                        </li>
                                        <li class="prices__item d-flex justify-content-between">
                                            <span class="prices__text" style="color: rgb(0, 0, 0)">Giảm giá</span>
                                            <span class="prices__value" style="color: #34495e">0đ</span>
                                        </li>
                                        <hr>
                                        <li class="prices__item d-flex justify-content-between">
                                            <span class="prices__text" style="color: rgb(0, 0, 0); font-size: 20px">Tổng
                                                cộng</span>
                                            <span class="prices__value"
                                                style="color: #34495e; font-weight: bold; font-size: 20px">{{ number_format($totalCost, 0) }}đ</span>
                                        </li>

                                    </ul>
                                    <div class="prices__total d-flex justify-content-between">

                                    </div>
                                </div>

                                <form action="{{ URL::to('/updateStatus/'.$order->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="select-method row">
                                        @if ($status == 1)
                                        @elseif ($status != 4)
                                            <select name="payment" id="payment" class="col-7">
                                                <option selected>Chọn phương thức thanh toán</option>
                                                @foreach ($paymentMethods as $paymentMethod)
                                                    <option class="mt-2 mb-2" value="{{ $paymentMethod->id }}">
                                                        {{ $paymentMethod->name }}</option>
                                                @endforeach
                                            </select>
                                            @php
                                                $vnd_to_usd = $totalCost / 23000;
                                            @endphp
                                            <div id="paypal-button" class="col-4" style="display: none"></div>
                                            <input type="hidden" name="" id="vnd_to_usd"
                                                value="{{ round($vnd_to_usd, 2) }}">
                                        @endif

                                    </div>
                                    @if ($status == 1)
                                        <button data-view-id="cart_navigation_proceed" data-toggle="modal"
                                            data-target="#exampleModalLong" type="button" class="cart__submit">Đặt dịch
                                            vụ</button>
                                    @elseif($status == 2)
                                        <button data-view-id="cart_navigation_proceed" type="submit"
                                            class="cart__submit">Xác nhận</button>
                                    @endif
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-12">
                <!-- Modal confirm order -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="background-color: #fff">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLongTitle" style="color: #218838">Thông báo</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color: #000">
                                <p>Bạn đã đặt dịch vụ thành công!</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal" id="btn-back-homepage"
                                    style="border-radius: 5px"
                                    onclick="window.location.href = '{{ route('home') }}' ">Đồng ý</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <!-- Modal confirm payment -->
                <div class="modal fade" id="confirm-payment" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="background-color: #fff">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLongTitle" style="color: #218838">Thông báo</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color: #000">
                                <p>Đơn hàng của bạn đã được duyệt! Nhân viên nhà hàng sẽ liên hệ bạn trong thời gian sớm
                                    nhất!</p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal" id="btn-confirm-payment"
                                    style="border-radius: 5px; font-size: 18px; width: 120px"
                                    onclick="window.location.href = '{{ URL::to('/updateStatus/' . $order->id) }}'">Đồng
                                    ý</button>
                            </div>
                            {{-- <form id="update-status-form" action="{{ route('updateStatus') }}" method="GET" style="display: none;">
                            @csrf
                        </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script src="{{ asset('public/front-end/js/cart.js?v=') . time() }}"></script>
    <script>
        $(document).ready(function() {
            var totalCost = document.getElementById('vnd_to_usd').value;
            paypal.Button.render({
                // Configure environment
                env: 'sandbox',
                client: {
                    sandbox: 'AeRp7Afqa-rfLMVHrUPL8-aMcfmKLt8EAArheOUkMwFyLuf3sALgxG7K3WhJ-fy_aZanCTeU-BBQQEG0',
                    production: 'demo_production_client_id'
                },
                // Customize button (optional)
                locale: 'en_US',
                style: {
                    size: 'small',
                    color: 'gold',
                    shape: 'pill',
                },

                // Enable Pay Now checkout flow (optional)
                commit: true,

                // Set up a payment
                payment: function(data, actions) {
                    return actions.payment.create({
                        transactions: [{
                            amount: {
                                total: `${totalCost}`,
                                currency: 'USD'
                            }
                        }]
                    });
                },
                // Execute the payment
                onAuthorize: function(data, actions) {
                    return actions.payment.execute().then(function() {
                        // Show a confirmation message to the buyer
                        window.alert('Thank you for your purchase!');
                    });
                }
            }, '#paypal-button');



            $('#payment').on('change', function(e) {
                e.preventDefault();
                var paymentId = $('#payment option').filter(':selected').val();
                if(paymentId == 2) {
                    $('#paypal-button').css("display", "block");
                } else {
                    $('#paypal-button').css("display", "none");
                }
            })
            })
    </script>
@endsection
