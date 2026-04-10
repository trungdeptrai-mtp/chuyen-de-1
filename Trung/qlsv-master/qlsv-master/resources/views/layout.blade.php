<!DOCTYPE html>
<html>
<head>
    <title>Quản lý</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand text-white" href="#">QLSV</a>
    <div>
        <a href="/students" class="btn btn-outline-light">Sinh viên</a>
        <a href="/hocphan" class="btn btn-outline-light">Học phần</a>
    </div>
</nav>

<!-- NỘI DUNG -->
<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>