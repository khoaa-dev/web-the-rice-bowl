@extends('admin.templates.admin-page')

@section('css')

@endsection

@section('content')
    <div class="right_col" role="main" style="min-height: 2000px">
      <div class="row">
        <div class="col-12">
          <div class="status">
            @if (session('status'))
              <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="d-flex justify-content-between"> Chi tiết đơn hàng
                <a href="{{ route('orderManagement') }}" class="btn btn-primary float-end">Trở lại trang trước</a>
              </h4>
            </div>
            <div class="card-body" style="font-size: 20px">
              <form action="{{ URL::to('/admin/confirmOrder/'.$order->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label for="name">Loại dịch vụ:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$order->service->name}}" disabled>
              </div>
              <div class="form-group">
                <label for="price">Số lượng người:</label>
                <input type="number" name="price" id="price" class="form-control" value="{{$order->peopleNumber}}" disabled>
              </div>
    
              <div class="form-group">
                <label for="image">Ngày tổ chức:</label>
                <input type="text" name="image" id="image" class="form-control" value="{{$order->organizationDate}}" disabled> 
              </div>
              <div class="form-group">
                <label for="image">Phương thức thanh toán:</label>
                <input type="text" name="image" id="image" class="form-control" value="{{$order->payment->name}}" disabled> 
              </div>
              <div class="form-group">
                <label for="image">Thực đơn:</label>
                <div class="x_content">
                  <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" >
                          <thead>
                              <tr class="headings text-center" style="font-size: 20px">
                                  <th class="column-title" style="width: 10%">STT </th>
                                  <th class="column-title" style="width: 18%">Tên món ăn</th>
                                  <th class="column-title" style="width: 18%">Giá </th>
                                  <th class="column-title" style="width: 18%">Hình ảnh </th>
                              </tr>
                          </thead>
        
                          <tbody class="text-center" style="font-size: 16px">
                              
                              @foreach ($order_foods as $order_food)
                                  <tr class="even pointer">
                                      <td class="align-items-center ">{{ ++$i }}</td>
                                      <td class="align-items-center ">{{ $order_food->food->name }}</td>
                                      <td class="align-items-center ">{{ number_format($order_food->food->price, 0) }}</td>
                                      <td class="align-items-center ">
                                        <img src="{{ asset($order_food->food->image) }}" width="70px" height="70px" alt="">
                                      </td>
                                  </tr>
                              @endforeach
                              
                          </tbody>
                      </table>
        
                      <div class="d-flex justify-content-center">
                          {{-- {{ $foods->links() }} --}}
                      </div>
                  </div>
        
        
                </div>
                {{-- <input type="text" name="image" id="image" class="form-control" value="{{$order->payment->name}}" disabled>  --}}
              </div>
              </div>
              <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-4">Duyệt đơn hàng</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
    
@endsection