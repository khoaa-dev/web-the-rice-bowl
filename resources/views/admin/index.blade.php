@extends('admin.templates.admin-page')

@section('css')
    <!-- bootstrap-progressbar -->
    <link
        href="{{ asset('public/front-end/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('public/front-end/admin/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('public/front-end/admin/vendors/bootstrap-daterangepicker/daterangepicker.css') }}"
        rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" 
      rel="stylesheet" type="text/css" />   
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="col-md-12" style="display: inline-block;"">
            <div class="tile_count">
                <div class="col-md-3 col-sm-4  tile_stats_count">
                    <span class="count_top" style="font-size: 20px"> Số lượng người dùng</span>
                    <div class="count">
                        {{ $numberUser }}
                    </div>
                    <span class="count_bottom"><i class="green">3% </i> hôm qua</span>
                </div>
                <div class="col-md-3 col-sm-4  tile_stats_count">
                    <span class="count_top" style="font-size: 20px">Số lượng dịch vụ</span>
                    <div class="count">
                        {{ $numberService }}
                    </div>
                    
                    <span class="count_bottom"><i class="green">34% </i> hôm
                        qua</span>
                </div>
                <div class="col-md-3 col-sm-4  tile_stats_count">
                    <span class="count_top" style="font-size: 20px"> Số lượng món ăn</span>
                    <div class="count">
                        {{ $numberFood }}
                    </div>
                    <span class="count_bottom"><i class="red">12% </i> hôm
                        qua</span>
                </div>
                <div class="col-md-3 col-sm-4  tile_stats_count">
                    <span class="count_top" style="font-size: 20px"> Số lượng đơn đặt hàng</span>
                    <div class="count">
                        {{ $numberOrder }}
                    </div>
                    <span class="count_bottom"><i class="red">12% </i> hôm
                        qua</span>
                </div>
            </div>
        </div>
        <!-- /top tiles -->

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <form autocomplete="off">
                    @csrf
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>THỐNG KÊ <small>doanh thu theo ngày tháng</small></h3>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p>Từ ngày:</p> <input type="text" id="datepicker" class="date form-control" name="from_date">
                    </div>
                    <div class="col-md-2">
                        <p>Đến ngày:</p> <input type="text" id="datepicker2" class="date form-control" name="to_date">
                    </div>
                    <div class="col-md-2">
                        <input style="margin-top: 40px !important" type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm mt-3" value="Lọc kết quả" >
                    </div>
                    <div class="col-md-12">
                        <div id="chart" style="height: 250px;"></div>
                    </div>
                                        
                </form>
                <form autocomplete="off">
                    @csrf
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>THỐNG KÊ <small>đơn đặt hàng theo dịch vụ</small></h3>
                        </div>
                    </div>
                    <select name="categoryId" id="categoryId" class="custom-select">
                        @foreach ($services as $service)
                          <option class="p-2" value="{{ $service->id }}">{{ $service->name }}</option>
                            
                        @endforeach
                    </select>
                    <div class="col-md-12">
                        <div id="chart1" style="height: 250px;"></div>
                    </div>          
                </form>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

@section('js')


    <!-- Chart.js -->
    <script src="{{ asset('public/front-end/admin/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('public/front-end/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <!-- Skycons -->
    <script src="{{ asset('public/front-end/admin/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('public/front-end/admin/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('public/front-end/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('public/front-end/admin/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('public/front-end/admin/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('public/front-end/admin/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    {{-- <script src=
    "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js">
    </script> 
    <script src=
        "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
    </script>      
    <script src=
        "http://code.jquery.com/ui/1.11.4/jquery-ui.js">
    </script> --}}

<!---- --->
<script type="text/javascript">
    $('#datepicker').datepicker({  
        dateFormat: 'yy-mm-dd'
    });  
    $('#datepicker2').datepicker({  
        dateFormat: 'yy-mm-dd'
    });  
</script> 
<script type="text/javascript">
    $(document).ready(function(){
        var chart = new Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'chart',
        lineColors: ['#819C79', '#fc8710', '#FF6541'],
        parseTime: false,
        hideHover: 'auto',
        xkey: 'date',
        ykeys: ['sumRevenues'],
        labels: ['Tổng doanh thu']
        });

        var chart1 = new Morris.Area({
        // ID of the element in which to draw the chart.
        element: 'chart1',
        lineColors: ['#104E8B', '#1C86EE'],
        parseTime: false,
        hideHover: 'auto',
        xkey: 'organizationDate',
        ykeys: ['number'],
        labels: ['Số lượng đơn hàng']
        });

        $('#btn-dashboard-filter').click(function(){
            var _token = $('input[name="_token"]').val();
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();
            var serviceId = $('#categoryId').val();
            $.ajax({
                url:"{{URL::to('/filter-by-date')}}",
                method:"POST",
                dataType:"JSON",
                data:{from_date:from_date, to_date:to_date, _token:_token},
                success:function(data){
                    chart.setData(data);
                }
            });
            $.ajax({
                url:"{{URL::to('/filter-by-date1')}}",
                method:"POST",
                dataType:"JSON",
                data:{from_date:from_date, to_date:to_date, _token:_token, serviceId:serviceId},
                success:function(data){
                    chart1.setData(data);
                    // console.log(data);
                }
            });
        });

        $('#categoryId').on('change', function(e) {
            e.preventDefault();
            // alert('khoa dz');
            var _token = $('input[name="_token"]').val();
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();
            var serviceId = $('#categoryId').val();
            $.ajax({
                url:"{{URL::to('/filter-by-date1')}}",
                method:"POST",
                dataType:"JSON",
                data:{from_date:from_date, to_date:to_date, _token:_token, serviceId:serviceId},
                success:function(data){
                    chart1.setData(data);
                    // console.log(data);
                }
            })
        });
    });
</script>
@endsection
