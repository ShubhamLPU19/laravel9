<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        View Product
    </div>

    <div class="card-body">
        <div class="form-group">
            <label for="title">Title<span style="color: red;"></span></label>
            <input type="text" id="title" name="title" class="form-control" value="<?php echo e($product->title); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="model_id" style="margin-top: 12px;">Model<span style="color: red;"></span></label>
            <input type="text" name="model_id" value="<?php echo e($product->model_no); ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="title">Dimension<span style="color: red;"></span></label>
            <input type="text" id="dimension" name="dimension" class="form-control" value="<?php echo e($product->dimension); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="weight">Weight<span style="color: red;"></span></label>
            <input type="text" id="weight" name="weight" class="form-control" value="<?php echo e($product->weight); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="color">Color<span style="color: red;"></span></label>
            <input type="text" id="color" name="color" class="form-control" value="<?php echo e($product->color); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="price">Price<span style="color: red;"></span></label>
            <input type="text" id="price" name="price" class="form-control" value="<?php echo e($product->price); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="min_stock">Minimum Stock<span style="color: red;"></span></label>
            <input type="text" id="min_stock" name="min_stock" class="form-control" value="<?php echo e($product->min_stock); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="available_stock">Available Stock<span style="color: red;"></span></label>
            <input type="text" id="available_stock" name="available_stock" class="form-control" value="<?php echo e($product->available_stock); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="sku">SKU<span style="color: red;"></span></label>
            <input type="text" id="sku" name="sku" class="form-control" value="<?php echo e(strtoupper($product->description)); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="description">Description<span style="color: red;"></span></label>
            <input type="text" id="description" name="description" class="form-control" value="<?php echo e($product->description); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="image">Image<span style="color: red;"></span></label>
            <img src="<?php echo e(URL::asset('/dealer/products/'.$product->image)); ?>" style="height:100px;width:100px;" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="status" style="margin-top: 12px;">Status<span style="color: red;"></span></label>
            <input type="text" name="status" value="<?php echo e(ucwords($product->status)); ?>" class="form-control" readonly>
        </div>
        <div>
            <a href="<?php echo e(route('admin.products')); ?>" class="btn btn-danger">Back</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service-sangam\resources\views/dealer/product/show.blade.php ENDPATH**/ ?>