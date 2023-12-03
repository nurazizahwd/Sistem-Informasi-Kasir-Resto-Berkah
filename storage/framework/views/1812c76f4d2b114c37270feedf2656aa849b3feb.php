

<?php $__env->startSection('container'); ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card card-activity">
        <h4 class="card-title mb-5">Activity Log</h4>
        <div class="card-body">
        <ul class="bullet-line-list">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
            <style>
                .bullet-line-list li:nth-child(<?php echo e($loop->iteration); ?>)::before {
                    background-image: url('/storage/profile/<?php echo e($item->user->picture); ?>');
                    width: 40px;
                    height: 40px;
                    left: -50px;
                    top: -2px;
                    border: 4px solid #e9edfb;
                    z-index: 2;
                    background-size: cover;
                }
            </style>
            <div class="d-flex justify-content-between">
                <div><span class="text-light-green"><?php echo e($item->user->name); ?> </span> &nbsp <?php echo e($item->action); ?> <p class="small"><?php echo e($item->user->level->level); ?></p> </div>
                <p><?php echo e($item->created_at->diffForHumans()); ?></p>
            </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\A\Downloads\Azizah\app_kasir_restoran\resources\views/activityLog.blade.php ENDPATH**/ ?>