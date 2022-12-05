@extends('admin/layouts/masteradmin')
@section('content')
<div class="container-fluid pt-4 px-4 ">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Thêm Hãng Xe</h6>
                <form action="/admin/category/store" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Mã Loại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="idcat">
                            @error('idcat')
                                <p class="alert alert-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Tên Loại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="name">
                            @error('name')
                                <p class="alert alert-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    
                    
                    <p class="d-flex justify-content-end">
                        <input type="submit" class="btn btn-success me-2" value="Thêm">
                        
                        <a href="/admin/category" class="btn btn-danger me-2">Trở về</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@stop