@extends('admin/layouts/masteradmin')
@section('content')
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Quản lý users</h6>
                <p><a href="/admin/users/create" class="btn btn-success">Thêm</a></p>
                <p>
                    <button class='addUser'>Them</button>
                </p>
                <table class="table table-striped" id='users'>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Sdt</th>
                            <th scope="col">Email</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Mật khẩu</th>
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)

                        <tr>
                            <td>{{$item->idusers}}</td>
                            <td>{{$item->hoten}}</td>
                            <td>{{$item->sdt}}</td>
                            <td>{{$item->email}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <!-- <th>
                                <form action="/admin/users/destroy" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="idusers" value="{{$item->idusers}}">
                                    <input type="submit" value="xóa" class="btn btn-danger">
                                </form>
                            </th>
                            <th>
                                <form action="/admin/users/edit" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="update">
                                    <input type="hidden" name="idusers" value="{{$item->idusers}}">
                                    <input type="submit" value="sửa" class="btn btn-primary">
                                </form>
                                <!-- <form action="/admin/users/edit" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="cat_id" value="{{$item->cat_id}}">
                                    <input type="submit" value="sửa" class="btn btn-primary">
                                </form> -->
                            </th> -->
                            </td>
                        </tr>
                   
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<!-- Table End -->


      <!-- Modal -->
      <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form>
                            @csrf
                        <table>
                            <tr>
                                <td>Ho ten</td>
                                <td>
                                    <input type="text" name='hoten' class='form-control'>
                                </td>
                            </tr>
                            <tr>
                                <td>So dt</td>
                                <td><input type="text" name='sdt'></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                <input type="email" name='email'>
                                </td>
                            </tr>
                            <tr>
                                <td>Gioi tinh</td>
                                <td>
                                    <input type="radio" name='gt' value='1'>Nam 
                                    <input type="radio" name='gt' value='0' checked>Nu 
                                </td>
                            </tr>
                            <tr>
                                <td>dia chi</td>
                                <td>
                                    <input type="text" name='diachi'>
                                </td>
                            </tr>
                            <tr>
                                <td>Ngay sinh</td>
                                <td>
                                    <input type="date" name='ngaysinh'>
                                </td>
                            </tr>
                            <tr>
                                <td>MKhau</td>
                                <td>
                                    <input type="password" name='password'>
                                </td>
                            </tr>
                            
                        </table>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary storeUser">Save</button>
                </div>
            </div>
        </div>
      </div>
@stop

@section('script')
<script>
    $(document).ready(
        function(){
           
            $('button.addUser').click(
               function(){
                $('#modelId').modal('show');
               }
                
            );

            $('button.storeUser').click(function(){
                $.ajax({
                    url:'/admin/users/store1',
                    type:'post',
                    data: $('#modelId form').serializeArray() ,
                    dataType:'json',
                    success:function(s)
                    {
                        console.log(s);
                        t=` <tr>
                            <td>${s.idusers}</td>
                            <td>${s.hoten}</td>
                            <td>${s.sdt}</td>
                            <td>${s.email}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>`;
                        $('table#users tbody').append(t);
                        $('#modelId').modal('hide');
                    }
                });
            });

        }
    );
    </script>
@stop 