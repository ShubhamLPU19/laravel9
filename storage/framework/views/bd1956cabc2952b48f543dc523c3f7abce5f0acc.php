<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        View Dealer Category
    </div>

    <div class="card-body">
        <div class="form-group">
            <label for="name">Name<span style="color: red;">*</span></label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo e($category->name); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="percentage">Percentage<span style="color: red;">*</span></label>
            <input type="text" id="percentage" name="percentage" class="form-control" value="<?php echo e($category->percentage); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="status" style="margin-top: 12px;">Status<span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="status" value="<?php echo e($category->status); ?>" readonly>
        </div>
        <div>
            <a href="<?php echo e(route('admin.dealer-categories')); ?>" class="btn btn-danger">Back</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service-sangam\resources\views/dealer/dealer_category/show.blade.php ENDPATH**/ ?>