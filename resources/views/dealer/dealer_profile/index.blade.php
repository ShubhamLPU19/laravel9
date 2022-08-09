@extends('layouts.admin')
@section('content')

@if(session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
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
                        {{-- &nbsp; --}}
                        Action
                    </th>
                </tr>
            </thead>
        </table>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
   let dtButtons = []
@can('ticket_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tickets.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
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
@endcan
  let searchParams = new URLSearchParams(window.location.search)
  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: {
      url: "{{ route('admin.dealer-profile') }}",
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
{ data: 'actions', name: '{{ trans('global.actions') }}' }
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
@endsection
