@extends('layouts.admin')
@section('content')
    @can('product_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.products.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.product.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.product.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Product">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.product.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.current_stock') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.product_category') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.fav') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.most_recent') }}
                        </th>
                        <th>
                            &nbsp;
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
        function update_statuses(el, column_name) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('admin.products.update_statuses') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status,
                column_name: column_name
            }, function(data) {
                if (data == 1) {
                    showAlert('success', 'Success', '');
                } else {
                    showAlert('danger', 'Something went wrong', '');
                }
            });
        }
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('product_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.products.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).data(), function(entry) {
                            return entry.id
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.products.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'current_stock',
                        name: 'current_stock'
                    }, 
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        sortable: false,
                        searchable: false
                    }, 
                    {
                        data: 'product_category_name',
                        name: 'product_category.name'
                    },
                    {
                        data: 'user_name',
                        name: 'user.name'
                    }, 
                    {
                        data: 'fav',
                        name: 'fav'
                    },
                    {
                        data: 'most_recent',
                        name: 'most_recent'
                    }, 

                    {
                        data: 'actions',
                        name: '{{ trans('global.actions') }}'
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 10,
            };
            let table = $('.datatable-Product').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
