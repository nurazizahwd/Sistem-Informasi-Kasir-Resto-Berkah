

<?php $__env->startSection('container'); ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manager')): ?>
    <?php $__env->startSection('container'); ?>
        <?php echo $__env->make('dashboard.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
    <?php $__env->startSection('container'); ?>
        <?php echo $__env->make('dashboard.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cashier')): ?>
    <?php $__env->startSection('container'); ?>
        <?php echo $__env->make('dashboard.cashier', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\A\Downloads\Azizah\app_kasir_restoran\resources\views/home.blade.php ENDPATH**/ ?>