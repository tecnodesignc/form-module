@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('form::fields.title.create field') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.form.form.edit', [$form->id])}}">{{ trans('form::forms.title.forms') }}</a></li>
        <li class="active">{{ trans('form::fields.title.create field') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.form.field.store',$form->id], 'method' => 'post']) !!}
    <input type="hidden" name="form_id" value="{{$form->id}}">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                        <div class="nav-tabs-custom">
                            @include('partials.form-tab-headers')
                            <div class="tab-content">
                                <?php $i = 0; ?>
                                @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                    <?php $i++; ?>
                                    <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                        @include('form::admin.fields.partials.create-fields', ['lang' => $locale])
                                    </div>
                                @endforeach

                                <div class="box-footer">
                                    <button type="submit"
                                            class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                                    <a class="btn btn-danger pull-right btn-flat"
                                       href="{{ route('admin.form.field.index',$form->id)}}"><i
                                                class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                                </div>
                            </div>
                        </div> {{-- end nav-tabs-custom --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="row">
                <div class="col-xs-12 ">
                    <div class="box box-primary">
                        <div class="box-header">
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <div class="form-group">
                                <label>{{trans('form::fields.form.Non translatable fields')}}</label>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class='form-group{{ $errors->has("type") ? ' has-error' : '' }}'>
                                {!! Form::label("type", trans('form::fields.form.type')) !!}
                                <select class="form-control" name="type" id="type">
                                    @foreach ($types as $type)
                                        <option
                                                value="{{$type['value']}}" {{ old('type') == $type['value'] ? 'selected' : '' }}> {{$type['name']}}
                                        </option>
                                    @endforeach
                                </select>
                                 {!! $errors->first("type", '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class='form-group{{ $errors->has("name") ? ' has-error' : '' }}'>
                                {!! Form::label("name", trans('form::fields.form.name')) !!}
                                {!! Form::text("name", old("name"), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('form::fields.form.name')]) !!}
                                {!! $errors->first("name", '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="checkbox">
                                <label for="active">
                                    <input id="active"
                                           name="active"
                                           type="checkbox"
                                           class="flat-blue"
                                           {{ (is_null(old('required'))) ?: 'checked' }}
                                           value="1" />
                                    {{ trans('form::fields.form.required') }}
                                </label>
                            </div>
                            <div class='form-group{{ $errors->has("order") ? ' has-error' : '' }}'>
                                {!! Form::label("order", trans('form::fields.form.order')) !!}
                                {!! Form::number("order", old("order"), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('form::fields.form.order')]) !!}
                                {!! $errors->first("order", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'b', route: "<?= route('admin.form.field.index', $form->id) ?>"}
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush
