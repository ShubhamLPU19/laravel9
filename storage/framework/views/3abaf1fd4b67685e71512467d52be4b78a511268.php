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
                            Ticket Id
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
                            <?php echo e(date('l d F Y h:i A',strtotime($ticket->created_at))); ?>

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
                            Alternate Mobile
                        </th>
                        <td>
                            <?php echo e($ticket->customer_alternate_mobile); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Product Warranty
                        </th>
                        <td>
                            <?php echo e(strtoupper($ticket->product_warranty)); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            State
                        </th>
                        <td>
                            <?php echo e($ticket->state); ?>

                        </td>
                    </tr>
                     <tr>
                        <th>
                            City
                        </th>
                        <td>
                            <?php echo e(strtoupper($ticket->city)); ?>

                        </td>
                    </tr>
                     <tr>
                        <th>
                            Address
                        </th>
                        <td>
                            <?php echo e(strtoupper($ticket->address)); ?>

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
                    <?php
                        $trimStr = ltrim($ticket->category,'Lock');
                        $str = str_replace("_"," ", $trimStr);
                        $category = ltrim($str);
                    ?>
                    <tr>
                        <th>
                            Issue
                        </th>
                        <td>
                            <?php echo e($category ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Assigned To Agent
                        </th>
                        <td>
                            <?php echo e($ticket->assigned_to_user->name ?? ''); ?>

                        </td>
                    </tr>
                    <form action="<?php echo e(route('admin.tickets.storeComment', $ticket->id)); ?>" method="POST">
                        <input type="hidden" name="ticket_id" value="<?php echo e($ticket->id); ?>">
                    <?php if(auth()->user()->isAgent()): ?>
                    <tr>
                        <th>Status</th>
                        <td>
                        <div class="form-group ">
                                <label>Select Status</label>
                                <select name="status" class="form-control">
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
                        <th>
                            <?php echo e(trans('cruds.ticket.fields.comments')); ?>

                        </th>
                        <td>
                            <?php $__empty_1 = true; $__currentLoopData = $ticket->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="row">
                                    <div class="col">
                                        <p class="font-weight-bold"><a href="mailto:<?php echo e($comment->author_email); ?>"><?php echo e($comment->author_name); ?></a> (<?php echo e($comment->created_at); ?>)</p>
                                        <p><?php echo e($comment->comment_text); ?></p>
                                    </div>
                                </div>
                                <hr />
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="row">
                                    <div class="col">
                                        <p>There are no comments.</p>
                                    </div>
                                </div>
                                <hr />
                            <?php endif; ?>
                            
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="comment_text">Leave a comment</label>
                                    <textarea class="form-control" id="comment_text" name="comment_text" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('global.submit'); ?></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php if(auth()->user()->isAdmin() || auth()->user()->isExecutive()): ?>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Ticket Id</th>
                <th scope="col">Action Performed By</th>
                <th scope="col">Status</th>
                <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $ticket_history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($history->ticket_id); ?></td>
                    <td><?php echo e($history->name); ?></td>
                    <td><?php echo e($history->status); ?></td>
                    <td><?php echo e(date('l d F Y h:i A',strtotime($history->created_at))); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php endif; ?>
        <a class="btn btn-default my-2" href="<?php echo e(route('admin.tickets.index')); ?>">
            <?php echo e(trans('global.back_to_list')); ?>

        </a>

        <a href="<?php echo e(route('admin.tickets.edit', $ticket->id)); ?>" class="btn btn-primary">
            <?php echo app('translator')->get('global.edit'); ?> <?php echo app('translator')->get('cruds.ticket.title_singular'); ?>
        </a>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service\resources\views/admin/tickets/show.blade.php ENDPATH**/ ?>