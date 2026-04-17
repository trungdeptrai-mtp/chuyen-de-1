<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Casio Store</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f8f9fa; font-family: sans-serif; }
        .navbar { box-shadow: 0 2px 4px rgba(0,0,0,0.1); }

        /* hover xổ menu */
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">

        <a class="navbar-brand fw-bold" href="/">CASIO STORE</a>

        <ul class="navbar-nav ms-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white"
                   href="#"
                   data-bs-toggle="dropdown">
                    ĐỒNG HỒ
                </a>

                <!-- MEGA MENU -->
                <div class="dropdown-menu p-4" style="width:600px;">
                    <div class="row">

                        <div class="col-6">
                            <h6><b>THƯƠNG HIỆU</b></h6>
                            <a class="dropdown-item">Casio</a>
                            <a class="dropdown-item">Seiko</a>
                            <a class="dropdown-item">Citizen</a>
                            <a class="dropdown-item">Orient</a>
                        </div>

                        <div class="col-6">
                            <h6><b>LOẠI</b></h6>
                            <a class="dropdown-item">Nam</a>
                            <a class="dropdown-item">Nữ</a>
                            <a class="dropdown-item">Unisex</a>
                        </div>

                    </div>
                </div>
            </li>
        </ul>

        <a href="/cart" class="btn btn-outline-light ms-auto">
            🛒 Giỏ hàng ({{ count((array)session('cart')) }})
        </a>

    </div>
</nav>

<!-- CONTENT -->
<div class="container">
    @yield('content')
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>