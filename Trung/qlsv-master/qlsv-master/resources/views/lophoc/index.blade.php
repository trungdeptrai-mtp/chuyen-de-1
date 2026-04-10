@extends('layout')

@section('content')
<div class="container mt-4">
    <h3>Danh sách lớp học</h3>
    <a href="{{ route('lophoc.create') }}" class="btn btn-primary mb-3">+ Thêm lớp mới</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th> <th>Mã Lớp</th> <th>Tên Lớp</th> <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dsLop as $l)
            <tr>
                <td>{{ $l->id }}</td>
                <td>{{ $l->ma_lop }}</td>
                <td>{{ $l->ten_lop }}</td>
                <td>
                    <a href="{{ route('lophoc.edit', $l->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('lophoc.destroy', $l->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa lớp này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dsLop->links() }}
</div>
@endsection