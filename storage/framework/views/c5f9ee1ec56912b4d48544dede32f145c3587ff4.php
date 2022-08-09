
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
                            <?php echo e(trans('cruds.ticket.fields.title')); ?>

                        </th>
                        <td>
                            <?php echo e($ticket->title); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.ticket.fields.content')); ?>

                        </th>
                        <td>
                            <?php echo $ticket->content; ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.ticket.fields.attachments')); ?>

                        </th>
                        <td>
                            <?php $__currentLoopData = $ticket->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($attachment->getUrl()); ?>" target="_blank"><?php echo e($attachment->file_name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php echo e($ticket->category->name ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.ticket.fields.author_name')); ?>

                        </th>
                        <td>
                            <?php echo e($ticket->author_name); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.ticket.fields.author_email')); ?>

                        </th>
                        <td>
                            <?php echo e($ticket->author_email); ?>

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
                            <form action="<?php echo e(route('admin.tickets.storeComment', $ticket->id)); ?>" method="POST">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel-Support-Ticketing\resources\views/admin/tickets/show.blade.php ENDPATH**/ ?>