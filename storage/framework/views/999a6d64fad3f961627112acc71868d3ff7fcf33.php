<?php echo $__env->make("site.partials.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection("content"); ?>
<?php echo $__env->yieldSection(); ?>
<?php echo $__env->make("site.partials.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/WorkArea/Oneness/utkarsh/resources/views/site/partials/app.blade.php ENDPATH**/ ?>