@extends('layout')

@section('content')
<div class="container mt-4">
    <h3>Thêm lớp học</h3>
    <form action="{{ route('lophoc.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Mã lớp:</label>
            <input type="text" name="ma_lop" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tên lớp:</label>
            <input type="text" name="ten_lop" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Lưu lại</button>
    </form>
</div>
@endsection     