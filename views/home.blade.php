<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Shop Đồng Hồ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { font-family: Arial; }
        .hero {
            background: url('https://images.unsplash.com/photo-1518546305927-5a555bb7020d') center/cover;
            height: 400px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .product img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">⌚ Watch Shop</a>
    </div>
</nav>

<!-- HERO -->
<div class="hero">
    <h1>Đồng hồ cao cấp 2025</h1>
</div>

<!-- SẢN PHẨM -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Sản phẩm nổi bật</h2>

    <div class="row">

        <!-- SP 1 -->
        <div class="col-md-3 product">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30" class="card-img-top">
                <div class="card-body text-center">
                    <h5>Rolex Submariner</h5>
                    <p class="text-danger">25.000.000đ</p>
                    <button class="btn btn-dark">Mua ngay</button>
                </div>
            </div>
        </div>

        <!-- SP 2 -->
        <div class="col-md-3 product">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1511381939415-e44015466834" class="card-img-top">
                <div class="card-body text-center">
                    <h5>Casio G-Shock</h5>
                    <p class="text-danger">3.500.000đ</p>
                    <button class="btn btn-dark">Mua ngay</button>
                </div>
            </div>
        </div>

        <!-- SP 3 -->
        <div class="col-md-3 product">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1547996160-81dfa63595aa" class="card-img-top">
                <div class="card-body text-center">
                    <h5>Tissot 1853</h5>
                    <p class="text-danger">12.000.000đ</p>
                    <button class="btn btn-dark">Mua ngay</button>
                </div>
            </div>
        </div>

        <!-- SP 4 -->
        <div class="col-md-3 product">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1508057198894-247b23fe5ade" class="card-img-top">
                <div class="card-body text-center">
                    <h5>Omega Seamaster</h5>
                    <p class="text-danger">30.000.000đ</p>
                    <button class="btn btn-dark">Mua ngay</button>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center p-3 mt-5">
    © 2025 Watch Shop
</footer>

</body>
</html>