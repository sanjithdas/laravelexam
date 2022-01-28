@include('admin.navigation')
<x-admin-layout>

    <div id="right-panel" class="left-panel">
        @include('admin.header')
        <!-- Header-->

        @can('batch_create')
            <div style="margin-bottom: 10px;" class="">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route("admin.batches.create") }}">
                        {{ trans('global.add') }} {{ trans('titles.batch.title_singular') }}
                    </a>
                </div>
            </div>
        @endcan


        <div class="card">
            <div class="card-header">
                {{ trans('titles.batch.title_singular') }} {{ trans('global.list') }}
            </div>
        
            <div class="card-body">
                <div class="table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-bordered table-striped table-hover datatable datatable-Batch">
                        <thead>
                            <tr>
                                <th width="10">
        
                                </th>
                                <th>
                                    {{ trans('titles.batch.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('titles.batch.fields.name') }}
                                </th>
                                <th>
                                     Visibility
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($batches as $key => $batch)
                                <tr data-entry-id="{{ $batch->id }}">
                                    <td>
        
                                    </td>
                                    <td>
                                        {{ $batch->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $batch->batch_label ?? '' }}
                                    </td>
                                    <td>
                                        {{ $batch->display_status ==0 ? "Not visible" : "Visible" ?? ''  }}
                                    </td>
                                    <td nowrap>
                                        @can('batch_show')
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.batches.show', $batch->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
        
                                        @can('batch_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.batches.edit', $batch->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
        
                                        @can('batch_delete')
                                            <form action="{{ route('admin.batches.destroy', $batch->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                            </form>
                                        @endcan
        
                                    </td>
        
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            </div>
            <script>
                // jQuery(document).ready(function () {
                //     jQuery('#bootstrap-data-table-export').DataTable();
                // });
            jQuery(function () {
        
            let dtButtons = jQuery.extend(true, [], jQuery.fn.dataTable.defaults.buttons)
            @can('category_delete')
        
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.batches.massDestroy') }}",
                    className: 'btn-danger',
                    action: function (e, dt, node, config) {
        
                    var ids = jQuery.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return jQuery(entry).data('entry-id')
                    });

                    alert(ids);
        
                    if (ids.length === 0) {
        
                        alert('{{ trans('global.datatables.zero_selected') }}')
        
                        return
                    }
        
                    if (confirm('{{ trans('global.areYouSure') }}')) {
        
                        jQuery.ajax({
                        headers: {'x-csrf-token':  jQuery('meta[name="csrf-token"]').attr('content')},
                        method: 'POST',
                        url: config.url,
                        data: { ids: ids, _method: 'DELETE' }})
                        .done(function (result) {
        
                            location.reload()
                        })
                    }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan
        
                jQuery.extend(true, jQuery.fn.dataTable.defaults, {
                    order: [[ 1, 'desc' ]],
                    pageLength: 100,
                });
                jQuery('.datatable-Batch:not(.ajaxTable)').DataTable({ buttons: dtButtons })
                jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                    jQuery(jQuery.fn.dataTable.tables(true)).DataTable()
                            .columns.adjust();
                    });
                })
        
            </script>
</x-admin-layout>
