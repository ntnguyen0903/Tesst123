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
            <form action="/client/loginuser" method="POST">
                @csrf
                <div class="bg-white rounded d-flex justify-content-center">
                    <div class="d-flex align-items-center justify-content-between mb-3 mt-3">
                        <h3>Đăng nhập</h3>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Email address</label>
                        <input type="text" name="u" class="form-control" placeholder="name@example.com">
                    </div>
                    <div class="form-floating mb-4">
                        <label for="floatingPassword">Password</label>
                        <input type="password" name="p" class="form-control" placeholder="Password">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <a href="">Forgot Password</a>
                    </div>
                    <button type="submit" value="dangnhap" class="btn btn-danger mt-4 mb-4">Đăng nhập</button>
                    <p class="text-center mb-0">Bạn chưa có tài khoản? <a href="/client/registeruser">Đăng ký</a></p>
                </div>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

@stop