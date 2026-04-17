@extends('layout')

@section('content')

<div class="card p-4 shadow">
    <h2>{{ $p->name }}</h2>
    <h4 class="text-danger">{{ $p->price }} VNĐ</h4>

    <p>{{ $p->description }}</p>

    <a href="/add-to-cart/{{ $p->id }}" class="btn btn-success">Thêm vào giỏ</a>
</div>

@endsection