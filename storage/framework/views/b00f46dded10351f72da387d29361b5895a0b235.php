<?php $__env->startSection('content'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ticket_create')): ?>
    <!-- <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo e(route("admin.tickets.create")); ?>">
                <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.ticket.title_singular')); ?>

            </a>
        </div>
    </div> -->
<?php endif; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Select Agent</label>
                                <select name="status" class="form-control">
                                    <option value="">Please Select</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Select Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($status->id); ?>"><?php echo e($status->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>From Date</label>
                                <input type="date" name="from" class="form-control" value="" placeholder="From Date">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>To Date</label>
                                <input type="date" name="to" class="form-control" value="" placeholder="To Date">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label></label>
                            <div class="form-group button-group p-t-15" style="margin-top: 5px;">
                                <button type="button" class="btn btn-info" id="export" style="width: 110px;">Export Ticket</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.ticket.title_singular')); ?> <?php echo e(trans('global.list')); ?>

        <a class="btn btn-success" style="float:right;" href="<?php echo e(route("admin.tickets.create")); ?>">
            <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.ticket.title_singular')); ?>

        </a>
    </div>
    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Ticket">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        <?php echo e(trans('cruds.ticket.fields.id')); ?>

                    </th>
                    <th>
                        State
                    </th>
                    <!-- <th>
                        City
                    </th> -->
                    <th>
                        <?php echo e(trans('cruds.ticket.fields.status')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.ticket.fields.priority')); ?>

                    </th>
                    <th>
                        Category
                    </th>
                    <th>
                       Customer Name
                    </th>
                    <th>
                        Customer Mobile
                    </th>
                    <th>
                        <?php echo e(trans('cruds.ticket.fields.assigned_to_user')); ?>

                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script>
    $(function () {
let filters = `
<form class="form-inline" id="filtersForm">
  <div class="form-group mx-sm-3 mb-2">
    <select class="form-control" name="status">
      <option value="">All statuses</option>
      <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($status->id); ?>"<?php echo e(request('status') == $status->id ? 'selected' : ''); ?>><?php echo e($status->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <select class="form-control" name="priority">
      <option value="">All priorities</option>
      <?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($priority->id); ?>"<?php echo e(request('priority') == $priority->id ? 'selected' : ''); ?>><?php echo e($priority->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <select class="form-control" name="category">
      <option value="">All categories</option>
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($category->id); ?>"<?php echo e(request('category') == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
</form>`;
$('.card-body').on('change', 'select', function() {
  $('#filtersForm').submit();
})
  let dtButtons = []
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ticket_delete')): ?>
  let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "<?php echo e(route('admin.tickets.massDestroy')); ?>",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')

        return
      }

      if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
<?php endif; ?>
  let searchParams = new URLSearchParams(window.location.search)
  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: {
      url: "<?php echo e(route('admin.tickets.index')); ?>",
      data: {
        'status': searchParams.get('status'),
        'priority': searchParams.get('priority'),
        'category': searchParams.get('category')
      }
    },
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{
    data: 'state',
    name: 'state',
    // render: function ( data, type, row) {
    //     return '<a href="'+row.view_link+'">'+data+' ('+row.comments_count+')</a>';
    // }
},
{
  data: 'status_name',
  name: 'status.name',
  render: function ( data, type, row) {
      return '<span style="color:'+row.status_color+'">'+data+'</span>';
  }
},
{
  data: 'priority_name',
  name: 'priority.name',
  render: function ( data, type, row) {
      return '<span style="color:'+row.priority_color+'">'+data+'</span>';
  }
},
{
  data: 'category',
  name: 'category',
  render: function ( data, type, row) {
      return '<span style="color:'+row.category_color+'">'+data+'</span>';
  }
},
{ data: 'customer_name', name: 'customer_name' },
{ data: 'customer_mobile', name: 'customer_mobile' },
{ data: 'assigned_to_user_name', name: 'assigned_to_user.name' },
{ data: 'actions', name: '<?php echo e(trans('global.actions')); ?>' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
$(".datatable-Ticket").one("preInit.dt", function () {
 $(".dataTables_filter").after(filters);
});
  $('.datatable-Ticket').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service\resources\views/admin/tickets/index.blade.php ENDPATH**/ ?>