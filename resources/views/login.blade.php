<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Casio Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            height: 100vh;
            background: url('https://images.unsplash.com/photo-1518546305927-5a555bb7020d?auto=format&fit=crop&w=1600&q=80') no-repeat center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
        }

        .box {
            position: relative;
            z-index: 2;
            width: 400px;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
        }

        .tab-btn {
            width: 50%;
            border: none;
            padding: 10px;
            background: #eee;
        }

        .tab-btn.active {
            background: red;
            color: white;
        }
    </style>
</head>

<body>

<div class="overlay"></div>

<div class="box">

    <h4 class="text-center text-danger">⌚ CASIO STORE</h4>

    <!-- TAB -->
    <div class="d-flex mb-3">
        <button type="button" class="tab-btn active" onclick="showLogin()">Đăng nhập</button>
        <button type="button" class="tab-btn" onclick="showRegister()">Đăng ký</button>
    </div>

    <!-- LOGIN -->
    <form id="login-form" method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Mật khẩu" required>
        <button class="btn btn-dark w-100">Đăng nhập</button>
    </form>

    <!-- REGISTER -->
    <form id="register-form" method="POST" action="{{ route('register') }}" style="display:none;">
        @csrf
        <input type="text" name="name" class="form-control mb-2" placeholder="Tên" required>
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Mật khẩu" required>
        <input type="password" name="password_confirmation" class="form-control mb-2" placeholder="Nhập lại" required>
        <button class="btn btn-danger w-100">Đăng ký</button>
    </form>

</div>

<script>
function showLogin(){
    document.getElementById('login-form').style.display='block';
    document.getElementById('register-form').style.display='none';
}
function showRegister(){
    document.getElementById('login-form').style.display='none';
    document.getElementById('register-form').style.display='block';
}
</script>

</body>
</html>