@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('form::forms.title.edit form') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.form.form.index') }}">{{ trans('form::forms.title.forms') }}</a></li>
        <li class="active">{{ trans('form::forms.title.edit form') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.form.field.create',['form'=>$form->id]) }}"
                       class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('form::fields.button.create field') }}
                    </a>
                </div>
            </div>
             @include('form::admin.fields.index', ['fields'=>$form->fields()->orderBy('order','asc')->get()])

        </div>
        <div class="col-md-6">
            {!! Form::open(['route' => ['admin.form.form.update', $form->id], 'method' => 'put']) !!}
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="nav-tabs-custom">
                            @include('partials.form-tab-headers')
                            <div class="tab-content">
                                <?php $i = 0; ?>
                                @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                    <?php $i++; ?>
                                    <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                        @include('form::admin.forms.partials.edit-fields', ['lang' => $locale])
                                    </div>
                                @endforeach
                            </div>
                        </div> {{-- end nav-tabs-custom --}}
                    </div>
                </div>
                <div class="col-xs-12 ">
                    <div class="box box-primary">
                        <div class="box-header">
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <div class="form-group">
                                <label>{{trans('form::forms.form.Non translatable fields')}}</label>
                            </div>
                        </div>
                        <div class="box-body ">
                            <div class='form-group{{ $errors->has('system_name') ? ' has-error' : '' }}'>
                                {!! Form::label('system_name', trans('form::forms.form.system name')) !!}
                                @php $old = $form->system_name?? '' @endphp
                                {!! Form::text('system_name', old('system_name',$old), ['class' => 'form-control', 'placeholder' => trans('form::forms.form.system name')]) !!}
                                {!! $errors->first('System Name', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="checkbox">
                                <label for="active">
                                    <input id="active"
                                           name="active"
                                           type="checkbox"
                                           class="flat-blue"
                                           {{ (empty(old('active', $form->active))) ?: 'checked' }}
                                           value="1" />
                                    {{ trans('form::forms.form.active') }}
                                </label>
                            </div>
                            <div class='form-group{{ $errors->has('destination_email') ? ' has-error' : '' }}'>
                                {!! Form::label('destination_email', trans('form::forms.form.destination email')) !!}
                                @php $old = $form->destination_email?? '' @endphp
                                {!! Form::text('destination_email', old('destination_email',$old), ['class' => 'form-control', 'placeholder' => trans('form::forms.form.destination email')]) !!}
                                {!! $errors->first('destination_email', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class='form-group{{ $errors->has('user_id') ? ' has-error' : '' }}'>
                                {!! Form::label('user_id', trans('form::forms.form.designation user')) !!}
                                <select name="user_id" id="user" class="form-control">
                                    @php $old = $form->user_id?? '' @endphp
                                    @foreach ($users as $user)
                                        <option
                                                value="{{$user->id }}" {{$user->id == old('user_id',$old) ? 'selected' : ''}}>{{$user->present()->fullname()}}
                                            - ({{$user->email}})
                                        </option>
                                    @endforeach
                                </select>
                                <br>
                                {!! $errors->first('user_id', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="box-header">
                            <div class="form-group">
                                <label>{{trans('form::forms.form.send response emails')}}</label>
                            </div>
                        </div>
                        <div class="box-body ">
                            <div class="checkbox">
                                <label for="send_confirmation">
                                    <input id="send_confirmation"
                                           name="send_confirmation"
                                           type="checkbox"
                                           class="flat-blue"
                                           {{ (empty(old('active', $form->send_confirmation))) ?: 'checked' }}
                                           value="1" />
                                    {{ trans('form::forms.form.send confirmation') }}
                                </label>
                            </div>
                            <div class='form-group{{ $errors->has('subject') ? ' has-error' : '' }}'>
                                {!! Form::label('subject', trans('form::forms.form.subject')) !!}
                                @php $old = $form->subject?? '' @endphp
                                {!! Form::text('subject', old('subject',$old), ['class' => 'form-control', 'placeholder' => trans('form::forms.form.subject')]) !!}
                                {!! $errors->first('subject', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class='form-group{{ $errors->has("template") ? ' has-error' : '' }}'>
                                {!! Form::label("template", trans('form::forms.form.template')) !!}
                                @php $old = $form->template?? '' @endphp
                                {!! Form::select("template", $all_templates_form, old("template",$old), ['class' => "form-control", 'placeholder' => trans('form::forms.form.default')]) !!}
                                {!! $errors->first("template", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit"
                                    class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                            <button class="btn btn-default btn-flat" name="button"
                                    type="reset">{{ trans('core::core.button.reset') }}</button>
                            <a class="btn btn-danger pull-right btn-flat"
                               href="{{ URL::route('admin.form.form.index')}}"><i
                                        class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

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
                    {key: 'b', route: "<?= route('admin.form.form.index') ?>"}
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
