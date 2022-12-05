<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Thông báo xác nhận đơn hàng nè</h1>
    <h1>Cám ơn quý khách đã mua hàng</h1>
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
</body>

</html>