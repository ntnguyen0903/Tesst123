@extends('client/layouts/master')
@section('content')
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Checkout</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Billing address</h3>
                    </div>
                    <form action="/client/checkout" method="post">
                        @csrf
                        <div class="form-group">
                            <input class="input" type="text" name="tennguoinhan" placeholder="Ten nguoi nhan" value="{{session('users')['hoten']}}">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="diachinguoinhan" placeholder="Dia chi" value="{{session('users')['diachi']}}">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="sdt" placeholder="SDT" value="{{session('users')['sdt']}}">
                        </div>
                        <input type="submit" value="Đặt hàng" class="primary-btn order-submit">
                    </form>
                </div>

            </div>
            <?php $tong = 0; ?>
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Your Order</h3>
                </div>

                <div class="order-summary">
                    <div class="order-products">
                        <div class="order-col">

                            <div><strong>PRODUCT</strong></div>
                            <div><strong>TOTAL</strong></div>


                        </div>
                        <?php $tong = 0; ?>
                        @foreach(Cart::content() as $item)
                        <?php $tong += $item->qty * $item->price; ?>
                        <div class="order-col">
                            <div>{{$item->qty}} x {{$item->name}}</div>
                            <div>{{number_format($item->qty * $item->price)}}</div>
                        </div>
                        @endforeach
                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total"></strong>{{number_format($tong)}} vnd</div>
                        </div>
                    </div>

                    <!-- <a href="#" class="primary-btn order-submit">Place order</a> -->

                </div>


                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
</div>
<!-- /SECTION -->

@stop