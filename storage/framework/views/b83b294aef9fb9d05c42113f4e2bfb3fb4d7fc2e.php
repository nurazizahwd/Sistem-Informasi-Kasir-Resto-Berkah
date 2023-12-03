

<?php $__env->startSection('container'); ?>
<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-12 ">
    <form action="/user/edit/<?php echo e($key->id); ?>" method="POST" class="app-card app-card-account shadow-sm d-flex flex-column align-items-start" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="app-card-body px-4 w-100">
            <div class="item border-bottom py-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <div class="item-label mb-2"><strong>Photo</strong></div>
                        <div class=""><img class="profile-image rounded-circle" src="<?php echo e(asset('storage/profile/'.$key->picture)); ?>" alt=""></div>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <div class="btn-sm file-input-custom">
                            <input class="file-input-customize" type="file" name="picture" id="picture">
                            Change
                        </div>
                    </div>
                </div>
            </div>
            <div class="item border-bottom mt-4 mb-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 mb-0">
                        <div class="item-label"><strong>Name</strong></div>
                        <input class="w-100 mt-2 form-control border-0 ps-0 rounded-0 outline-0 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($key->name); ?>" name="name" autofocus>
                    </div>
                </div>
            </div>
            <div class="item border-bottom mt-4 mb-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 mb-0">
                        <div class="item-label"><strong>Email</strong></div>
                        <input class="w-100 mt-2 form-control border-0 ps-0 rounded-0 outline-0 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($key->email); ?>" name="email">
                    </div>
                </div>
            </div>
            <div class="item border-bottom mt-4 mb-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 mb-0">
                        <div class="item-label"><strong>Username</strong></div>
                        <input class="w-100 mt-2 form-control border-0 ps-0 rounded-0 outline-0 <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($key->username); ?>" name="username">
                    </div>
                </div>
            </div>
            <div class="item border-bottom mt-4 mb-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 mb-0">
                        <div class="item-label"><strong>Role</strong></div>
                        <input class="w-100 mt-2 form-control border-0 ps-0 rounded-0" disabled value=" <?php echo e($key->level->level); ?>" name="level_id">
                    </div>
                </div>
            </div>
        </div>
        <div class="app-card-footer p-4 mt-auto">
            <button type="submit" class="btn btn-success text-white">Save Change</button>
            <a class="btn btn-danger text-white" href="/user/<?php echo e($key->id); ?>">Cancel</a>
        </div>
    </form>
</div>
<script>
    const picture = document.getElementById('picture');
    const profile_image = document.querySelector('.profile-image');

    picture.addEventListener('change', function() {
        const files = picture.files[0];
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
            profile_image.src = this.result;
        });
    });
</script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\A\Downloads\Azizah\app_kasir_restoran\resources\views/account/edit.blade.php ENDPATH**/ ?>