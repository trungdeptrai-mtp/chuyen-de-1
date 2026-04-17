<!DOCTYPE html>
<html>
<head>
    <title>Giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f8f9fa; }

        /* ITEM */
        .cart-item {
            background: #fff;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: 0.3s;
        }

        .cart-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        }

        .cart-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }

        /* NAME */
        .cart-name {
            font-weight: 600;
            font-size: 14px;
        }

        .cart-price {
            font-size: 13px;
            color: #888;
        }

        /* QUANTITY */
        .qty-box {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .qty-btn {
            width: 30px;
            height: 30px;
            border: none;
            background: #f1f1f1;
            font-weight: bold;
        }

        .qty-btn:hover {
            background: #ddd;
        }

        .qty-number {
            width: 40px;
            text-align: center;
        }

        /* TOTAL */
        .item-total {
            font-weight: bold;
            color: #e74c3c;
            min-width: 100px;
            text-align: right;
        }

        /* CHECKOUT BOX */
        .checkout-box {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            position: sticky;
            top: 20px;
        }

        .checkout-box h3 {
            font-weight: bold;
        }

        /* EMPTY */
        .empty-cart {
            text-align: center;
            padding: 50px;
            background: #fff;
            border-radius: 12px;
        }

        .empty-cart img {
            width: 120px;
            opacity: 0.5;
        }

    </style>
</head>
<body>

<div class="container mt-5">

    <h3 class="mb-4">🛒 Giỏ hàng của bạn</h3>

    <?php 
        $cart = session('cart', []);
        $total = 0;
    ?>

    <?php if(count($cart) > 0): ?>

    <div class="row">

        <!-- DANH SÁCH -->
        <div class="col-md-8">

            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>

                <div class="cart-item">

                    <img src="<?php echo e($item['image']); ?>" class="cart-img">

                    <div style="flex:1;">
                        <div class="cart-name"><?php echo e($item['name']); ?></div>
                        <div class="cart-price"><?php echo e(number_format($item['price'])); ?> đ</div>
                    </div>

                    <!-- SỐ LƯỢNG -->
                    <div class="qty-box">
                        <a href="/decrease/<?php echo e($id); ?>" class="qty-btn">-</a>
                        <div class="qty-number"><?php echo e($item['quantity']); ?></div>
                        <a href="/increase/<?php echo e($id); ?>" class="qty-btn">+</a>
                    </div>

                    <!-- TỔNG -->
                    <div class="item-total">
                        <?php echo e(number_format($subtotal)); ?> đ
                    </div>

                    <!-- XOÁ -->
                    <a href="/remove/<?php echo e($id); ?>" class="btn btn-sm btn-outline-danger">
                        ✕
                    </a>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

        <!-- THANH TOÁN -->
        <div class="col-md-4">

            <div class="checkout-box shadow-sm">

                <h5 class="mb-3">Tổng thanh toán</h5>

                <h3 class="text-danger mb-3">
                    <?php echo e(number_format($total)); ?> đ
                </h3>

                <a href="/checkout" class="btn btn-danger w-100 mb-2">
                    🧾 Thanh toán ngay
                </a>

                <a href="/" class="btn btn-outline-secondary w-100 mb-2">
                    ⬅ Tiếp tục mua
                </a>

                <a href="/clear-cart" class="btn btn-outline-danger w-100">
                    Xoá toàn bộ
                </a>

            </div>

        </div>

    </div>

    <?php else: ?>

    <!-- GIỎ HÀNG TRỐNG -->
    <div class="empty-cart">
        <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png">
        <h5 class="mt-3 text-muted">Giỏ hàng của bạn đang trống</h5>
        <a href="/" class="btn btn-primary mt-3">Mua ngay</a>
    </div>

    <?php endif; ?>

</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\shopdongho\resources\views/cart.blade.php ENDPATH**/ ?>