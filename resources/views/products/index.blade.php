@extends('layouts.master')

@section('title', 'Danh sách sản phẩm')
@section('header-title', 'Quản lý sản phẩm')
@section('breadcrumb', 'Sản phẩm')

@section('content')

<div class="card">
    {{-- ===== HEADER: search + sort + add button ===== --}}
    <div class="card-header">
        <h2 class="card-title">📦 Danh sách sản phẩm</h2>

        <div class="d-flex gap-2 align-center" style="flex-wrap:wrap;">

            {{-- Search form --}}
            <form method="GET" action="{{ route('products.index') }}" class="filter-bar">
                <input type="text"
                       name="search"
                       id="search-input"
                       class="form-control"
                       placeholder="🔍 Tìm theo tên..."
                       value="{{ request('search') }}">

                {{-- Keep sort param when searching --}}
                @if(request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                @endif

                <button type="submit" class="btn btn-secondary btn-sm">Tìm</button>

                @if(request('search') || request('sort'))
                    <a href="{{ route('products.index') }}" class="btn btn-ghost btn-sm">✕ Xoá lọc</a>
                @endif
            </form>

            {{-- Sort buttons --}}
            <a href="{{ route('products.index', array_merge(request()->only('search'), ['sort' => 'price_asc'])) }}"
               id="sort-asc"
               class="btn btn-sm btn-ghost {{ request('sort') === 'price_asc' ? 'btn-active-sort' : '' }}">
               ↑ Giá tăng
            </a>
            <a href="{{ route('products.index', array_merge(request()->only('search'), ['sort' => 'price_desc'])) }}"
               id="sort-desc"
               class="btn btn-sm btn-ghost {{ request('sort') === 'price_desc' ? 'btn-active-sort' : '' }}">
               ↓ Giá giảm
            </a>

            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">➕ Thêm sản phẩm</a>
        </div>
    </div>

    {{-- ===== PRODUCT TABLE ===== --}}
    <div class="table-wrapper">
        @if($products->isEmpty())
            <div class="empty-state">
                <div class="empty-state-icon">📭</div>
                <h3>Không tìm thấy sản phẩm nào</h3>
                <p>Thử thay đổi từ khoá hoặc thêm sản phẩm mới.</p>
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
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="text-muted">{{ $product->id }}</td>
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
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="btn btn-warning btn-sm">✏️ Sửa</a>

                                <form action="{{ route('products.destroy', $product->id) }}"
                                      method="POST"
                                      onsubmit="return confirmDelete('{{ addslashes($product->name) }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">🗑️ Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    {{-- ===== PAGINATION ===== --}}
    @if($products->hasPages())
        <div class="pagination-wrapper">
            {{-- Previous --}}
            @if($products->onFirstPage())
                <span style="opacity:.4;">‹</span>
            @else
                <a href="{{ $products->previousPageUrl() }}">‹</a>
            @endif

            {{-- Page numbers --}}
            @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                @if($page == $products->currentPage())
                    <span class="active">{{ $page }}</span>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach

            {{-- Next --}}
            @if($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}">›</a>
            @else
                <span style="opacity:.4;">›</span>
            @endif
        </div>
    @endif
</div>

@endsection

@section('scripts')
<script>
function confirmDelete(name) {
    return confirm('⚠️ Bạn có chắc muốn xóa sản phẩm "' + name + '"?\nHành động này không thể hoàn tác!');
}
</script>
@endsection
