@extends('admin/layouts/masteradmin')
@section('content')
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Quản lý Product</h6>
                <p><a href="/admin/product/create" class="btn btn-success">Thêm</a></p>
                @if(session()->has('mess'))
                <p class="alert alert-primary sm-4">
                    {{session('mess')}}
                </p>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Giá</th>
                            {{-- <th scope="col">Ảnh</th> --}}
                            <th scope="col">Gía Khuyến Mãi</th>
                            <th scope="col">Tên Hãng</th>
                            <th ></th> 
                        
                        </tr>
                    </thead>
                    @foreach($data as $item)
                    <tbody>
                        <tr>
                            <td>{{$item->idproduct}}</td>
                            <td>{{$item->ten}}</td>
                            <td>{{$item->mota}}</td>
                            <td>{{$item->gia}}</td>
                            {{-- <td>{{$item->img}}</td> --}}
                            <td>{{$item->gia_km}}</td>
                            <td>{{$item->idcat}}</td>

                            <th>
                                <form action="/admin/product/destroy/{{$item->idproduct}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="submit" value="xóa" class="btn btn-danger">
                                </form>
                            </th>
                            <th>
                                <a href="/admin/product/edit/{{$item->idcat}}" class="btn btn-success"> sửa</a>
                            </th>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach

                </table>
            </div>
        </div>

    </div>
</div>
<!-- Table End -->
@stop