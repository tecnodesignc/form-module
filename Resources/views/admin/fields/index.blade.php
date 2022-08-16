
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <label>{{ trans('form::fields.title.fields')}}</label>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('form::fields.table.label') }}</th>
                                <th>{{ trans('form::fields.table.name') }}</th>
                                <th>{{ trans('form::fields.table.type') }}</th>
                                <th>{{ trans('form::fields.table.order') }}</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($fields))
                            @foreach ($fields as $field)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.form.field.edit', [$form->id,$field->id]) }}">
                                        {{ $field->label}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.form.field.edit', [$form->id,$field->id]) }}">
                                        {{ $field->name}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.form.field.edit', [$form->id,$field->id]) }}">
                                        {{ $field->type}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.form.field.edit', [$form->id,$field->id]) }}">
                                        {{ $field->order}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.form.field.edit', [$form->id,$field->id]) }}">
                                        {{ $field->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.form.field.edit', [$form->id,$field->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.form.field.destroy', [$form->id,$field->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ trans('form::fields.table.label') }}</th>
                                <th>{{ trans('form::fields.table.name') }}</th>
                                <th>{{ trans('form::fields.table.type') }}</th>
                                <th>{{ trans('form::fields.table.order') }}</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th>{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.form.field.create',$form->id) ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
