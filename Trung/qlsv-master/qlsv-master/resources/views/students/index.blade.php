@extends('layout')

@section('content')

<h1 class="mb-3">Danh sách sinh viên</h1>

<a href="/students/create" class="btn btn-success mb-2">+ Thêm</a>

<table class="table table-bordered table-hover">
<tr>
    <th>ID</th>
    <th>Mã SV</th>
    <th>Họ tên</th>
    <th>Email</th>
    <th>Lớp</th>
    <th>Action</th>
</tr>

@foreach($students as $sv)
<tr>
    <td>{{ $sv->id }}</td>
    <td>{{ $sv->ma_sv }}</td>
    <td>{{ $sv->ho_ten }}</td>
    <td>{{ $sv->email }}</td>
    <td>{{ $sv->lop }}</td>
    <td>
        <a href="/students/{{ $sv->id }}/edit" class="btn btn-warning btn-sm">✏️ Sửa</a>

        <form action="/students/{{ $sv->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa thật không?')">
                🗑️ Xóa
            </button>
        </form>
    </td>
</tr>
@endforeach
</table>

{{ $students->links() }}

@endsection