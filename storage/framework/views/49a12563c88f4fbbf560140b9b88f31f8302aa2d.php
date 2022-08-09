<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.ticket.title')); ?>

    </div>

    <div class="card-body">
        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.ticket.fields.id')); ?>

                        </th>
                        <td>
                            <?php echo e($ticket->id); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.ticket.fields.created_at')); ?>

                        </th>
                        <td>
                            <?php echo e($ticket->created_at); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Customer Name
                        </th>
                        <td>
                            <?php echo e($ticket->customer_name); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Customer Mobile
                        </th>
                        <td>
                            <?php echo e($ticket->customer_mobile); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.ticket.fields.status')); ?>

                        </th>
                        <td>
                            <?php echo e($ticket->status->name ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.ticket.fields.priority')); ?>

                        </th>
                        <td>
                            <?php echo e($ticket->priority->name ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.ticket.fields.category')); ?>

                        </th>
                        <td>
                            <?php echo e($ticket->category ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.ticket.fields.assigned_to_user')); ?>

                        </th>
                        <td>
                            <?php echo e($ticket->assigned_to_user->name ?? ''); ?>

                        </td>
                    </tr>
                    <form action="<?php echo e(route('admin.tickets.ticketClose')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="ticket_id" value="<?php echo e($ticket->id); ?>">
                    <?php if(auth()->user()->isAgent()): ?>
                    <tr>
                        <th>Status</th>
                        <td>
                        <div class="form-group ">
                                <label>Select Status</label>
                                <select name="status" class="form-control" disabled="true">
                                    <option value="">Select Status</option>
                                        <option value="3" <?php echo e($ticket->status_id == 3  ? 'selected' : ''); ?>>Process</option>
                                        <option value="5" <?php echo e($ticket->status_id == 5  ? 'selected' : ''); ?>>On Hold</option>
                                        <option value="4" <?php echo e($ticket->status_id == 4  ? 'selected' : ''); ?>>Complete</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <?php else: ?>
                    <tr>
                        <th>Status</th>
                        <td>
                        <div class="form-group ">
                                <label>Select Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($status->id); ?>" <?php echo e($ticket->status_id == $status->id  ? 'selected' : ''); ?>><?php echo e($status->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <th>OTP</th>
                        <td>
                        <div class="form-group ">
                                <input type="tel" maxlength="6" name="otp" class="form-control" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('global.submit'); ?></button>
                        </td>
                    </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <a class="btn btn-default my-2" href="<?php echo e(route('admin.tickets.index')); ?>">
            <?php echo e(trans('global.back_to_list')); ?>

        </a>
        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service\resources\views/admin/tickets/otp.blade.php ENDPATH**/ ?>