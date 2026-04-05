
<?php if(session('success')): ?>
    <div class="alert alert-success" role="alert">
        <span class="alert-icon">✅</span>
        <span><?php echo e(session('success')); ?></span>
        <button class="alert-close" aria-label="Đóng">✕</button>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger" role="alert">
        <span class="alert-icon">❌</span>
        <span><?php echo e(session('error')); ?></span>
        <button class="alert-close" aria-label="Đóng">✕</button>
    </div>
<?php endif; ?>
<?php /**PATH A:\xampp\htdocs\bookstore-mvc\resources\views/components/alert.blade.php ENDPATH**/ ?>