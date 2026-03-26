<?php
session_start();
require_once 'config/database.php';
require_once 'includes/functions.php';

$products = getAllProducts();
$categories = getAllCategories();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồng Hồ VIP Shop - Đồng Hồ Cao Cấp 2025</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .banner {
            width: 100%;
            height: 450px;
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://picsum.photos/id/1015/1920/600') center/cover no-repeat;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-bottom: 40px;
            border-radius: 10px;
        }
        .banner h1 {
            font-size: 3.5em;
            margin: 0;
            text-shadow: 0 2px 10px rgba(0,0,0,0.7);
        }
        .banner p {
            font-size: 1.4em;
            margin: 15px 0 25px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 25px;
        }
        .product-card img {
            transition: transform 0.3s;
        }
        .product-card:hover img {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <!-- Banner lớn -->
    <div class="banner">
        <h1>⌚ Đồng Hồ VIP Shop</h1>
        <p>Sang trọng • Chính hãng • Đẳng cấp</p>
        <a href="products.php" class="btn" style="background:#e67e22; padding:15px 40px; font-size:1.2em;">Xem tất cả đồng hồ</a>
    </div>

    <h2>Danh mục nổi bật</h2>
    <ul style="display:flex; flex-wrap:wrap; gap:15px; list-style:none; padding:0;">
        <?php foreach ($categories as $cat): ?>
            <li>
                <a href="categories.php?id=<?= $cat['category_id'] ?>" 
                   style="padding:10px 20px; background:#34495e; color:white; border-radius:30px; text-decoration:none;">
                    <?= htmlspecialchars($cat['category_name']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2 style="margin-top:50px;">Sản phẩm nổi bật</h2>
    <div class="product-grid">
        <?php foreach (array_slice($products, 0, 8) as $p): ?>
            <div class="product-card">
                <img src="<?= htmlspecialchars($p['product_image']) ?>" 
                     alt="<?= htmlspecialchars($p['product_name']) ?>" 
                     style="width:100%; height:240px; object-fit:cover;">
                <h3><?= htmlspecialchars($p['product_name']) ?></h3>
                <p class="price"><?= number_format($p['product_price'], 0) ?> ₫</p>
                <a href="product-detail.php?id=<?= $p['product_id'] ?>" class="btn">Xem chi tiết</a>
                <a href="process_order.php?action=add&product_id=<?= $p['product_id'] ?>" 
                   class="btn" style="background:#27ae60; margin-left:8px;">🛒 Thêm giỏ</a>
            </div>
        <?php endforeach; ?>
    </div>

    <br><br>
    <div style="text-align:center;">
        <a href="revenue.php" class="btn" style="background:#8e44ad;">📊 Xem Báo cáo Doanh thu</a>
        <a href="cart.php" class="btn" style="background:#2980b9; margin-left:15px;">🛒 Giỏ hàng</a>
    </div>

</body>
</html>