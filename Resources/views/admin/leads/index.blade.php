@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('form::leads.title.leads') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('form::leads.title.leads') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                {{-- <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                     <a href="{{ route('admin.form.lead.create') }}" class="btn btn-primary btn-flat"
                        style="padding: 4px 10px;">
                         <i class="fa fa-pencil"></i> {{ trans('form::leads.button.create lead') }}
                     </a>
                 </div>--}}
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
                                <th> Id</th>
                                @if(count($form->fields))
                                    @foreach($form->fields as $fiel)
                                      <th>{{$fiel->label}}</th>
                                    @endforeach
                                @endif
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($leads))
                                @foreach ($leads as $lead)
                                    <tr>
                                        <td>
                                            {{$lead->id}}
                                        </td>

                                        @if(count($lead->values))
                                            @foreach($lead->values as $fiel)
                                                <td>{{$fiel}}</td>
                                                @endforeach
                                           @endif
                                        <td>
                                            {{ $lead->created_at }}
                                        </td>
                                        <td></td>
                                        {{-- <td>
                                             <div class="btn-group">
                                                 <a href="{{ route('admin.form.lead.edit', [$lead->id]) }}"
                                                    class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                                 <button class="btn btn-danger btn-flat" data-toggle="modal"
                                                         data-target="#modal-delete-confirmation"
                                                         data-action-target="{{ route('admin.form.lead.destroy', [$lead->id]) }}">
                                                     <i class="fa fa-trash"></i></button>
                                             </div>
                                         </td>--}}
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                            <tr>
                                <th> Id</th>
                                @if(count($form->fields))
                                    @foreach($form->fields as $fiel)
                                        <th>{{$fiel->label}}</th>
                                    @endforeach
                                @endif
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
        <dd>{{ trans('form::leads.title.create lead') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: []
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
