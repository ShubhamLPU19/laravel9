<?php $__env->startSection('content'); ?>
<div class="alert alert-success d-none" id="msg_div">
    <span id="res_message"></span>
</div>
<div class="container">
<div class="row">
    <div class="col-sm">
      <div class="form-group">
            <label>Model</label>
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <label>Attribute</label>
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <label>Price</label>
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <label>Minimum Quantity</label>
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <label>New Quantity</label>
      </div>
    </div>
    <div class="col-sm">
    <div class="form-group">
        <label>Action</label>
    </div>
    </div>
  </div>
<?php $__currentLoopData = $attributeGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<input type="hidden" name="model_id" value="<?php echo e($group->model_id); ?>"/>
  <div class="row">
    <div class="col-sm">
      <div class="form-group">
            <input class="form-control" type="text" value="<?php echo e($group->title); ?>" readonly>
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <input class="form-control" type="text" value="<?php echo e($group->name); ?>" readonly>
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <input class="form-control price" type="text" value="<?php echo e($group->price); ?>">
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <input class="form-control min_qty" type="text" value="<?php echo e($group->min_quantity); ?>">
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <input class="form-control avail_qty" type="text" value="<?php echo e($group->available_quantity); ?>">
      </div>
    </div>
    <div class="col-sm">
    <div class="form-group">
      <button class="form-control btn btn-primary update" data-model="<?php echo e($group->attribute_id); ?>" data-id="<?php echo e($group->id); ?>">Update</button>
    </div>
    </div>
  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $(document).on('click','.delete', function(){
        //let qty = $(this).parent().siblings().find(".qty").val();
        let id = $(this).attr("data-id");
        //console.log('qty',qty);
        console.log('id',id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "cartitemdelete/"+id,
            type: 'DELETE',
            data: {id:id},
            success: function(response){
            console.log(response);
                $('#res_message').show();
                $('#res_message').html(response);
                $('#msg_div').removeClass('d-none');
                setTimeout(function(){
                location.reload();
                }, 1000);
                setTimeout(function(){
                    $('#res_message').hide();
                    $('#msg_div').hide();
                },1000);
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service-sangam\resources\views/dealer/product_model/attribute_group.blade.php ENDPATH**/ ?>