<!DOCTYPE html>
<html>
<head>
    <title>Đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <!-- 🔥 2 NÚT -->
    <div class="mb-3 d-flex gap-2">
        <a href="/" class="btn btn-dark">🏠 Trang chủ</a>
        <a href="/cart" class="btn btn-outline-primary">🛒 Giỏ hàng</a>
    </div>

    <h3 class="mb-4">📦 Đơn hàng của bạn</h3>

    @foreach($orders as $order)
        <div class="border p-3 mb-3 bg-white rounded">

            <b>{{ $order['name'] }}</b> - {{ $order['phone'] }} <br>
            {{ $order['address'] }} <br>

            <b>Thanh toán:</b> 
            {{ $order['payment'] == 'cod' ? 'COD' : 'QR' }}

            <hr>

            @foreach($order['items'] as $item)
                <div>
                    {{ $item['name'] }} x{{ $item['quantity'] }}
                </div>
            @endforeach

        </div>
    @endforeach

</div>

</body>
</html>