<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        View Product Model
    </div>

    <div class="card-body">
            <div class="form-group">
                <label for="title">Title<span style="color: red;"></span></label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo e($models->title); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="model_no">Model<span style="color: red;"></span></label>
                <input type="text" id="model_no" name="model_no" class="form-control" value="<?php echo e($models->model_no); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="image">Image<span style="color: red;"></span></label>
                <img src="<?php echo e(URL::asset('/dealer/product_model/'.$models->image)); ?>" class="form-control" style="height:100px;width:100px;">
            </div>
            <div class="form-group">
                <label for="status" style="margin-top: 12px;">Status<span style="color: red;"></span></label>
                <input type="text" name="status" class="form-control" value="<?php echo e(ucwords($models->status)); ?>" readonly>
            </div>
            <div>
                <a href="<?php echo e(route('admin.product-model')); ?>" class="btn btn-danger">Back</a>
            </div>
        </form>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service-sangam\resources\views/dealer/product_model/show.blade.php ENDPATH**/ ?>