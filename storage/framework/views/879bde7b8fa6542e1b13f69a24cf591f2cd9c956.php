
<?php $__env->startSection('title'); ?> <?php echo e($pageTitle); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="fixed-row">
        <div class="app-title">
            <div class="active-wrap">
                <div class="form-group">
                    <a class="btn btn-secondary" href="<?php echo e(URL::previous()); ?>"><i style="vertical-align: baseline;" class="fa fa-chevron-left"></i>Back</a>
                </div>
            </div>
        </div>
    <?php echo $__env->make('admin.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="user">
            <div class="col-md-12 nopadding">
                <div class="tile p-0">
                    <ul class="nav nav-tabs user-tabs">
                        <li class="nav-item nav-item-top"><a class="nav-link active" href="#profile" data-toggle="tab">Basic</a></li>
                        <li class="nav-item nav-item-top"><a class="nav-link" href="#ads" data-toggle="tab">Billing</a></li>
                        <li class="nav-item nav-item-top"><a class="nav-link" href="#payments" data-toggle="tab">Shipping</a></li>
                        <li class="nav-item nav-item-top"><a class="nav-link" href="#Courier" data-toggle="tab">Courier</a></li>
                        <li class="nav-item nav-item-top"><a class="nav-link" href="#orderdetails" data-toggle="tab">Order Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-md-body">
        <div class="alert alert-success" id="success-msg" style="display: none;">
            <span id="success-text"></span>
        </div>
        <div class="alert alert-danger" id="error-msg" style="display: none;">
            <span id="error-text"></span>
        </div>
        <div class="col-md-12">
            <div class="tab-content">
                <div class="tab-pane active" id="profile">
                    <?php echo $__env->make('admin.order.includes.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                 <div class="tab-pane fade" id="ads">
                    <?php echo $__env->make('admin.order.includes.ads', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="payments">
                    <?php echo $__env->make('admin.order.includes.payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div> 
                <div class="tab-pane fade" id="Courier">
                    <?php echo $__env->make('admin.order.includes.courier', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="orderdetails">
                    <?php echo $__env->make('admin.order.includes.orderdetails', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>  
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script type="text/javascript">
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/admin/order/details.blade.php ENDPATH**/ ?>