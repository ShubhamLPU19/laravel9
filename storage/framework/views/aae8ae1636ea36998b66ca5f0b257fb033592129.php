<?php $__env->startSection('content'); ?>

<?php if(session('status')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
<div class="card">
    <div class="card-header">
        Dealers
    </div>
    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-DealerCategory">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Percentage
                    </th>
                    <th>
                        Status
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
      url: "<?php echo e(route('admin.dealer-profile')); ?>",
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
    data: 'name',
    name: 'name',
},
{
    data: 'email',
    name: 'email',
},
{
    data: 'phone',
    name: 'status',
},
{ data: 'created_name', name: 'created_name' },
{ data: 'created_at', name: 'created_at' },
{ data: 'actions', name: '<?php echo e(trans('global.actions')); ?>' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  };
$(".datatable-DealerCategory").one("preInit.dt", function () {
 //$(".dataTables_filter").after(filters);
});
  $('.datatable-DealerCategory').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\service-sangam\resources\views/dealer/dealer_profile/index.blade.php ENDPATH**/ ?>