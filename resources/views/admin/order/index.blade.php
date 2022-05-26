@extends('admin.templates.admin-page')

@section('css')
<style>
  .tabs {
      display: flex;
      position: relative;
  }
  .tabs .line {
      position: absolute;
      left: 0;
      bottom: 0;
      width: 0;
      height: 6px;
      border-radius: 15px;
      background-color: #1959ad;
      transition: all 0.2s ease;
  }
  .tab-item {
      /* min-width: 80px; */
      padding: 16px 20px 11px 20px;
      font-size: 20px;
      text-align: center;
      color: #c23564;
      background-color: #fff;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
      border-bottom: 5px solid transparent;
      opacity: 0.6;
      cursor: pointer;
      transition: all 0.5s ease;
  }
  .tab-icon {
      font-size: 24px;
      width: 32px;
      position: relative;
      top: 2px;
  }
  .tab-item:hover {
      opacity: 1;
      background-color: rgba(194, 53, 100, 0.05);
      border-color: rgba(194, 53, 100, 0.1);
      text-decoration: none;
      color: #be2424;
  }
  .tab-item.active {
      opacity: 1; 
  }
  .tab-content {
      padding: 28px 0;
      width: 100%;
  }
  .tab-pane {
      color: #333;
      display: none;
  }
  .tab-pane.active {
      display: block;
  }
  .tab-pane h2 {
      font-size: 24px;
      margin-bottom: 8px;
  }
</style>
@endsection

@section('content')
    <div class="right_col" role="main" style="min-height: 1000px">
      <div class="col-12">
        <h1 class="text-center">QUẢN LÝ ĐƠN HÀNG</h1>
        <ul class="nav nav-tabs nav-tab tabs d-flex text-center col-12" style="background: #eaeaea"> 
            <li class="tab-item active col-6"><a data-toggle="tab" href="#tab-9-3" data-case="HDLocal">Đơn hàng chờ duyệt</a></li>
            <li class="tab-item col-6"><a data-toggle="tab" href="#tab-9-1" data-case="HDPassenger">Đơn hàng đã duyệt</a></li>
            <div class="line"></div>
        </ul>
      </div>

      <div class="col-12">
        <div class="tab-pane active">
          <div class="row">
            <div class="x_panel">
                <div class="p-2">
                    <h2>Danh sách đơn hàng</h2>
                </div>
    
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action" >
                            <thead>
                                <tr class="headings text-center" style="font-size: 20px">
                                    <th class="column-title" style="width: 10%">STT </th>
                                    <th class="column-title" style="width: 18%">Tên người đặt </th>
                                    <th class="column-title" style="width: 18%">Loại dịch vụ </th>
                                    <th class="column-title" style="width: 18%">Ngày đặt </th>
                                    <th class="column-title" style="width: 18%">Trạng thái </th>
                                    <th class="column-title" style="width: 18%">Hành động </th>
                                </tr>
                            </thead>
    
                            <tbody class="text-center" style="font-size: 16px">
                                
                                @foreach ($pendingOrders as $pendingOrder)
                                    <tr class="even pointer">
                                        <td class="align-items-center ">{{ ++$i1 }}</td>
                                        <td class="align-items-center ">{{ $pendingOrder->users->fullName }}</td>
                                        <td class="align-items-center ">{{ $pendingOrder->services->name }}</td>
                                        <td class="align-items-center ">{{ $pendingOrder->created_at }}</td>
                                        <td class="align-items-center ">{{ $pendingOrder->order_status->name }}</td>
                                        <td class=" last">
                                          <a class="btn btn-warning" href="{{URL::to('/admin/confirmOrder/'.$pendingOrder->id)}}">Xem</a>
                                          <a class="btn btn-warning" href="#">Duyệt</a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{-- {{ $accountUsers->links() }} --}}
                        </div>
                    </div>
    
    
                </div>
            </div>
          </div>
        </div>

        <div class="tab-pane">
          <div class="row">
            <div class="x_panel">
                <div class="p-2">
                    <h2>Danh sách đơn hàng</h2>
                </div>
    
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action" >
                            <thead>
                                <tr class="headings text-center" style="font-size: 20px">
                                    <th class="column-title" style="width: 10%">STT </th>
                                    <th class="column-title" style="width: 18%">Tên người đặt </th>
                                    <th class="column-title" style="width: 18%">Loại dịch vụ </th>
                                    <th class="column-title" style="width: 18%">Ngày đặt </th>
                                    <th class="column-title" style="width: 18%">Trạng thái </th>
                                    <th class="column-title" style="width: 18%">Hành động </th>
                                </tr>
                            </thead>
    
                            <tbody class="text-center" style="font-size: 16px">
                                
                                @foreach ($approvedOrders as $approvedOrder)
                                    <tr class="even pointer">
                                        <td class="align-items-center ">{{ ++$i2 }}</td>
                                        <td class="align-items-center ">{{ $approvedOrder->users->fullName }}</td>
                                        <td class="align-items-center ">{{ $approvedOrder->services->name }}</td>
                                        <td class="align-items-center ">{{ $approvedOrder->created_at }}</td>
                                        <td class="align-items-center ">{{ $approvedOrder->order_status->name }}</td>
                                        <td class=" last">
                                          {{-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalViewDetailOrder"
                                          >Xem chi tiết</button> --}}
                                          <button type="button" class="btn btn-warning" id="btn-view-order"
                                          >Xem chi tiết</button>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $approvedOrders->links() }}
                        </div>
                    </div>
    
    
                </div>
            </div>

            <!-- Modal view detail order --> 
            <div class="modal fade" id="modalViewDetailOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"         aria-hidden="true">
                <div class="modal-dialog modal-dialog-top" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    {{-- <button type="button" class="btn btn-primary">Duyệt đơn hàng</button> --}}
                    </div>
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
{{-- Switch --}}
<script>

  const tabs = document.querySelectorAll('.tab-item');
  const panes = document.querySelectorAll('.tab-pane');

  const tabActive = document.querySelector('.tab-item.active');
  const line = document.querySelector('.tabs .line');

  line.style.left = tabActive.offsetLeft + 'px';
  line.style.width = tabActive.offsetWidth + 'px';

  tabs.forEach((tab, index) => {
      const pane = panes[index];

      tab.onclick = function() {
        document.querySelector('.tab-item.active').classList.remove('active');
        document.querySelector('.tab-pane.active').classList.remove('active');

          line.style.left = this.offsetLeft + 'px';
          line.style.width = this.offsetWidth + 'px';

          this.classList.add('active');
          pane.classList.add('active');
      }
  });
  
</script>

{{-- View detail order --}}
<script>
    
</script>
@endsection