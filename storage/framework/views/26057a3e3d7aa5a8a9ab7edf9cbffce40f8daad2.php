

<?php $__env->startSection('container'); ?>
<div class="col-auto">
    <h1 class="app-page-title mb-0">Transaction</h1>
</div>
<div class="col-10">
    <div class="page-utilities">
        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
            <div class="col-auto">
                <form action="/transaction" method="GET" class="table-search-form row gx-1 align-items-center">
                    <div class="col-auto">						    
                        <select class="form-select w-auto" name="year">
                            <?php if(!request('year')): ?>
                            <option value="0" selected disabled>Select Year</option>
                            <?php else: ?> 
                            <option value="0" disabled>Select Year</option>
                            <?php endif; ?>
                            <?php
                                $year = date('Y');
                                $min = $year - 8;
                                $max = $year;
                            ?>
                            <?php for( $i=$max; $i>=$min; $i-- ): ?>
                                echo '<option value="<?php echo e($i); ?>" <?php echo e((request('year') == $i) ? 'selected' : ' '); ?>><?php echo e($i); ?></option>';
                            <?php endfor; ?> 
                        </select>
                    </div>
                    <div class="col-auto">
                        <select class="form-select w-auto" name="month">
                            <?php if(!request('month')): ?>
                            <option value="0" selected disabled>Select Month</option>
                            <?php else: ?>
                            <option value="0" disabled>Select Month</option>
                            <?php endif; ?>
                            <option value="01" <?php echo e((request('month') == '01') ? 'selected' : ' '); ?>> January</option>
                            <option value="02" <?php echo e((request('month') == '02') ? 'selected' : ' '); ?>> Febuary</option>
                            <option value="03" <?php echo e((request('month') == '03') ? 'selected' : ' '); ?>> March</option>
                            <option value="04" <?php echo e((request('month') == '04') ? 'selected' : ' '); ?>> April</option>
                            <option value="05" <?php echo e((request('month') == '05') ? 'selected' : ' '); ?>> May</option>
                            <option value="06" <?php echo e((request('month') == '06') ? 'selected' : ' '); ?>> June</option>
                            <option value="07" <?php echo e((request('month') == '07') ? 'selected' : ' '); ?>> July</option>
                            <option value="08" <?php echo e((request('month') == '08') ? 'selected' : ' '); ?>> August</option>
                            <option value="09" <?php echo e((request('month') == '09') ? 'selected' : ' '); ?>> September</option>
                            <option value="10" <?php echo e((request('month') == '10') ? 'selected' : ' '); ?>> October</option>
                            <option value="11" <?php echo e((request('month') == '11') ? 'selected' : ' '); ?>> November</option>
                            <option value="12" <?php echo e((request('month') == '12') ? 'selected' : ' '); ?>> December</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn app-btn-secondary">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-auto">
                <a class="btn app-btn-primary" href="/report?<?php echo e(isset($_GET['month']) && isset($_GET['year']) ? 'month='.$_GET['month'].'&year='.$_GET['year'] : (isset($_GET['month']) ? 'month='.$_GET['month'] : (isset($_GET['year']) ? 'year= '.$_GET['year'] : 'data=all'))); ?>"
                id="print"><i class="fa-solid fa-print me-2"></i>Print</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
    <a class="flex-sm-fill text-sm-center nav-link <?php echo e(Request::has('month') || Request::has('year') ? ' ' : 'active'); ?>" id="orders-all-tab" data-bs-toggle="tab" href="<?php echo e(Request::has('month') || Request::has('year') ? ' ' : '#orders-all'); ?>" role="tab" aria-controls="orders-all" aria-selected="<?php echo e(Request::has('month') || Request::has('year') ? 'false' : 'true'); ?>">All</a>
    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="<?php echo e(Request::has('month') || Request::has('year') ? ' ' : '#orders-paid'); ?>" role="tab" aria-controls="orders-paid" aria-selected="false">Today</a>
    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="<?php echo e(Request::has('month') || Request::has('year') ? ' ' : '#orders-pending'); ?>" role="tab" aria-controls="orders-pending" aria-selected="false">This Month</a>
</nav>

<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">No</th>
                                <th class="cell">Product</th>
                                <th class="cell text-center">No Table</th>
                                <th class="cell">Date</th>
                                <th class="cell">Status</th>
                                <th class="cell">Total</th>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cashier')): ?>
                                <th class="cell"></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $datetime = explode(' ', $item->created_at)[0];
                                    $date = \Carbon\Carbon::parse($datetime);

                                    $times_ex = explode(' ', $item->created_at)[1];
                                    $times = \Carbon\Carbon::parse($times_ex);
                                    $time = explode(' ', $times->toDayDateTimeString());
                                ?>
                                <tr>
                                    <td class="cell"><?php echo e($loop->iteration); ?></td>
                                    <td class="cell">
                                        <span class="truncate">
                                            <?php $__currentLoopData = $item->transaction_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($el->menu->name.','); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </span>
                                    </td>
                                    <td class="cell text-center"><?php echo e($item->no_table); ?></td>
                                    <td class="cell"><span><?php echo e($date->toFormattedDateString()); ?></span><span class="note"><?php echo e($time[4].' '.$time[5]); ?></span></td>
                                    <td class="cell"><span class="badge <?php echo e($item->status == 'paid' ? 'bg-success' : 'bg-danger'); ?>"><?php echo e($item->status); ?></span></td>
                                    <td class="cell">IDR. <?php echo e(number_format($item->total_transaction, 0, ',', '.')); ?></td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cashier')): ?>
                                    <td class="cell"><a class="btn-sm app-btn-secondary" href="/transaction/<?php echo e($item->id); ?>">View</a></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>		
        </div>
        <?php echo e($all->withQueryString()->links()); ?>

    </div>
    
    <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
        <div class="app-card app-card-orders-table mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    
                    <table class="table mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">No</th>
                                <th class="cell">Product</th>
                                <th class="cell text-center">No Table</th>
                                <th class="cell">Date</th>
                                <th class="cell">Status</th>
                                <th class="cell">Total</th>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cashier')): ?>
                                <th class="cell"></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $today; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $datetime = explode(' ', $item->created_at)[0];
                                    $date = \Carbon\Carbon::parse($datetime);

                                    $times_ex = explode(' ', $item->created_at)[1];
                                    $times = \Carbon\Carbon::parse($times_ex);
                                    $time = explode(' ', $times->toDayDateTimeString());
                                ?>
                                <tr>
                                    <td class="cell"><?php echo e($loop->iteration); ?></td>
                                    <td class="cell">
                                        <span class="truncate">
                                            <?php $__currentLoopData = $item->transaction_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($el->menu->name.','); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </span>
                                    </td>
                                    <td class="cell text-center"><?php echo e($item->no_table); ?></td>
                                    <td class="cell"><span><?php echo e($date->toFormattedDateString()); ?></span><span class="note"><?php echo e($time[4].' '.$time[5]); ?></span></td>
                                    <td class="cell"><span class="badge <?php echo e($item->status == 'paid' ? 'bg-success' : 'bg-danger'); ?>"><?php echo e($item->status); ?></span></td>
                                    <td class="cell">IDR. <?php echo e(number_format($item->total_transaction, 0, ',', '.')); ?></td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cashier')): ?>
                                    <td class="cell"><a class="btn-sm app-btn-secondary" href="/transaction/<?php echo e($item->id); ?>">View</a></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>	
            <?php echo e($today->links()); ?>

        </div>
    </div>

    <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
        <div class="app-card app-card-orders-table mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">No</th>
                                <th class="cell">Product</th>
                                <th class="cell text-center">No Table</th>
                                <th class="cell">Date</th>
                                <th class="cell">Status</th>
                                <th class="cell">Total</th>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cashier')): ?>
                                <th class="cell"></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $thisMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $datetime = explode(' ', $item->created_at)[0];
                                    $date = \Carbon\Carbon::parse($datetime);

                                    $times_ex = explode(' ', $item->created_at)[1];
                                    $times = \Carbon\Carbon::parse($times_ex);
                                    $time = explode(' ', $times->toDayDateTimeString());
                                ?>
                                <tr>
                                    <td class="cell"><?php echo e($loop->iteration); ?></td>
                                    <td class="cell">
                                        <span class="truncate">
                                            <?php $__currentLoopData = $item->transaction_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($el->menu->name.','); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </span>
                                    </td>
                                    <td class="cell text-center"><?php echo e($item->no_table); ?></td>
                                    <td class="cell"><span><?php echo e($date->toFormattedDateString()); ?></span><span class="note"><?php echo e($time[4].' '.$time[5]); ?></span></td>
                                    <td class="cell"><span class="badge <?php echo e($item->status == 'paid' ? 'bg-success' : 'bg-danger'); ?>"><?php echo e($item->status); ?></span></td>
                                    <td class="cell">IDR. <?php echo e(number_format($item->total_transaction, 0, ',', '.')); ?></td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cashier')): ?>
                                    <td class="cell"><a class="btn-sm app-btn-secondary" href="/transaction/<?php echo e($item->id); ?>">View</a></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>		
        </div>
        <?php echo e($thisMonth->links()); ?>

    </div>
</div>
<script>
    const print = document.getElementById('print');
    document.querySelectorAll('.nav-link').forEach(function(elem) {
      elem.addEventListener('click', function(event) {
        let id = elem.getAttribute('id');
        const currentUrl = window.location.href;
        const [baseUrl, queryString] = currentUrl.split('?');
        let newQueryString = '';
        if (queryString) {
            const queryParams = new URLSearchParams(queryString);
            queryParams.delete('month');
            queryParams.delete('year');
            newQueryString = queryParams.toString();
        } else {
            if (id == 'orders-paid-tab') {
                print.href = '/report?data=today';
            } else if(id == 'orders-pending-tab') {
                print.href = '/report?data=thisMonth';
            } else {
                print.href = '/report?data=all';
            }
            return false;
        }
        const newUrl = `${baseUrl}${newQueryString ? '?' : ''}${newQueryString}`;
        window.location.href = newUrl;
        event.preventDefault();
      });
    });

    print.addEventListener('click', function (event) {
        let hrefPrint = print.href.split('=')[1];
        if (hrefPrint == 'all') {
            if (document.querySelector('#orders-all table tbody').childElementCount == 0) {
                alert('data printed not avaible');
                print.style.backgroundColor = '#198754';
                print.style.color = '#fff';
                event.preventDefault();
            }
        } else if(hrefPrint == 'today') {
            if (document.querySelector('#orders-paid table tbody').childElementCount == 0) {
                alert('data printed not avaible');
                print.style.backgroundColor = '#198754';
                print.style.color = '#fff';
                event.preventDefault();
            }
        } else if(hrefPrint == 'thisMonth') {
            if (document.querySelector('#orders-pending table tbody').childElementCount == 0) {
                alert('data printed not avaible');
                print.style.backgroundColor = '#198754';
                print.style.color = '#fff';
                event.preventDefault();
            }
        } else {
            if (document.querySelector('#orders-all table tbody').childElementCount == 0) {
                alert('data printed not avaible');
                print.style.backgroundColor = '#198754';
                print.style.color = '#fff';
                event.preventDefault();
            }
        }
    })
</script>  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\A\Downloads\Azizah\app_kasir_restoran\resources\views/transaction/index.blade.php ENDPATH**/ ?>