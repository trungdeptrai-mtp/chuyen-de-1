@extends('layout')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-5 border-bottom pb-3">
        <div>
            <h1 class="fw-bold text-dark m-0">⌚ HỆ THỐNG ĐỒNG HỒ CASIO</h1>
            <p class="text-muted m-0">Quản lý kho hàng & Bán lẻ chuyên nghiệp</p>
        </div>
        <a href="/create" class="btn btn-success btn-lg shadow-sm">
            <i class="bi bi-plus-circle"></i> + Thêm sản phẩm mới
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <strong>Thành công!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        @foreach($products as $p)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden product-card">
                <div class="bg-light p-3">
                    <img src="https://loremflickr.com/400/400/watch?lock={{ $p->id }}" 
                         class="card-img-top rounded-3" 
                         alt="{{ $p->name }}"
                         style="transition: 0.3s;">
                </div>
                
                <div class="card-body d-flex flex-column text-center">
                    <h5 class="fw-bold mb-2">{{ $p->name }}</h5>
                    <h4 class="text-danger fw-bold mb-3">{{ number_format($p->price) }} VNĐ</h4>

                    <div class="mt-auto d-grid gap-2">
                        <a href="/product/{{ $p->id }}" class="btn btn-info text-white fw-bold">
                            👁️ Xem chi tiết
                        </a>
                        
                        <div class="d-flex justify-content-between gap-2">
                            <a href="/edit/{{ $p->id }}" class="btn btn-outline-warning btn-sm flex-fill fw-bold">
                                Sửa
                            </a>
                            <a href="/delete/{{ $p->id }}" 
                               class="btn btn-outline-danger btn-sm flex-fill fw-bold" 
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">
                                Xóa
                            </a>
                        </div>
                        
                        <a href="/add-to-cart/{{ $p->id }}" class="btn btn-primary fw-bold">
                            🛒 Mua ngay
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .product-card { transition: 0.3s; }
    .product-card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
    .product-card img:hover { transform: scale(1.05); }
</style>
@endsection