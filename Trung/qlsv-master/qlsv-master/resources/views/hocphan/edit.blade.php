@extends('layout')

@section('content')

<h3>✏️ Sửa học phần</h3>

<form action="{{ route('hocphan.update', $hp->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Mã HP</label>
        <input name="ma_hp" value="{{ $hp->ma_hp }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tên HP</label>
        <input name="ten_hp" value="{{ $hp->ten_hp }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Số tín chỉ</label>
        <input name="so_tin_chi" value="{{ $hp->so_tin_chi }}" class="form-control">
    </div>

    <button class="btn btn-primary">Cập nhật</button>
</form>

@endsection