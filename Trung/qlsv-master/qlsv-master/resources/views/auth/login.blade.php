@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h2 class="text-center mb-4">Đăng nhập</h2>
            @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Mật khẩu:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Đăng nhập</button>
                <p class="mt-3 text-center">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
            </form>
        </div>
    </div>
</div>
@endsection