@extends('layout')

@section('content')

<h3 class="mb-3">📚 Danh sách học phần</h3>

<a href="{{ route('hocphan.create') }}" class="btn btn-primary mb-3">+ Thêm</a>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>Mã HP</th>
            <th>Tên học phần</th>
            <th>Tín chỉ</th>
            <th width="150">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $hp)
        <tr>
            <td>{{ $hp->ma_hp }}</td>
            <td>{{ $hp->ten_hp }}</td>
            <td>{{ $hp->so_tin_chi }}</td>
            <td>
                <a href="{{ route('hocphan.edit', $hp->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                <form action="{{ route('hocphan.destroy', $hp->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $data->links() }}

@endsection
