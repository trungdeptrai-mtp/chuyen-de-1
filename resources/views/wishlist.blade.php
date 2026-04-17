<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sản phẩm yêu thích</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-light bg-white shadow-sm mb-5 p-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">CASIO STORE</a>
            <a href="/wishlist" class="btn btn-outline-danger">❤️ ({{ session('wishlist') ? count(session('wishlist')) : 0 }})</a>
        </div>
    </nav>

    <div class="container">
        <h2 class="fw-bold mb-4">❤️ Danh sách yêu thích</h2>
        <div class="row g-4">
            @forelse(session('wishlist', []) as $id => $item)
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm text-center p-3" style="border-radius: 20px;">
                        <img src="{{ $item['image'] }}" class="rounded-3 mb-3">
                        <h6 class="fw-bold">{{ $item['name'] }}</h6>
                        <p class="text-danger">{{ number_format($item['price']) }}đ</p>
                        <div class="d-grid gap-2">
                            <a href="/product/{{ $id }}" class="btn btn-sm btn-dark">Xem chi tiết</a>
                            <a href="/wishlist/toggle/{{ $id }}" class="btn     btn-sm btn-link text-muted">Xóa khỏi danh sách</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Bạn chưa yêu thích sản phẩm nào.</p>
                    <a href="/" class="btn btn-primary">Khám phá ngay</a>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>