<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        Create Dealer Category
    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.dealer-categories.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="name">Name<span style="color: red;">*</span></label>
                <input type="text" id="name" name="name" class="form-control" value="" required>
                <?php if($errors->has('name')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('name')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('percentage') ? 'has-error' : ''); ?>">
                <label for="percentage">Percentage<span style="color: red;">*</span></label>
                <input type="text" id="percentage" name="percentage" class="form-control" value="" required>
                <?php if($errors->has('percentage')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('percentage')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                <label for="status" style="margin-top: 12px;">Status<span style="color: red;">*</span></label>
                <select name="status" id="status" class="form-control select2" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                <?php if($errors->has('status')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('status')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Save">
            </div>
        </form>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service-sangam\resources\views/dealer/dealer_category/create.blade.php ENDPATH**/ ?>