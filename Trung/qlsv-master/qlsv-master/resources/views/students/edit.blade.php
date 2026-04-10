<!DOCTYPE html>
<html>
<head>
    <title>Sửa sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <h2 class="mb-4">✏️ Sửa sinh viên</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/students/{{ $sv->id }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Mã SV</label>
            <input name="ma_sv" class="form-control" value="{{ $sv->ma_sv }}">
        </div>

        <div class="mb-3">
            <label>Họ tên</label>
            <input name="ho_ten" class="form-control" value="{{ $sv->ho_ten }}">
        </div>

        <div class="mb-3">
            <label>Năm sinh</label>
            <input name="nam_sinh" class="form-control" value="{{ $sv->nam_sinh }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input name="email" class="form-control" value="{{ $sv->email }}">
        </div>

        <div class="mb-3">
            <label>Lớp</label>
            <input name="lop" class="form-control" value="{{ $sv->lop }}">
        </div>

        <button class="btn btn-warning">Cập nhật</button>
        <a href="/students" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

</body>
</html>