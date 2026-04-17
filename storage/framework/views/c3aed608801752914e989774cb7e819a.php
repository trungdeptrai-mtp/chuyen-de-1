<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Casio Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f8f9fa; font-family: sans-serif; }

        .top-header {
            background: #fff;
            border-bottom: 1px solid #eee;
        }

        .menu a {
            text-decoration: none;
            color: #333;
            margin-right: 15px;
        }

        .menu a:hover { color: red; }

        .search-box input {
            border-radius: 20px;
            background: #f1f1f1;
            border: none;
            padding-left: 15px;
        }

        /* SLIDER */
        .carousel img {
            height: 420px;
            object-fit: cover;
            border-radius: 12px;
        }

        /* PRODUCT */
        .product-card {
            background: #fff;
            border-radius: 12px;
            padding: 10px;
            text-align: center;
            transition: 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .product-card img {
            width: 100%;
            height: 230px;
            object-fit: cover;
        }

        .btn-add {
            border: 2px solid #28a745;
            color: #28a745;
            font-size: 12px;
            padding: 6px;
            border-radius: 8px;
        }

        .btn-add:hover {
            background: #28a745;
            color: #fff;
        }

        .btn-buy {
            background: #ff4d4d;
            color: #fff;
            font-size: 12px;
            padding: 6px;
            border-radius: 8px;
        }

        .btn-buy:hover {
            background: #e60000;
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -10px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }

        .pagination {
            justify-content: center;
        }
    </style>
</head>

<body>

<!-- HEADER -->
<div class="top-header py-3">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="menu">
            <a href="/brand/Casio">THƯƠNG HIỆU</a>
            <a href="/category/nam">NAM</a>
            <a href="/category/nu">NỮ</a>
        </div>

        <div class="fw-bold text-danger fs-3">
            ⌚ CASIO STORE
        </div>

        <div class="d-flex align-items-center gap-3">

            <form action="/search" method="GET" class="search-box">
                <input type="text" name="query" placeholder="Tìm sản phẩm..." class="form-control">
            </form>

            <?php if(auth()->guard()->check()): ?>
                <span>👋 <?php echo e(auth()->user()->name); ?></span>

                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-danger btn-sm">Logout</button>
                </form>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-primary btn-sm">Đăng nhập</a>
                <a href="<?php echo e(route('register')); ?>" class="btn btn-success btn-sm">Đăng ký</a>
            <?php endif; ?>

            <a href="/cart" class="btn btn-dark position-relative">
                🛒
                <span class="cart-count">
                    <?php echo e(is_array(session('cart')) ? count(session('cart')) : 0); ?>

                </span>
            </a>

        </div>

    </div>
</div>

<div id="slider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

    <div class="carousel-indicators">
        <button data-bs-target="#slider" data-bs-slide-to="0" class="active"></button>
        <button data-bs-target="#slider" data-bs-slide-to="1"></button>
        <button data-bs-target="#slider" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?q=80&w=1200" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1518544801976-3e159e50e5bb?q=80&w=1200" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1200" class="d-block w-100">
        </div>

    </div>

    <button class="carousel-control-prev" data-bs-target="#slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" data-bs-target="#slider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>
<!-- PRODUCT -->
<div class="container mt-5">

    <h3 class="mb-4 fw-bold">🔥 Sản phẩm</h3>

    <div class="row">

        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3 mb-4">
            <div class="product-card">

                <a href="/product/<?php echo e($p->id); ?>">
                    <?php if($p->brand == 'Casio'): ?>
    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400">
<?php elseif($p->brand == 'G-Shock'): ?>
    <img src="https://images.unsplash.com/photo-1518544801976-3e159e50e5bb?w=400">
<?php elseif($p->brand == 'Edifice'): ?>
    <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=400">
<?php else: ?>
    <img src="https://images.unsplash.com/photo-1508057198894-247b23fe5ade?w=400">
<?php endif; ?>
                </a>

                <div class="mt-2 fw-bold">
                    <?php echo e($p->name); ?>

                </div>

                <div class="text-danger mb-2">
                    <?php echo e(number_format($p->price)); ?> đ
                </div>

                <div class="row g-1">
                    <div class="col-6">
                        <a href="/add-to-cart/<?php echo e($p->id); ?>" class="btn-add w-100">Thêm giỏ</a>
                    </div>
                    <div class="col-6">
                        <a href="/buy-now/<?php echo e($p->id); ?>" class="btn-buy w-100">Mua ngay</a>
                    </div>
                </div>

            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

    <div class="mt-4">
        <?php echo e($products->links()); ?>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html><?php /**PATH C:\xampp\htdocs\shopdongho\resources\views/home.blade.php ENDPATH**/ ?>