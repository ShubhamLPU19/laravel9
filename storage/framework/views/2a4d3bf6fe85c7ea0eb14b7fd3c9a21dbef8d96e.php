<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        Create Dealer Category
    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.product-attributes.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group <?php echo e($errors->has('parent_id') ? 'has-error' : ''); ?>">
                <label for="parent_id">Category<span style="color: red;">*</span></label>
                <select name="parent_id" id="parent_id" class="form-control select2" required>
                    <option value="0">Parent</option>
                    <option value="2">Color</option>
                    <option value="3">Variant</option>
                </select>
                <?php if($errors->has('parent_id')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('parent_id')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="name">Name<span style="color: red;">*</span></label>
                <input type="text" id="name" name="name" class="form-control" value="" required>
                <?php if($errors->has('name')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('name')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group priceInput <?php echo e($errors->has('price') ? 'has-error' : ''); ?>">
                <label for="name">Price<span style="color: red;"></span></label>
                <input type="text" id="price" name="price" class="form-control" value="">
                <?php if($errors->has('price')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('price')); ?>

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
<?php $__env->startSection('scripts'); ?>
    <script>
        $(function() {
            $('.priceInput').hide();
            $('#parent_id').change(function(){
                if($('#parent_id').val() == '3') {
                    $('.priceInput').show();
                } else {
                    $('.priceInput').hide();
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service-sangam\resources\views/dealer/product_attribute/create.blade.php ENDPATH**/ ?>