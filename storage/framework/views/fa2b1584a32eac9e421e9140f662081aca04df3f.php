
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.comment.title_singular')); ?>

    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.comments.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group <?php echo e($errors->has('ticket_id') ? 'has-error' : ''); ?>">
                <label for="ticket"><?php echo e(trans('cruds.comment.fields.ticket')); ?></label>
                <select name="ticket_id" id="ticket" class="form-control select2">
                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e((isset($comment) && $comment->ticket ? $comment->ticket->id : old('ticket_id')) == $id ? 'selected' : ''); ?>><?php echo e($ticket); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('ticket_id')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('ticket_id')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('author_name') ? 'has-error' : ''); ?>">
                <label for="author_name"><?php echo e(trans('cruds.comment.fields.author_name')); ?>*</label>
                <input type="text" id="author_name" name="author_name" class="form-control" value="<?php echo e(old('author_name', isset($comment) ? $comment->author_name : '')); ?>" required>
                <?php if($errors->has('author_name')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('author_name')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.comment.fields.author_name_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('author_email') ? 'has-error' : ''); ?>">
                <label for="author_email"><?php echo e(trans('cruds.comment.fields.author_email')); ?>*</label>
                <input type="text" id="author_email" name="author_email" class="form-control" value="<?php echo e(old('author_email', isset($comment) ? $comment->author_email : '')); ?>" required>
                <?php if($errors->has('author_email')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('author_email')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.comment.fields.author_email_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('user_id') ? 'has-error' : ''); ?>">
                <label for="user"><?php echo e(trans('cruds.comment.fields.user')); ?></label>
                <select name="user_id" id="user" class="form-control select2">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e((isset($comment) && $comment->user ? $comment->user->id : old('user_id')) == $id ? 'selected' : ''); ?>><?php echo e($user); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('user_id')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('user_id')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('comment_text') ? 'has-error' : ''); ?>">
                <label for="comment_text"><?php echo e(trans('cruds.comment.fields.comment_text')); ?>*</label>
                <textarea id="comment_text" name="comment_text" class="form-control " required><?php echo e(old('comment_text', isset($comment) ? $comment->comment_text : '')); ?></textarea>
                <?php if($errors->has('comment_text')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('comment_text')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.comment.fields.comment_text_helper')); ?>

                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            </div>
        </form>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service\resources\views/admin/comments/create.blade.php ENDPATH**/ ?>