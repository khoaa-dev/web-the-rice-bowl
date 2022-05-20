@extends('profile.profile')



@section('profile-body')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h6 class="mb-3 text-primary" style="font-size: 20px; font-weight: bold;">Thông tin cá nhân</h6>
        </div>
        @csrf
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label for="fullName" style="font-size: 18px; color: #fac564; font-weight: normal; ">Họ và tên</label>
                <input style="font-size: 18px; color: #fff !important;" type="text" class="form-control" id="fullName"
                    placeholder="Nhập họ và tên" value="{{ $user->fullName }}">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label for="eMail" style="font-size: 18px; color: #fac564; font-weight: normal; ">Email</label>
                <input style="font-size: 18px; color: #fff !important;" type="email" class="form-control" id="email"
                    placeholder="Nhập email" value="{{ $user->email }}">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label for="phone" style="font-size: 18px; color: #fac564; font-weight: normal; ">Số điện thoại</label>
                <input style="font-size: 18px; color: #fff !important;" type="text" class="form-control" id="phone"
                    placeholder="Nhập số điện thoại" value="{{ $user->phone }}">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label for="website" style="font-size: 18px; color: #fac564; font-weight: normal; ">Ngày sinh</label>
                <input style="font-size: 18px; color: #fff !important;" type="url" class="form-control" id="dob"
                    placeholder="Nhập ngày sinh" value="{{ $user->dob }}">
            </div>
        </div>
    </div>
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
            <h6 class="mb-3 text-primary" style="font-size: 20px; color: #fac564; font-weight: bold; ">Địa chỉ</h6>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="form-group">
                <label for="Street" style="font-size: 18px; color: #fac564; font-weight: normal; ">Số nhà</label>
                <input style="font-size: 18px; color: #fff !important;" type="name" class="form-control" id="houseNumber"
                    placeholder="Nhập số nhà" value="{{ $user->houseNumber }}">
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
            <div class="form-group">
                <label for="ciTy" style="font-size: 18px; color: #fac564; font-weight: normal; ">Tên đường/Thôn</label>
                <input style="font-size: 18px; color: #fff !important;" type="name" class="form-control" id="street"
                    placeholder="Nhập tên đường" value="{{ $user->street }}">
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="form-group">
                <label for="sTate" style="font-size: 18px; color: #fac564; font-weight: normal; ">Thành phố</label>
                {{-- <input type="text" class="form-control" id="sTate" placeholder="Thành phố"> --}}
                <select style="font-size: 18px; color: #fff !important; " id="province" name="provinceId"
                    class="form-control">
                    @if (isset($province))
                        <option style="font-size: 18px;" value="{{ $province->id }}">
                            {{ $province->name }}
                        </option>
                    @else
                        <option style="font-size: 18px;" value="">-Chọn-</option>

                    @endif
                    @foreach ($provinces as $province)
                        <option style="font-size: 18px; background-color: #272E48;" value="{{ $province->id }}">
                            {{ $province->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="form-group">
                <label for="sTate" style="font-size: 18px; color: #fac564; font-weight: normal; ">Quận/Huyện </label>
                {{-- <input type="text" class="form-control" id="sTate" placeholder="Thành phố"> --}}
                <select style="font-size: 18px; color: #fff !important; " id="district" name="provinceId"
                    class="form-control">
                    @if (isset($district))
                        <option style="font-size: 18px;" value="{{ $district->id }}">
                            {{ $district->name }}
                        </option>
                    @else
                        <option style="font-size: 18px;" value="">-Chọn-</option>

                    @endif
                    {{-- @foreach ($provinces as $province)
            <option style="font-size: 18px; background-color: #272E48;" value="{{ $province->id }}">{{ $province->name }}</option>
        @endforeach --}}
                </select>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="form-group">
                <label for="sTate" style="font-size: 18px; color: #fac564; font-weight: normal; ">Phường/Xã</label>
                {{-- <input type="text" class="form-control" id="sTate" placeholder="Thành phố"> --}}
                <select style="font-size: 18px; color: #fff !important; " id="village" name="provinceId"
                    class="form-control">
                    @if (isset($village))
                        <option style="font-size: 18px;" value="{{ $village->id }}">
                            {{ $village->name }}
                        </option>
                    @else
                        <option style="font-size: 18px;" value="">-Chọn-</option>

                    @endif
                    {{-- @foreach ($provinces as $province)
            <option style="font-size: 18px; background-color: #272E48;" value="{{ $province->id }}">{{ $province->name }}</option>
        @endforeach --}}
                </select>
            </div>
        </div>
        {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
      <label for="zIp">Phường/Xã</label>
      <input type="text" class="form-control" id="zIp" placeholder="Zip Code">
    </div>
  </div> --}}
    </div>
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="text-right">
                <button type="button" id="btn-refresh" name="submit" class="btn btn-secondary"
                    style="font-size: 16px; border-radius: 5px">Hủy</button>
                <button type="button" id="btn-update-infor-user" name="submit" class="btn btn-primary"
                    style="font-size: 16px; border-radius: 5px">Cập nhật</button>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            //Select district by province
            $('#province').on('change', function(e) {
                e.preventDefault();
                var provinceId = $('#province option').filter(':selected').val();
                var _token = $('input[name=_token]').val();
                $.ajax({
                    url: '{{ route('getDistrict') }}',
                    method: 'POST',
                    data: {
                        provinceId: provinceId,
                        _token: _token
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $('#district').html(data);
                        // alert('success');
                    }
                })
            })

            //select village by district
            $('#district').on('change', function(e) {
                e.preventDefault();
                var districtId = $('#district option').filter(':selected').val();
                var _token = $('input[name=_token]').val();
                $.ajax({
                    url: '{{ route('getVillage') }}',
                    method: 'POST',
                    data: {
                        districtId: districtId,
                        _token: _token
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $('#village').html(data);
                    }
                })
            })

            //Update infor
            $('#btn-update-infor-user').on('click', function(e) {
                e.preventDefault();
                // $("#dialog").dialog("open");
                var fullName = $('#fullName').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var dob = $('#dob').val();
                var houseNumber = $('#houseNumber').val();
                var street = $('#street').val();
                var villageId = $('#village option').filter(":selected").val();
                // var id = {{ $id }};
                var _token = $('input[name=_token]').val();
                $.ajax({
                    url: '{{ route('updateInfor') }}',
                    method: 'POST',
                    data: {
                        fullName: fullName,
                        email: email,
                        phone: phone,
                        dob: dob,
                        houseNumber: houseNumber,
                        street: street,
                        villageId: villageId,
                        _token: _token
                    },
                    dataType: "JSON",
                    success: function(data) {
                        alert('success');


                    }
                })
            })
        })
    </script>
@endsection
