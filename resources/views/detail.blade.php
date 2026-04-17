<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Casio Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/combine/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        .navbar { background-color: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        
        .product-gallery {
            background: white;
            border-radius: 20px;
            padding: 20px;
            position: sticky;
            top: 100px;
        }
        
        .main-img {
            width: 100%;
            height: auto;
            border-radius: 15px;
            object-fit: contain;
        }

        .badge-sale {
            background-color: #ff4757;
            color: white;
            padding: 5px 15px;
            border-radius: 50px;
            font-weight: bold;
            font-size: 0.8rem;
        }

        .price-tag {
            color: #ff4757;
            font-size: 2rem;
            font-weight: 800;
        }

        .spec-table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
        }

        .spec-table th {
            width: 35%;
            background-color: #f8f9fa;
            color: #6c757d;
            font-weight: 600;
        }

        .btn-add-large {
            background-color: #2ed573;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 12px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-add-large:hover {
            background-color: #26af5f;
            transform: translateY(-2px);
        }

        .breadcrumb-item a {
            text-decoration: none;
            color: #6c757d;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary fs-3" href="/">CASIO STORE</a>
            <div class="ms-auto d-flex align-items-center">
                <a href="/cart" class="btn btn-dark position-relative fw-bold px-3">
                    🛒 GIỎ HÀNG 
                    <span class="cart-count" style="position: absolute; top: -8px; right: -10px; background: #ff4757; color: white; border-radius: 50%; padding: 2px 7px; font-size: 11px;">
                        {{ is_array(session('cart')) ? count(session('cart')) : 0 }}
                    </span>
                </a>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Đồng hồ Casio</a></li>
                <li class="breadcrumb-item active text-truncate" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row g-5">
            <div class="col-lg-6">
                <div class="product-gallery shadow-sm">
                    <img src="https://loremflickr.com/800/800/watch?lock={{ $product->id }}" alt="{{ $product->name }}" class="main-img">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="ps-lg-3">
                    <span class="badge-sale mb-3 d-inline-block text-uppercase">Chính hãng Casio</span>
                    <h1 class="fw-bold mb-3">{{ $product->name }}</h1>
                    
                    <div class="d-flex align-items-center mb-4">
                        <div class="price-tag me-3">{{ number_format($product->price) }}đ</div>
                        <div class="text-muted text-decoration-line-through">{{ number_format($product->price * 1.2) }}đ</div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Mô tả sản phẩm</h5>
                            <p class="text-secondary" style="line-height: 1.8;">
                                {{ $product->description }}
                                <br><br>
                                Dòng sản phẩm Casio Standard mang đến sự bền bỉ tuyệt đối cùng thiết kế tinh tế, phù hợp cho cả công việc và các hoạt động thể thao ngoài trời. Với độ chính xác cao và khả năng chống nước vượt trội, đây là lựa chọn hàng đầu của phái mạnh.
                            </p>
                        </div>
                    </div>

                    <div class="row g-3 mb-5">
                        <div class="col-md-8">
                            <a href="/add-to-cart/{{ $product->id }}" class="btn btn-add-large w-100 fs-5">
                                <i class="bi bi-cart-plus me-2"></i> THÊM VÀO GIỎ HÀNG
                            </a>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-outline-dark w-100 h-100 rounded-3">
                                <i class="bi bi-heart me-1"></i> Yêu thích
                            </button>
                        </div>
                    </div>

                    <h5 class="fw-bold mb-3">Thông số kỹ thuật</h5>
                    <table class="table spec-table border">
                        <tbody>
                            <tr>
                                <th>Vật liệu vỏ / vành bezel</th>
                                <td>Thép không gỉ / Nhôm</td>
                            </tr>
                            <tr>
                                <th>Dây đeo</th>
                                <td>Dây đeo bằng nhựa cao cấp</td>
                            </tr>
                            <tr>
                                <th>Mặt kính</th>
                                <td>Mặt kính khoáng (Mineral Glass)</td>
                            </tr>
                            <tr>
                                <th>Chống nước</th>
                                <td>100 mét (10 Bar)</td>
                            </tr>
                            <tr>
                                <th>Kích thước vỏ</th>
                                <td>51.9 × 45.7 × 12.1 mm</td>
                            </tr>
                            <tr>
                                <th>Tuổi thọ pin</th>
                                <td>Xấp xỉ 3 năm (SR920SW)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-5 pt-5">
            <h3 class="fw-bold mb-4">Sản phẩm liên quan</h3>
            <div class="row g-4">
                {{-- Loop qua 4 sản phẩm ngẫu nhiên khác --}}
               @foreach($related as $rp)
                <div class="col-6 col-md-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="https://loremflickr.com/300/300/watch?lock={{ $rp->id }}" class="card-img-top p-2" alt="...">
                        <div class="card-body text-center">
                            <h6 class="fw-bold text-truncate">{{ $rp->name }}</h6>
                            <p class="text-danger fw-bold small">{{ number_format($rp->price) }}đ</p>
                            <a href="/product/{{ $rp->id }}" class="btn btn-sm btn-outline-primary w-100 rounded-3">Xem ngay</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    <footer class="bg-white py-4 border-top mt-5">
        <div class="container text-center text-muted">
            <small>&copy; 2026 Casio Store. Cung cấp bởi Gemini AI.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>