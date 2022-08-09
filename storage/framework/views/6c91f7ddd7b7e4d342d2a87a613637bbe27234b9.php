<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.user.title_singular')); ?>

    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.users.update", [$user->id])); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="name"><?php echo e(trans('cruds.user.fields.name')); ?><span style="color: red;">*</span></label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo e(old('name', isset($user) ? $user->name : '')); ?>" required>
                <?php if($errors->has('name')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('name')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.user.fields.name_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                <label for="email"><?php echo e(trans('cruds.user.fields.email')); ?><span style="color: red;">*</span></label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo e(old('email', isset($user) ? $user->email : '')); ?>" required>
                <?php if($errors->has('email')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('email')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.user.fields.email_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('mobile') ? 'has-error' : ''); ?>">
                <label for="mobile">Mobile<span style="color: red;">*</span></label>
                <input type="tel" id="mobile" name="mobile" maxlength="10" class="form-control" value="<?php echo e(old('mobile', isset($user) ? $user->mobile : '')); ?>" required>
                <?php if($errors->has('mobile')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('mobile')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.user.fields.mobile_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('work_location') ? 'has-error' : ''); ?>">
                <label for="work_location">Work Location<span style="color: red;">*</span></label>
                <textarea type="text" id="work_location" name="work_location" class="form-control" required><?php echo e(old('work_location', isset($user) ? $user->work_location : '')); ?></textarea>
                <?php if($errors->has('work_location')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('work_location')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                <label for="status" style="margin-top: 12px;">Status<span style="color: red;">*</span></label>
                <select name="status" id="status" class="form-control select2" required>
                    <option value="active" <?php if(@$user->status == "active"): ?> selected <?php endif; ?>>Active</option>
                    <option value="inactive" <?php if(@$user->status == "inactive"): ?> selected <?php endif; ?>>Inactive</option>
                </select>
                <?php if($errors->has('status')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('status')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                <label for="password"><?php echo e(trans('cruds.user.fields.password')); ?></label>
                <input type="password" id="password" name="password" class="form-control">
                <?php if($errors->has('password')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.user.fields.password_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('roles') ? 'has-error' : ''); ?>">
                <label for="roles"><?php echo e(trans('cruds.user.fields.roles')); ?><span style="color: red;">*</span>
                    <span class="btn btn-info btn-xs select-all"><?php echo e(trans('global.select_all')); ?></span>
                    <span class="btn btn-info btn-xs deselect-all"><?php echo e(trans('global.deselect_all')); ?></span></label>
                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e((in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : ''); ?>><?php echo e($roles); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('roles')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('roles')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.user.fields.roles_helper')); ?>

                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            </div>
        </form>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service-sangam\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>