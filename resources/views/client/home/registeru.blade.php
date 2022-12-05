@extends('client/layouts/master')
@section('content')

<div class="container">
    <div class="row d-flex justify-content-center ">
        <div class="col-sm-4"></div>
        <div class="col-md-4">
            <h1>
                @if(session()->has('error'))
                {{session()->get('error')}}
                @endif
            </h1>
            <form action="/client/registeruser" method="POST">
                @csrf
                <div class="bg-white rounded d-flex justify-content-center">
                    <div class="d-flex align-items-center justify-content-between mb-3 mt-3">
                        <h3>Tạo tài khoản</h3>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Họ tên</label>
                        <input type="text" name="hoten" class="form-control" placeholder="Thành Nguyên">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Số điện thoại</label>
                        <input type="text" name="sdt" class="form-control" placeholder="+84">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Địa chỉ</label>
                        <input type="text" name="diachi" class="form-control" placeholder="180 Đ. Cao Lỗ, Phường 4, Quận 8, TP.HCM">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Email address</label>
                        <input type="text" name="u" class="form-control" placeholder="name@example.com">
                    </div>
                    <div class="form-floating mb-4">
                        <label for="floatingPassword">Password</label>
                        <input type="password" name="p" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-floating mb-4">
                        <label for="floatingPassword">Confirm password</label>
                        <input type="password" name="p2" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" value="dangky" class="btn btn-danger mt-10 mb-4" style="margin-top: 6px;">Đăng ký</button>
                    <p class="text-center mb-0">Bạn đã có tài khoản? <a href="/client/loginuser">Đăng nhập</a></p>
                </div>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

@stop