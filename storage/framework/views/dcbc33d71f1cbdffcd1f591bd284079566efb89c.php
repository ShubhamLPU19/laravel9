<?php $__env->startSection('content'); ?>
<?php $j = sizeof($modelData);
$percentage =0;
    if(auth()->user()->isDealer())
    {
        $data = Session::get('id_percentage');
        $arr = explode('_',$data);
        $percentage = $arr[1];
    }
?>
<?php for($i=0;$i<$j/2;$i++): ?>
    
    <?php
        $data = array_splice($modelData,0,2);
        

    ?>
    
<div class="row">
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $model_id = 0; $model_id = $value['model']['id']; ?>
  <?php $calculate = ($percentage/100)*$value['model']['price'];  ?>
  <div class="col-sm-6">
  <form action="<?php echo e(route('admin.addorders')); ?>" id="<?php echo e($model_id); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="card">
      <div class="card-body">
            <h5 class="card-title"><?php echo e($value['model']['title']); ?></h5>
            <p class="card-text">MRP. <span><del><?php echo e($value['model']['price']); ?></del> </span></p>
            <p class="card-text">Your Price. <span><?php echo e(getDDPrice($value['model']['price'],1)); ?></span></p>
            <input type="hidden" name="model" value="<?php echo e($model_id); ?>"/>
        <div class="row">
            <div class="col-sm-3">
                <p><strong>Color</strong></p>
                <?php $__currentLoopData = $value['color']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colKey => $colVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(empty($value['variant'])): ?>
                        <div class="form-check">
                            <input class="form-check-input" name="color[]" type="checkbox" value="<?php echo e($colVal['id']); ?>" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                <?php echo e($colVal['name']); ?>

                            </label>
                        </div>
                    <?php else: ?>
                        <div class="form-check radio-green">
                            <input type="radio" class="form-check-input" id="radioGreen1" name="color[]" value="<?php echo e($colVal['id']); ?>" required>
                            <label class="form-check-label" for="radioGreen1"><?php echo e($colVal['name']); ?></label>
                        </div>
                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-sm-3">
                <?php if(!empty($value['variant'])): ?>
                <p><strong>Body Color</strong></p>
                <?php $__currentLoopData = $value['variant']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $varKey => $varVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check">
                <input class="form-check-input" name="variant[]" type="checkbox" value="<?php echo e($varVal['id']); ?>" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    <?php echo e($varVal['name']); ?>

                </label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <?php if(empty($value['variant'])): ?>
            <div class="col-sm-3">
                <p><strong>Quantity</strong></p>
                <?php $__currentLoopData = $value['color']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colKey => $colVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input class="form-control qty_<?php $colKey?>" name="qty[]" type="number" value=""/>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
            <div class="col-sm-3">
                <?php if(!empty($value['variant'])): ?>
                <p><strong>Variant</strong></p>
                <?php $__currentLoopData = $value['variant']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $varKey => $varVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check">
                <input class="form-check-input qty_<?php $colKey?>" name="variant[]" type="checkbox" value="<?php echo e($varVal['id']); ?>" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    <?php echo e($varVal['name']); ?>

                </label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <?php if(!empty($value['variant'])): ?>
            <div class="col-sm-3 ctext">
                <p><strong>Quantity</strong></p>
                <?php $__currentLoopData = $value['variant']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $varKey => $varVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input class="form-control ctext" name="qty[]" type="number" value=""/>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
        </div>
        <br>
        <button type="button" class="btn btn-primary model"><i class="fas fa-shopping-cart"></i> ADD TO CART</button>
      </div>
    </div>
    </form>
  </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endfor; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
$(document).on("click",".model", function(){
    var formid = $(this).closest("form").attr("id");
    alert(formid);
    $('form#'+formid).submit();
});

$(document).ready(function(){
   // $(".ctext").hide();
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service-sangam\resources\views/dealer/order/index.blade.php ENDPATH**/ ?>