<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.ticket.title_singular')); ?>

    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.tickets.update", [$ticket->id])); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group <?php echo e($errors->has('customer_name') ? 'has-error' : ''); ?>">
                <label for="title">Customer Name <span style="color: red;">*</span></label>
                <input type="text" id="customer_name" name="customer_name" class="form-control" value="<?php echo e(old('customer_name', isset($ticket) ? $ticket->customer_name : '')); ?>" required>
                <?php if($errors->has('customer_name')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('customer_name')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group <?php echo e($errors->has('customer_mobile') ? 'has-error' : ''); ?>">
                        <label for="title">Customer Mobile <span style="color: red;">*</span></label>
                        <input type="tel" maxlength="10" id="customer_mobile" name="customer_mobile" class="form-control" value="<?php echo e(old('customer_mobile', isset($ticket) ? $ticket->customer_mobile : '')); ?>" required>
                        <?php if($errors->has('customer_mobile')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('customer_mobile')); ?>

                            </em>
                        <?php endif; ?>
                        <p class="helper-block">
                            <?php echo e(trans('cruds.ticket.fields.title_helper')); ?>

                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group <?php echo e($errors->has('customer_mobile') ? 'has-error' : ''); ?>">
                        <label for="title">Alternate Mobile (Optional)</label>
                        <input type="tel" maxlength="10" id="customer_alternate_mobile" name="customer_alternate_mobile" class="form-control" value="<?php echo e(old('customer_alternate_mobile', isset($ticket) ? $ticket->customer_alternate_mobile : '')); ?>">
                        <?php if($errors->has('customer_mobile')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('customer_mobile')); ?>

                            </em>
                        <?php endif; ?>
                        <p class="helper-block">
                            <?php echo e(trans('cruds.ticket.fields.title_helper')); ?>

                        </p>
                    </div>
                </div>
            </div>
            <div class="form-group <?php echo e($errors->has('state') ? 'has-error' : ''); ?>">
                <label for="priority">State <span style="color: red;">*</span></label>
                <select name="state" id="state" class="form-control select2" required>
                    <option value="">Select State</option>
                    <option value="Bihar" <?php if($ticket->state == "Bihar"): ?> selected <?php endif; ?>>Bihar</option>
                    <option value="UP" <?php if($ticket->state == "UP"): ?> selected <?php endif; ?>>UP</option>
                    <option value="Jharkhand" <?php if($ticket->state == "Jharkhand"): ?> selected <?php endif; ?>>Jharkhand</option>
                    <option value="West Bengal" <?php if($ticket->state == "West Bengal"): ?> selected <?php endif; ?>>West Bengal</option>
                    <option value="Odisha" <?php if($ticket->state == "Odisha"): ?> selected <?php endif; ?>>Odisha</option>
                </select>
                <?php if($errors->has('state')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('state')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-sm-6">
                        <div class="form-group <?php echo e($errors->has('city') ? 'has-error' : ''); ?>">
                        <label for="priority">City <span style="color: red;">*</span></label>
                        <input type="text" name="city" class="form-control" value="<?php echo e(old('city', isset($ticket) ? strtoupper($ticket->city) : '')); ?>" required>
                        <?php if($errors->has('city')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('city')); ?>

                            </em>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-6">
                        <div class="form-group <?php echo e($errors->has('pincode') ? 'has-error' : ''); ?>">
                        <label for="priority">Pincode <span style="color: red;"></span></label>
                        <input type="number" name="pincode" maxlength="6" class="form-control" value="<?php echo e(old('pincode', isset($ticket) ? $ticket->pincode : '')); ?>">
                        <?php if($errors->has('pincode')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('pincode')); ?>

                            </em>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
                <label for="title">Address <span style="color: red;">*</span></label>
                <textarea type="text" id="address" name="address" class="form-control" required><?php echo e(old('address', isset($ticket) ? strtoupper($ticket->address) : '')); ?></textarea>
                <?php if($errors->has('address')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('address')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('product_warranty') ? 'has-error' : ''); ?>">
                <label for="product_warranty">Product Warranty<span style="color: red;">*</span></label>
                <select name="product_warranty" id="product_warranty" class="form-control" required>
                    <option value="">Select Warranty</option>
                    <option value="yes" <?php if($ticket->product_warranty == "yes"): ?> selected <?php endif; ?>>Yes</option>
                    <option value="no" <?php if($ticket->product_warranty == "no"): ?> selected <?php endif; ?>>No</option>
                </select>
                <?php if($errors->has('product_warranty')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('product_warranty')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('model') ? 'has-error' : ''); ?>">
                <label for="title">Model</label>
                <input type="text" id="model" name="model" class="form-control" value="<?php echo e(old('model', isset($ticket) ? $ticket->model : '')); ?>">
                <?php if($errors->has('model')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('model')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <?php
            $data = explode(',',$ticket->category);
            //dd(($data));
            if(count($data) == 3)
            {
                $cate1 = explode('_',$data[0]);
                $cate2 = explode('_',$data[1]);
                $cate3 = explode('_',$data[2]);
                if($cate1[0] == "Lock"){
                    $category1 = $cate1[1];
                }
                if($cate2[0] == "Paint"){
                    $category2 = $cate2[1];
                }
                if($cate3[0] == "Rust"){
                    $category3 = $cate3[1];
                }
            }
            if(count($data) == 2)
            {
                $cate1 = explode('_',$data[0]);
                $cate2 = explode('_',$data[1]);
                //dd($cate);
                if($cate1[0] == "Lock"){
                    $category1 = $cate1[1];
                }
                if($cate2[0] == "Paint"){
                    $category2 = $cate2[1];
                }
                if($cate1[0] == "Paint"){
                    $category2 = $cate2[1];
                }
                if($cate1[0] == "Rust"){
                    $category3 = $cate1[1];
                }
            }
            if(count($data) == 1)
            {
                $cate = explode('_',$data[0]);
                if($cate[0] == "Lock"){
                    $category1 = $cate[1];
                }
                if($cate[0] == "Paint"){
                    $category2 = $cate[1];
                }
                if($cate[0] == "Rust"){
                    $category3 = $cate[1];
                }
            }

            ?>
            <div class="row">
                <div class="col-sm-4">
                    <label>Lock</label>
                    <select name="category1" id="category1" class="form-control select2">
                        <option value="">Please Select</option>
                        <option value="Main Lock" <?php if(@$category1 == "Main Lock"): ?> selected <?php endif; ?>>Main Lock</option>
                        <option value="Small Lock" <?php if(@$category1 == "Small Lock"): ?> selected <?php endif; ?>>Small Lock</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>Paint</label>
                    <select name="category2" id="category2" class="form-control select2">
                    <option value="">Please Select</option>
                    <option value="Brown" <?php if(@$category2 == "Brown"): ?> selected <?php endif; ?>>Brown</option>
                    <option value="Maroon" <?php if(@$category2 == "Maroon"): ?> selected <?php endif; ?>>Maroon</option>
                    <option value="Pink" <?php if(@$category2 == "Pink"): ?> selected <?php endif; ?>>Pink</option>
                    <option value="Purple" <?php if(@$category2 == "Purple"): ?> selected <?php endif; ?>>Purple</option>
                    <option value="Sky Blue" <?php if(@$category2 == "Sky Blue"): ?> selected <?php endif; ?>>Sky Blue</option>
                    <option value="White" <?php if(@$category2 == "White"): ?> selected <?php endif; ?>>White</option>
                    <option value="Ivory" <?php if(@$category2 == "Ivory"): ?> selected <?php endif; ?>>Ivory</option>
                    <option value="Olive" <?php if(@$category2 == "Olive"): ?> selected <?php endif; ?>>Olive</option>
                </select>
                </div>
                <div class="col-sm-4">
                    <label>Body</label>
                    <select name="category3" id="category3" class="form-control select2">
                    <option value="">Please Select</option>
                    <option value="Rust" <?php if(@$category3 == "Rust"): ?> selected <?php endif; ?>>Rust</option>
                </select>
                </div>
            </div>
            <div class="form-group <?php echo e($errors->has('status_id') ? 'has-error' : ''); ?>">
                <label for="status"><?php echo e(trans('cruds.ticket.fields.status')); ?> <span style="color: red;">*</span></label>
                <select name="status_id" id="status" class="form-control select2" required>
                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e((isset($ticket) && $ticket->status ? $ticket->status->id : old('status_id')) == $id ? 'selected' : ''); ?>><?php echo e($status); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('status_id')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('status_id')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('priority_id') ? 'has-error' : ''); ?>">
                <label for="priority"><?php echo e(trans('cruds.ticket.fields.priority')); ?> <span style="color: red;">*</span></label>
                <select name="priority_id" id="priority" class="form-control select2" required>
                    <?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e((isset($ticket) && $ticket->priority ? $ticket->priority->id : old('priority_id')) == $id ? 'selected' : ''); ?>><?php echo e($priority); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('priority_id')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('priority_id')); ?>

                    </em>
                <?php endif; ?>
            </div>
            
                <div class="form-group <?php echo e($errors->has('assigned_to_user_id') ? 'has-error' : ''); ?>">
                    <label for="assigned_to_user"><?php echo e(trans('cruds.ticket.fields.assigned_to_user')); ?> <span style="color: red;">*</span></label>
                    <select name="assigned_to_user_id" id="assigned_to_user" class="form-control select2" required>
                        <?php $__currentLoopData = $assigned_to_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $assigned_to_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($id); ?>" <?php echo e((isset($ticket) && $ticket->assigned_to_user ? $ticket->assigned_to_user->id : old('assigned_to_user_id')) == $id ? 'selected' : ''); ?>><?php echo e($assigned_to_user); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('assigned_to_user_id')): ?>
                        <em class="invalid-feedback">
                            <?php echo e($errors->first('assigned_to_user_id')); ?>

                        </em>
                    <?php endif; ?>
                </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            </div>
        </form>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
    url: '<?php echo e(route('admin.tickets.storeMedia')); ?>',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
      uploadedAttachmentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentsMap[file.name]
      }
      $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
    },
    init: function () {
<?php if(isset($ticket) && $ticket->attachments): ?>
          var files =
            <?php echo json_encode($ticket->attachments); ?>

              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
            }
<?php endif; ?>
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service\resources\views/admin/tickets/edit.blade.php ENDPATH**/ ?>