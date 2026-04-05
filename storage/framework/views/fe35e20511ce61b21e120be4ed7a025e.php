<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('header-title', 'Dashboard'); ?>
<?php $__env->startSection('breadcrumb', 'Tổng quan'); ?>

<?php $__env->startSection('content'); ?>


<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-icon purple">📦</div>
        <div>
            <div class="stat-label">Tổng sản phẩm</div>
            <div class="stat-value"><?php echo e($totalProducts); ?></div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon green">🏷️</div>
        <div>
            <div class="stat-label">Tổng danh mục</div>
            <div class="stat-value"><?php echo e($totalCategories); ?></div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon orange">🆕</div>
        <div>
            <div class="stat-label">Sản phẩm mới nhất</div>
            <div class="stat-value"><?php echo e($latestProducts->count()); ?></div>
        </div>
    </div>

</div>


<div class="card">
    <div class="card-header">
        <h2 class="card-title">🕐 5 Sản phẩm mới nhất</h2>
        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary btn-sm">
            Xem tất cả →
        </a>
    </div>

    <div class="table-wrapper">
        <?php if($latestProducts->isEmpty()): ?>
            <div class="empty-state">
                <div class="empty-state-icon">📭</div>
                <h3>Chưa có sản phẩm nào</h3>
                <p>Hãy thêm sản phẩm đầu tiên của bạn!</p>
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
                        <th>Ngày thêm</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $latestProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-muted"><?php echo e($i + 1); ?></td>
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
                        <td class="text-muted"><?php echo e($product->created_at->format('d/m/Y')); ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="<?php echo e(route('products.edit', $product->id)); ?>"
                                   class="btn btn-warning btn-sm">✏️ Sửa</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH A:\xampp\htdocs\bookstore-mvc\resources\views/dashboard.blade.php ENDPATH**/ ?>