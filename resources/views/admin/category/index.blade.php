@extends('admin/layouts/masteradmin')
@section('content')
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Quản lý category</h6>
                <p><a href="/admin/category/create" class="btn btn-success">Thêm</a></p>
                @if(session()->has('mess'))
                <p class="alert alert-primary sm-4">
                    {{session('mess')}}
                </p>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Mã Loại</th>
                            <th scope="col">Tên Loại</th>
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>
                    @foreach($data as $item)
                    <tbody>
                        <tr>
                            <td>{{$item->idcat}}</td>
                            <td>{{$item->name}}</td>
                            <th>
                                <form action="/admin/category/destroy/{{$item->idcat}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="submit" value="xóa" class="btn btn-danger">
                                </form>
                            </th>
                            <th>
                                <a href="/admin/category/edit/{{$item->idcat}}" class="btn btn-success"> sửa</a>
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