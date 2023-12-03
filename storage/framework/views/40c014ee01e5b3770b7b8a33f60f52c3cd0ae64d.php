<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>
        <?php echo e(Request::is('transaction/create') ? 'Make Order' :
            (Request::is('transaction/*') ? 'Payment' : 'appantuh')); ?>

    </title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/logofood.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->  
    <link rel="stylesheet" href="/css/portal.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/fontawesome-free-6.2.1-web/css/all.css">
    <link rel="stylesheet" href="/css/payment.css">
</head> 

<body>
    <header>   
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <div class="app-wrapper">
        <div class="app-content">
            <div class="container-xl page-order">
                <div class="row h-100">
                    <?php echo $__env->yieldContent('container'); ?>
                </div>
            </div>
        </div>
    </div>
    <script src="/plugins/popper.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>  
    <script src="/js/app.js"></script> 
</body><?php /**PATH C:\Users\A\Downloads\Azizah\app_kasir_restoran\resources\views/layouts/order.blade.php ENDPATH**/ ?>