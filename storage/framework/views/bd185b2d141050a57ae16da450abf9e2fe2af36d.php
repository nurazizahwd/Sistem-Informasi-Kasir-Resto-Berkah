

<?php $__env->startSection('container'); ?>
<div class="col-12 ">
    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
        <div class="app-card-header p-3 border-bottom-0">
            <div class="row align-items-center gx-3">
                <div class="col-auto">
                    <div class="app-icon-holder" style="background-size: cover; background-image: url('<?= asset('storage/profile/'.$user->picture) ?>'); background-position: center;">

                    </div>

                </div>
                <div class="col-auto">
                    <h4 class="app-card-title">Profile</h4>
                </div>
            </div>
        </div>
        <div class="app-card-body px-4 w-100">
            <div class="item border-bottom py-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <div class="item-label"><strong>Name</strong></div>
                        <div class="item-data"><?php echo e($user->name); ?></div>
                    </div>
                </div>
            </div>
            <div class="item border-bottom py-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <div class="item-label"><strong>Email</strong></div>
                        <div class="item-data"><?php echo e($user->email); ?></div>
                    </div>
                </div>
            </div>
            <div class="item border-bottom py-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <div class="item-label"><strong>Username</strong></div>
                        <div class="item-data">
                            <?php echo e($user->username); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="item border-bottom py-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <div class="item-label"><strong>Role</strong></div>
                        <div class="item-data">
                            <?php echo e($user->level->level); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-card-footer p-4 mt-auto">
            <a class="btn app-btn-secondary" href="/user/edit/<?php echo e($user->id); ?>">Edit Profile</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\A\Downloads\Azizah\app_kasir_restoran\resources\views/account/index.blade.php ENDPATH**/ ?>