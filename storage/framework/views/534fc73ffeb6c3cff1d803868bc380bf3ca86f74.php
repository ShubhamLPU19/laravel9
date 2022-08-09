<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.ticket.title_singular')); ?>

    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.tickets.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group <?php echo e($errors->has('customer_name') ? 'has-error' : ''); ?>">
                <label for="title">Customer Name*</label>
                <input type="text" id="customer_name" name="customer_name" class="form-control" value="<?php echo e(old('customer_name', isset($ticket) ? $ticket->customer_name : '')); ?>" required>
                <?php if($errors->has('customer_name')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('customer_name')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('customer_mobile') ? 'has-error' : ''); ?>">
                <label for="title">Customer Mobile*</label>
                <input type="text" id="customer_mobile" name="customer_mobile" class="form-control" value="<?php echo e(old('customer_mobile', isset($ticket) ? $ticket->customer_mobile : '')); ?>" required>
                <?php if($errors->has('customer_mobile')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('customer_mobile')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.ticket.fields.title_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
                <label for="title">Address*</label>
                <textarea type="text" id="address" name="address" class="form-control" required></textarea>
                <?php if($errors->has('address')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('address')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('state') ? 'has-error' : ''); ?>">
                <label for="priority">State*</label>
                <select name="state" id="state" class="form-control select2" required>
                    <option value="">Select State</option>
                    <option value="Bihar">Bihar</option>
                    <option value="UP">UP</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="West Bengal">West Bengal</option>
                    <option value="Odisha">Odisha</option>
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
                        <label for="priority">City*</label>
                        <input type="text" name="city" class="form-control" required>
                        <?php if($errors->has('city')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('city')); ?>

                            </em>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-6">
                        <div class="form-group <?php echo e($errors->has('pincode') ? 'has-error' : ''); ?>">
                        <label for="priority">Pincode*</label>
                        <input type="number" name="pincode" class="form-control" required>
                        <?php if($errors->has('pincode')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('pincode')); ?>

                            </em>
                        <?php endif; ?>
                    </div>
                </div>
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
            <div class="row">
                <div class="col-sm-4">
                    <label><strong>Lock</strong></label>
                    <select name="category1" id="category1" class="form-control select2">
                        <option value="">Please Select</option>
                        <option value="Big Lock">Big Lock</option>
                        <option value="Small Lock">Small Lock</option>
                </select>
                </div>
                <div class="col-sm-4">
                    <label><strong>Paint</strong></label>
                    <select name="category2" id="category2" class="form-control select2">
                    <option value="">Please Select</option>
                    <option value="Brown">Brown</option>
                    <option value="Maroon">Maroon</option>
                    <option value="Pink">Pink</option>
                    <option value="Purple">Purple</option>
                    <option value="Sky Blue">Sky Blue</option>
                    <option value="White">White</option>
                    <option value="Ivory">Ivory</option>
                    <option value="Olive">Olive</option>
                </select>
                </div>
                <div class="col-sm-4">
                    <label><strong>Rust</strong></label>
                    <select name="category3" id="category3" class="form-control select2">
                    <option value="">Please Select</option>
                    <option value="Rust">Rust</option>
                </select>
                </div>
            </div>
            <!-- <div class="form-group <?php echo e($errors->has('category_id') ? 'has-error' : ''); ?>">
                <label for="category"><?php echo e(trans('cruds.ticket.fields.category')); ?>*</label>
                <select name="category_id" id="category" class="form-control select2" required>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e((isset($ticket) && $ticket->category ? $ticket->category->id : old('category_id')) == $id ? 'selected' : ''); ?>><?php echo e($category); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('category_id')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('category_id')); ?>

                    </em>
                <?php endif; ?>
            </div> -->
            <!-- <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                <label for="title">Problem*</label>
                <textarea type="text" id="title" name="title" class="form-control" required></textarea>
                <?php if($errors->has('title')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('title')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.ticket.fields.title_helper')); ?>

                </p>
            </div> -->
            <!-- <div class="form-group <?php echo e($errors->has('content') ? 'has-error' : ''); ?>">
                <label for="content"><?php echo e(trans('cruds.ticket.fields.content')); ?></label>
                <textarea id="content" name="content" class="form-control "><?php echo e(old('content', isset($ticket) ? $ticket->content : '')); ?></textarea>
                <?php if($errors->has('content')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('content')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.ticket.fields.content_helper')); ?>

                </p>
            </div> -->
            <!-- <div class="form-group <?php echo e($errors->has('attachments') ? 'has-error' : ''); ?>">
                <label for="attachments"><?php echo e(trans('cruds.ticket.fields.attachments')); ?></label>
                <div class="needsclick dropzone" id="attachments-dropzone">

                </div>
                <?php if($errors->has('attachments')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('attachments')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.ticket.fields.attachments_helper')); ?>

                </p>
            </div> -->
            <div class="form-group <?php echo e($errors->has('status_id') ? 'has-error' : ''); ?>">
                <label for="status"><?php echo e(trans('cruds.ticket.fields.status')); ?>*</label>
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
                <label for="priority"><?php echo e(trans('cruds.ticket.fields.priority')); ?>*</label>
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

            <!-- <div class="form-group <?php echo e($errors->has('author_name') ? 'has-error' : ''); ?>">
                <label for="author_name"><?php echo e(trans('cruds.ticket.fields.author_name')); ?></label>
                <input type="text" id="author_name" name="author_name" class="form-control" value="<?php echo e(old('author_name', isset($ticket) ? $ticket->author_name : '')); ?>">
                <?php if($errors->has('author_name')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('author_name')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.ticket.fields.author_name_helper')); ?>

                </p>
            </div> -->
            <!-- <div class="form-group <?php echo e($errors->has('author_email') ? 'has-error' : ''); ?>">
                <label for="author_email"><?php echo e(trans('cruds.ticket.fields.author_email')); ?></label>
                <input type="text" id="author_email" name="author_email" class="form-control" value="<?php echo e(old('author_email', isset($ticket) ? $ticket->author_email : '')); ?>">
                <?php if($errors->has('author_email')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('author_email')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.ticket.fields.author_email_helper')); ?>

                </p>
            </div> -->
            <?php if(auth()->user()->isAdmin()): ?>
                <div class="form-group <?php echo e($errors->has('assigned_to_user_id') ? 'has-error' : ''); ?>">
                    <label for="assigned_to_user"><?php echo e(trans('cruds.ticket.fields.assigned_to_user')); ?></label>
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
            <?php endif; ?>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service\resources\views/admin/tickets/create.blade.php ENDPATH**/ ?>