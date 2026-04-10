@extends('layout')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $err)
            <div>{{ $err }}</div>
        @endforeach
    </div>
@endif
<input name="ma_hp" value="{{ old('ma_hp') }}" class="form-control">
<input name="ten_hp" value="{{ old('ten_hp') }}" class="form-control">
<input name="so_tin_chi" value="{{ old('so_tin_chi') }}" class="form-control">

<h3>➕ Thêm học phần</h3>

<form action="{{ route('hocphan.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Mã HP</label>
        <input name="ma_hp" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tên HP</label>
        <input name="ten_hp" class="form-control">
    </div>

    <div class="mb-3">
        <label>Số tín chỉ</label>
        <input name="so_tin_chi" class="form-control">
    </div>

    <button class="btn btn-success">Lưu</button>
</form>

@endsection