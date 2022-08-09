<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">
                <img src="<?php echo e(URL::asset('/images/logo-new.bmp')); ?>" style="margin-left: 140px;">
                <!-- <h1><?php echo e(trans('panel.site_title')); ?></h1> -->
                <p class="text-muted"><?php echo e(trans('global.login')); ?></p>

                <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <input id="email" name="email" type="text" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" required autocomplete="email" autofocus placeholder="<?php echo e(trans('global.login_email')); ?>" value="<?php echo e(old('email', null)); ?>">

                        <?php if($errors->has('email')): ?>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('email')); ?>

                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>

                        <input id="password" name="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" required placeholder="<?php echo e(trans('global.login_password')); ?>">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-fw fa-eye-slash toggle-password" aria-hidden="true"></i></span>

                        <?php if($errors->has('password')): ?>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('password')); ?>

                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="input-group mb-4">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                            <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                <?php echo e(trans('global.remember_me')); ?>

                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary px-4">
                                <?php echo e(trans('global.login')); ?>

                            </button>
                        </div>
                        <!-- <div class="col-6 text-right">
                            <?php if(Route::has('password.request')): ?>
                                <a class="btn btn-link px-0" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(trans('global.forgot_password')); ?>

                                </a><br>
                            <?php endif; ?>

                        </div> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service\resources\views/auth/login.blade.php ENDPATH**/ ?>