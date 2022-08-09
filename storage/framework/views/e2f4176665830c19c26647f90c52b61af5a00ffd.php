<?php $__env->startSection('content'); ?>
<div class="alert alert-success d-none" id="msg_div">
    <span id="res_message"></span>
</div>
<form action="<?php echo e(route('admin.checkout')); ?>" method="post">
<?php echo csrf_field(); ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">MRP</th>
      <th scope="col">Add-on Price</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $sum_of_amount = 0; ?>
    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <input type="hidden" name="id[]" value="<?php echo e($cart->user_id); ?>"
    <?php $sum_of_amount += $cart->amount; ?>
        <tr>
        <th scope="row"><?php echo e($cart->product_name); ?></th>
        <td><?php echo e($cart->price); ?></td>
        <td><?php echo e($cart->attribute_price); ?></td>
        <td><?php echo e($cart->dd_price); ?></td>
        <td><input type="text" name="qty" value="<?php echo e($cart->quantity); ?>"/></td>
        <td><?php echo e($cart->amount); ?></td>
        <td><button class="btn btn-success update" data-batch="" data-batch_id="" data-qty="" data-id="<?php echo e($cart->id); ?>">Update</button>||<button data-id="<?php echo e($cart->id); ?>" class="btn btn-danger delete">Delete</button></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>Total Amount: </strong></td>
        <td><?php echo e($sum_of_amount); ?></td>
        </tr>
  </tbody>
</table>
<div class="text-center">
    <button type="submit" class="btn btn-primary">Order Proceed</button>
</div>
</form>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service-sangam\resources\views/dealer/order/cart_list.blade.php ENDPATH**/ ?>