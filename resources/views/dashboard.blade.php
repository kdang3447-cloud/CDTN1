@extends('layouts.master')

@section('title', 'Dashboard')
@section('header-title', 'Dashboard')
@section('breadcrumb', 'Tổng quan')

@section('content')

{{-- ===== STAT CARDS ===== --}}
<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-icon purple">📦</div>
        <div>
            <div class="stat-label">Tổng sản phẩm</div>
            <div class="stat-value">{{ $totalProducts }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon green">🏷️</div>
        <div>
            <div class="stat-label">Tổng danh mục</div>
            <div class="stat-value">{{ $totalCategories }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon orange">🆕</div>
        <div>
            <div class="stat-label">Sản phẩm mới nhất</div>
            <div class="stat-value">{{ $latestProducts->count() }}</div>
        </div>
    </div>

</div>

{{-- ===== LATEST PRODUCTS TABLE ===== --}}
<div class="card">
    <div class="card-header">
        <h2 class="card-title">🕐 5 Sản phẩm mới nhất</h2>
        <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">
            Xem tất cả →
        </a>
    </div>

    <div class="table-wrapper">
        @if($latestProducts->isEmpty())
            <div class="empty-state">
                <div class="empty-state-icon">📭</div>
                <h3>Chưa có sản phẩm nào</h3>
                <p>Hãy thêm sản phẩm đầu tiên của bạn!</p>
                <br>
                <a href="{{ route('products.create') }}" class="btn btn-primary">➕ Thêm sản phẩm</a>
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Ngày thêm</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latestProducts as $i => $product)
                    <tr>
                        <td class="text-muted">{{ $i + 1 }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     alt="{{ $product->name }}"
                                     class="product-thumb">
                            @else
                                <div class="product-thumb-placeholder">🖼️</div>
                            @endif
                        </td>
                        <td><strong>{{ $product->name }}</strong></td>
                        <td>
                            <span class="badge badge-category">
                                {{ $product->category->name }}
                            </span>
                        </td>
                        <td class="price-text">{{ number_format($product->price, 0, ',', '.') }}đ</td>
                        <td class="qty-text">{{ $product->quantity }}</td>
                        <td class="text-muted">{{ $product->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="btn btn-warning btn-sm">✏️ Sửa</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection
