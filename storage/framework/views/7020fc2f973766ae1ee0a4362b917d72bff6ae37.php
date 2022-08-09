<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        Create Product
    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.products.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                <label for="title">Title<span style="color: red;">*</span></label>
                <input type="text" id="title" name="title" class="form-control" value="" required>
                <?php if($errors->has('title')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('title')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('model_id') ? 'has-error' : ''); ?>">
                <label for="model_id" style="margin-top: 12px;">Model<span style="color: red;">*</span></label>
                <select name="model_id" id="status" class="form-control select2" required>
                    <option value="">Select Model</option>
                    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($model->id); ?>"><?php echo e($model->model_no); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('model_id')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('model_id')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('dimension') ? 'has-error' : ''); ?>">
                <label for="title">Dimension<span style="color: red;">*</span></label>
                <input type="text" id="dimension" name="dimension" class="form-control" value="" required>
                <?php if($errors->has('dimension')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('dimension')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('weight') ? 'has-error' : ''); ?>">
                <label for="weight">Weight<span style="color: red;">*</span></label>
                <input type="text" id="weight" name="weight" class="form-control" value="" required>
                <?php if($errors->has('weight')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('weight')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('color') ? 'has-error' : ''); ?>">
                <label for="color">Color<span style="color: red;">*</span></label>
                <input type="text" id="color" name="color" class="form-control" value="" required>
                <?php if($errors->has('color')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('color')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('price') ? 'has-error' : ''); ?>">
                <label for="price">Price<span style="color: red;">*</span></label>
                <input type="text" id="price" name="price" class="form-control" value="" required>
                <?php if($errors->has('price')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('price')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('min_stock') ? 'has-error' : ''); ?>">
                <label for="min_stock">Minimum Stock<span style="color: red;">*</span></label>
                <input type="text" id="min_stock" name="min_stock" class="form-control" value="" required>
                <?php if($errors->has('min_stock')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('min_stock')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('available_stock') ? 'has-error' : ''); ?>">
                <label for="available_stock">Available Stock<span style="color: red;">*</span></label>
                <input type="text" id="available_stock" name="available_stock" class="form-control" value="" required>
                <?php if($errors->has('available_stock')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('available_stock')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('sku') ? 'has-error' : ''); ?>">
                <label for="sku">SKU<span style="color: red;">*</span></label>
                <input type="text" id="sku" name="sku" class="form-control" value="" required>
                <?php if($errors->has('sku')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('sku')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
                <label for="description">Description<span style="color: red;">*</span></label>
                <input type="text" id="description" name="description" class="form-control" value="" required>
                <?php if($errors->has('description')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('description')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
                <label for="image">Image<span style="color: red;">*</span></label>
                <input type="file" id="image" name="image" class="form-control" value="" required>
                <?php if($errors->has('image')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('image')); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service-sangam\resources\views/dealer/product/create.blade.php ENDPATH**/ ?>