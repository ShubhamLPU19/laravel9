<?php $__env->startSection('content'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ticket_create')): ?>
    
<?php endif; ?>

<?php if(session('status')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
<div class="card">
    <div class="card-header">
        Product Model
         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_model_create')): ?>
            <a class="btn btn-success" style="float:right;" href="<?php echo e(route("admin.product-model.create")); ?>">
                Add Model
            </a>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ProductModel">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        ID
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Model
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Created By
                    </th>
                    <th>
                        Created At
                    </th>
                    <th>
                        
                        Action
                    </th>
                </tr>
            </thead>
        </table>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    $(function () {
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
      url: "<?php echo e(route('admin.product-model')); ?>",
      data: {
        'title': searchParams.get('title'),
        'model_no': searchParams.get('model_no'),
        'created_by': searchParams.get('created_by')
      }
    },
    columns: [
    { data: 'placeholder', name: 'placeholder' },
     { data: 'id', name: 'id' },
{
    data: 'title',
    name: 'title',
},
{
    data: 'model_no',
    name: 'model_no',
},
{
    data: 'status',
    name: 'status',
},
{ data: 'image', name: 'image' },
{ data: 'name', name: 'name' },
{ data: 'created_at', name: 'created_at' },
{ data: 'actions', name: '<?php echo e(trans('global.actions')); ?>' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  };
$(".datatable-ProductModel").one("preInit.dt", function () {
 //$(".dataTables_filter").after(filters);
});
  $('.datatable-ProductModel').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service-sangam\resources\views/dealer/product_model/index.blade.php ENDPATH**/ ?>