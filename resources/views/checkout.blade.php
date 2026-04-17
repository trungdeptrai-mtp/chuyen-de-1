<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h3 class="mb-4">💳 Thanh toán</h3>

    @php
        $cart = session('cart', []);
        $total = 0;
    @endphp

    <div class="row">

        <!-- THÔNG TIN -->
        <div class="col-md-6">
            <form action="/place-order" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Họ tên</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Địa chỉ</label>
                    <textarea name="address" class="form-control" required></textarea>
                </div>

                <!-- 🔥 PAYMENT -->
                <div class="mb-3">
                    <label>Phương thức thanh toán</label>

                    <select name="payment" id="payment" class="form-control">
                        <option value="cod">Thanh toán khi nhận hàng</option>
                        <option value="qr">Chuyển khoản QR</option>
                    </select>
                </div>

                <button class="btn btn-success w-100">
                    Xác nhận đặt hàng
                </button>
            </form>
        </div>

        <!-- ĐƠN HÀNG -->
        <div class="col-md-6">
            <div class="bg-white p-3 rounded shadow-sm">

                <h5>Đơn hàng</h5>

                @foreach($cart as $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp

                    <div class="d-flex justify-content-between border-bottom py-2">
                        <div>
                            {{ $item['name'] }} <br>
                            <small>x{{ $item['quantity'] }}</small>
                        </div>
                        <div>{{ number_format($subtotal) }} đ</div>
                    </div>
                @endforeach

                <h4 class="text-danger mt-3">
                    Tổng: {{ number_format($total) }} đ
                </h4>

            </div>

            <!-- 🔥 QR XỊN -->
           @php
    $bank = "mbbank"; 
    $stk = "5678929112004";
    $name = "NGUYEN THANH TRUNG";

    $amount = $total;
    $content = "DH" . time();

    $qr = "https://img.vietqr.io/image/{$bank}-{$stk}-compact.png?amount={$amount}&addInfo={$content}&accountName=" . urlencode($name);
@endphp

            <div id="qr-box" class="mt-3 p-3 bg-white rounded shadow-sm text-center" style="display:none;">
                <h6>Quét QR để thanh toán</h6>

                <img src="{{ $qr }}" class="img-fluid">
                     class="img-fluid">

                <p class="text-danger mt-2 fw-bold">
                    {{ number_format($total) }} đ
                </p>
            </div>

        </div>

    </div>

</div>

<!-- 🔥 JS -->
<script>
document.getElementById('payment').addEventListener('change', function() {
    if(this.value === 'qr'){
        document.getElementById('qr-box').style.display = 'block';
    } else {
        document.getElementById('qr-box').style.display = 'none';
    }
});
</script>

</body>
</html>