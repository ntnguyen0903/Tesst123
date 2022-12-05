@extends('admin/layouts/masteradmin')
@section('content')
<div class="container-fluid pt-4 px-4 ">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Cập nhật Ô  tô</h6>
                <form action="/admin/category/update" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="idproduct" value="{{$data->idproduct}}">
                            @error('idproduct')
                                <p class="alert alert-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Tên</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="name" value="{{$data->ten}}">
                            @error('ten')
                                <p class="alert alert-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Mô  tả</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="mota" value="{{$data->mota}}">
                            @error('mota')
                                <p class="alert alert-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Gia</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="idproduct" value="{{$data->gia}}">
                            @error('gia')
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