@extends('client/layouts/master')
@section('content')
@csrf 
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <p><a href="/client/oto" class="btn btn-primary" style="margin-top: 10px;">Bạn có muốn tiếp tục mua hàng?</a></p>
                <h1>GIỎ HÀNG NÈ</h1>
                <table class="table table-striped table-hover" id='cart'>
                    <thead>
                        <tr>
                            <td scope="col">Mã sp</td>
                            <td scope="col">Tên sp</td>
                            <td scope="col">Img</td>
                            <td scope="col">Số lượng</td>
                            <td scope="col">Giá</td>
                            <td scope="col">Thành tiền</td>
                            <td scope="col">#</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- {{Cart::content()}} -->
                        <?php $tong = 0; ?>
                        @foreach(Cart::content() as $item)
                        <?php $tong = $item->qty * $item->price; ?>
                        <tr>
                            <th>{{$item->id}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->img}}</td>
                            <td>
                                <input type="number" value='{{$item->qty}}' data-id='{{$item->rowId}}'>
                            </td>
                            <td>{{$item->price}}</td>
                            <td>{{number_format($item->qty * $item->price)}}</td>
                            <td>
                                <a href="/client/cart/remove/{{$item->rowId}}" class="btn btn-danger">xóa</a>
                            </td>
                        </tr>
                        
                        @endforeach
                        <tr>
                            <td colspan="4"></td>
                            <td colspan="" class="d-flex justify-content-end">Tổng đơn hàng:</td>
                            <td>{{Cart::subtotal()}} vnđ</td>
                            <td>{{Cart::count()}} sản phẩm</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="clearfix visible-sm visible-xs"></div>

                    <div class="clearfix visible-lg visible-md"></div>

                    <div class="clearfix visible-sm visible-xs"></div>

                    <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>

                    <div class="clearfix visible-sm visible-xs"></div>
        </div>
        <div class="row">
            <div class="col-sm-9"></div>
            <div class="col-sm-3">

                @if(Cart::count()>0)
                <p><a href="/client/checkout" class="btn btn-primary">THANH TOÁN </a></p>
                @endif
                {{-- <p>{{Cart::subtotal()}} -> Tổng số tiền cần thanh toán</p> --}}
                {{-- <p>{{Cart::count()}} -> trả về số item tất cả sp</p>
                <p>{{Cart::content()->count()}} ->Đếm số sp</p> --}}
            </div>
        </div>
    </div>
</div>

@stop

@section('script')
<script>
    $(document).ready(
        function(){
          $('#cart input[type=number]').on('change', function(){
               // alert($(this).val() );
             // alert( $(this).data('id') );
             if ($(this).val() <=0)
             {
                $(this).val(1);
                return;
             }
             
             $.ajax({
                url:'/client/cart/edit', 
                type:'post',
                data:{rowId:$(this).data('id'), qty:$(this).val(), _token: $('input[name=_token]').val() },
                dataType:'json',
                success:function(dataReturn)
                {
                    console.log(dataReturn);
                    $('#qty').html(dataReturn.n);
                }
             });
          });
        }
    );
</script>
@stop 