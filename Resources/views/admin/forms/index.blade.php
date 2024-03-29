@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('form::forms.title.forms') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('form::forms.title.forms') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.form.form.create') }}" class="btn btn-primary btn-flat"
                       style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('form::forms.button.create form') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('form::forms.table.id') }}</th>
                                <th>{{ trans('form::forms.table.title') }}</th>
                                <th>{{ trans('form::forms.table.name') }}</th>
                                <th>{{ trans('form::forms.table.status') }}</th>
                                <th >{{ trans('form::forms.table.field count') }}</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($forms))
                                @foreach ($forms as $form)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.form.form.edit', [$form->id]) }}">
                                                {{ $form->id }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.form.form.edit', [$form->id]) }}">
                                                {{ $form->title }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.form.form.edit', [$form->id]) }}">
                                                {{ $form->system_name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.form.form.edit', [$form->id]) }}">
                                                {{ $form->active?'Active':'Inactive' }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.form.lead.index', [$form->id]) }}">
                                                {{ $form->leads->count() }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.form.form.edit', [$form->id]) }}">
                                                {{ $form->created_at }}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.form.form.edit', [$form->id]) }}"
                                                   class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('admin.form.lead.index', [$form->id]) }}"
                                                   class="btn btn-default btn-flat"><i class="fa fa-list-alt"></i></a>
                                                <button class="btn btn-danger btn-flat" data-toggle="modal"
                                                        data-target="#modal-delete-confirmation"
                                                        data-action-target="{{ route('admin.form.form.destroy', [$form->id]) }}">
                                                    <i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ trans('form::forms.table.id') }}</th>
                                <th>{{ trans('form::forms.table.title') }}</th>
                                <th>{{ trans('form::forms.table.name') }}</th>
                                <th>{{ trans('form::forms.table.status') }}</th>
                                <th>{{ trans('form::forms.table.field count') }}</th>
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
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('form::forms.title.create form') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'c', route: "<?= route('admin.form.form.create') ?>"}
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
                "order": [[0, "desc"]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
