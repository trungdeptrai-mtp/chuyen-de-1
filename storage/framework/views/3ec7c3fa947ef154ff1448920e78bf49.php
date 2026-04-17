<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5" style="max-width:600px">

    <h3 class="mb-4">➕ Thêm sản phẩm</h3>

    <form method="POST" action="/add-product" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <input type="text" name="name" class="form-control mb-3" placeholder="Tên sản phẩm" required>

        <input type="number" name="price" class="form-control mb-3" placeholder="Giá" required>

        <input type="text" name="brand" class="form-control mb-3" placeholder="Brand" required>

        <select name="gender" class="form-control mb-3">
            <option value="nam">Nam</option>
            <option value="nu">Nữ</option>
        </select>

        <!-- UPLOAD ẢNH -->
        <input type="file" name="image" class="form-control mb-3">

        <button class="btn btn-danger w-100">Thêm sản phẩm</button>
    </form>

</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\shopdongho\resources\views/add_product.blade.php ENDPATH**/ ?>