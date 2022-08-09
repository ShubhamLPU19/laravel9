<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        Create Product Model
    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.product-model.update")); ?>" method="POST" onSubmit="return confirm('Please verify your colors and addons before submit.')" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                <label for="title">Title<span style="color: red;">*</span></label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo e($productModel->title); ?>" required>
                <?php if($errors->has('title')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('title')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <input type="hidden" name="id" value="<?php echo e($productModel->id); ?>">
            <div class="form-group <?php echo e($errors->has('model_no') ? 'has-error' : ''); ?>">
                <label for="model_no">Model<span style="color: red;">*</span></label>
                <input type="text" id="model_no" name="model_no" class="form-control" value="<?php echo e($productModel->model_no); ?>" required>
                <?php if($errors->has('model_no')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('model_no')); ?>

                    </em>
                <?php endif; ?>
            </div>
            
            <div class="form-group <?php echo e($errors->has('price') ? 'has-error' : ''); ?>">
                <label for="model_no">Price<span style="color: red;">*</span></label>
                <input type="text" id="price" name="price" class="form-control" value="<?php echo e($productModel->price); ?>" required>
                <?php if($errors->has('price')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('price')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p><strong>Color</strong></p>
                    <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" name="color_parent" value="<?php echo e($value->parent_id); ?>" />
                    <?php $checked = 0; ?>
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($value->id == $v->attribute_id): ?>
                            <?php $checked = 1; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check">
                            <input class="form-check-input" name="color[]" type="checkbox" value="<?php echo e($value->id); ?>" <?php echo e($checked == 1 ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="defaultCheck1">
                                <?php echo e($value->name); ?>

                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-sm-6">
                    <p><strong>Variant</strong></p>
                    <?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" name="variant_parent" value="<?php echo e($value->parent_id); ?>" />
                    <?php $checked = 0; ?>
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($value->id == $v->attribute_id): ?>
                            <?php $checked = 1; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check">
                    <input class="form-check-input" name="variant[]" type="checkbox" value="<?php echo e($value->id); ?>" <?php echo e($checked == 1 ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="defaultCheck1">
                        <?php echo e($value->name); ?>

                    </label>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>
            
            <div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                <label for="status" style="margin-top: 12px;">Status<span style="color: red;">*</span></label>
                <select name="status" id="status" class="form-control select2" required>
                    <option value="active" <?php if($productModel->status == "active" ? 'selected' : ''): ?><?php endif; ?>>Active</option>
                    <option value="inactive" <?php if($productModel->status == "inactive" ? 'selected' : ''): ?><?php endif; ?>>Inactive</option>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service-sangam\resources\views/dealer/product_model/edit.blade.php ENDPATH**/ ?>