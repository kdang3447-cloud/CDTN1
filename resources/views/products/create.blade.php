@extends('layouts.master')

@section('title', 'Thêm sản phẩm')
@section('header-title', 'Thêm sản phẩm mới')
@section('breadcrumb', 'Sản phẩm › Thêm mới')

@section('content')

<div class="card" style="max-width:720px;">
    <div class="card-header">
        <h2 class="card-title">➕ Thêm sản phẩm mới</h2>
        <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">← Quay lại</a>
    </div>

    <div class="card-body">
        <form action="{{ route('products.store') }}"
              method="POST"
              enctype="multipart/form-data"
              id="create-product-form">
            @csrf

            {{-- Tên sản phẩm --}}
            <div class="form-group">
                <label class="form-label" for="name">Tên sản phẩm <span style="color:var(--danger)">*</span></label>
                <input type="text"
                       id="name"
                       name="name"
                       class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                       value="{{ old('name') }}"
                       placeholder="VD: iPhone 15 Pro Max">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Giá & Số lượng --}}
            <div class="d-flex gap-3" style="flex-wrap:wrap;">
                <div class="form-group" style="flex:1;min-width:200px;">
                    <label class="form-label" for="price">Giá (VNĐ) <span style="color:var(--danger)">*</span></label>
                    <input type="number"
                           id="price"
                           name="price"
                           step="0.01"
                           min="0"
                           class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                           value="{{ old('price') }}"
                           placeholder="VD: 29990000">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" style="flex:1;min-width:200px;">
                    <label class="form-label" for="quantity">Số lượng <span style="color:var(--danger)">*</span></label>
                    <input type="number"
                           id="quantity"
                           name="quantity"
                           min="0"
                           class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}"
                           value="{{ old('quantity', 1) }}"
                           placeholder="VD: 100">
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Danh mục --}}
            <div class="form-group">
                <label class="form-label" for="category_id">Danh mục <span style="color:var(--danger)">*</span></label>
                <select id="category_id"
                        name="category_id"
                        class="form-select {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                    <option value="">-- Chọn danh mục --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Upload ảnh --}}
            <div class="form-group">
                <label class="form-label">Ảnh sản phẩm</label>
                <div class="file-upload-wrapper" id="drop-zone" onclick="document.getElementById('image').click()">
                    <div class="file-upload-icon" id="upload-icon">📁</div>
                    <div class="file-upload-label">
                        Kéo thả ảnh vào đây hoặc <span>chọn file</span>
                    </div>
                    <div class="form-text mt-1" id="file-name-display">JPEG, PNG, JPG, GIF, WEBP — tối đa 2MB</div>
                    <input type="file"
                           id="image"
                           name="image"
                           accept="image/*"
                           style="display:none"
                           onchange="previewImage(event)">
                </div>
                <img id="img-preview" class="img-preview" style="display:none;" alt="Preview">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="d-flex gap-2" style="margin-top:8px;">
                <button type="submit" class="btn btn-primary" id="submit-btn">
                    ✅ Lưu sản phẩm
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Huỷ</a>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (!file) return;

    document.getElementById('file-name-display').textContent = file.name;
    document.getElementById('upload-icon').textContent = '🖼️';

    const reader = new FileReader();
    reader.onload = e => {
        const preview = document.getElementById('img-preview');
        preview.src = e.target.result;
        preview.style.display = 'block';
    };
    reader.readAsDataURL(file);
}

// Drag & drop support
const dropZone = document.getElementById('drop-zone');
dropZone.addEventListener('dragover', e => { e.preventDefault(); dropZone.style.borderColor = 'var(--accent)'; });
dropZone.addEventListener('dragleave', () => { dropZone.style.borderColor = ''; });
dropZone.addEventListener('drop', e => {
    e.preventDefault();
    dropZone.style.borderColor = '';
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
        const input = document.getElementById('image');
        const dt = new DataTransfer();
        dt.items.add(file);
        input.files = dt.files;
        previewImage({ target: input });
    }
});
</script>
@endsection
