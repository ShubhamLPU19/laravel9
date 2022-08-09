<?php $__env->startSection('content'); ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Order Id</th>
      <th scope="col">Quantity</th>
      <th scope="col">Amount</th>
      <th scope="col">Status</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $sum_of_amount = 0; ?>
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <th scope="row"><?php echo e($order->id); ?></th>
        <td><?php echo e($order->quantity); ?></td>
        <td><?php echo e($order->total_amount); ?></td>
        <td><?php echo e($order->quantity); ?></td>
        <td><?php echo e($order->created_at); ?></td>
        <td>View Detail</td>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service-sangam\resources\views/dealer/dealer_profile/my_orders.blade.php ENDPATH**/ ?>