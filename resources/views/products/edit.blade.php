<h1>Sửa sản phẩm</h1>

<form method="POST" action="/update/{{ $product->id }}">
    @csrf
    Tên: <input name="name" value="{{ $product->name }}"><br>
    Giá: <input name="price" value="{{ $product->price }}"><br>
    <button type="submit">Cập nhật</button>
</form>