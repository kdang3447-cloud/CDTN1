<?php $__env->startSection('title', 'Danh sách sản phẩm'); ?>
<?php $__env->startSection('header-title', 'Quản lý sản phẩm'); ?>
<?php $__env->startSection('breadcrumb', 'Sản phẩm'); ?>

<?php $__env->startSection('content'); ?>

<div class="card">
    
    <div class="card-header">
        <h2 class="card-title">📦 Danh sách sản phẩm</h2>

        <div class="d-flex gap-2 align-center" style="flex-wrap:wrap;">

            
            <form method="GET" action="<?php echo e(route('products.index')); ?>" class="filter-bar">
                <input type="text"
                       name="search"
                       id="search-input"
                       class="form-control"
                       placeholder="🔍 Tìm theo tên..."
                       value="<?php echo e(request('search')); ?>">

                
                <?php if(request('sort')): ?>
                    <input type="hidden" name="sort" value="<?php echo e(request('sort')); ?>">
                <?php endif; ?>

                <button type="submit" class="btn btn-secondary btn-sm">Tìm</button>

                <?php if(request('search') || request('sort')): ?>
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-ghost btn-sm">✕ Xoá lọc</a>
                <?php endif; ?>
            </form>

            
            <a href="<?php echo e(route('products.index', array_merge(request()->only('search'), ['sort' => 'price_asc']))); ?>"
               id="sort-asc"
               class="btn btn-sm btn-ghost <?php echo e(request('sort') === 'price_asc' ? 'btn-active-sort' : ''); ?>">
               ↑ Giá tăng
            </a>
            <a href="<?php echo e(route('products.index', array_merge(request()->only('search'), ['sort' => 'price_desc']))); ?>"
               id="sort-desc"
               class="btn btn-sm btn-ghost <?php echo e(request('sort') === 'price_desc' ? 'btn-active-sort' : ''); ?>">
               ↓ Giá giảm
            </a>

            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary btn-sm">➕ Thêm sản phẩm</a>
        </div>
    </div>

    
    <div class="table-wrapper">
        <?php if($products->isEmpty()): ?>
            <div class="empty-state">
                <div class="empty-state-icon">📭</div>
                <h3>Không tìm thấy sản phẩm nào</h3>
                <p>Thử thay đổi từ khoá hoặc thêm sản phẩm mới.</p>
                <br>
                <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">➕ Thêm sản phẩm</a>
            </div>
        <?php else: ?>
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
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-muted"><?php echo e($product->id); ?></td>
                        <td>
                            <?php if($product->image): ?>
                                <img src="<?php echo e(asset('storage/' . $product->image)); ?>"
                                     alt="<?php echo e($product->name); ?>"
                                     class="product-thumb">
                            <?php else: ?>
                                <div class="product-thumb-placeholder">🖼️</div>
                            <?php endif; ?>
                        </td>
                        <td><strong><?php echo e($product->name); ?></strong></td>
                        <td>
                            <span class="badge badge-category">
                                <?php echo e($product->category->name); ?>

                            </span>
                        </td>
                        <td class="price-text"><?php echo e(number_format($product->price, 0, ',', '.')); ?>đ</td>
                        <td class="qty-text"><?php echo e($product->quantity); ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="<?php echo e(route('products.edit', $product->id)); ?>"
                                   class="btn btn-warning btn-sm">✏️ Sửa</a>

                                <form action="<?php echo e(route('products.destroy', $product->id)); ?>"
                                      method="POST"
                                      onsubmit="return confirmDelete('<?php echo e(addslashes($product->name)); ?>')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">🗑️ Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    
    <?php if($products->hasPages()): ?>
        <div class="pagination-wrapper">
            
            <?php if($products->onFirstPage()): ?>
                <span style="opacity:.4;">‹</span>
            <?php else: ?>
                <a href="<?php echo e($products->previousPageUrl()); ?>">‹</a>
            <?php endif; ?>

            
            <?php $__currentLoopData = $products->getUrlRange(1, $products->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == $products->currentPage()): ?>
                    <span class="active"><?php echo e($page); ?></span>
                <?php else: ?>
                    <a href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($products->hasMorePages()): ?>
                <a href="<?php echo e($products->nextPageUrl()); ?>">›</a>
            <?php else: ?>
                <span style="opacity:.4;">›</span>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
function confirmDelete(name) {
    return confirm('⚠️ Bạn có chắc muốn xóa sản phẩm "' + name + '"?\nHành động này không thể hoàn tác!');
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH A:\xampp\htdocs\bookstore-mvc\resources\views/products/index.blade.php ENDPATH**/ ?>