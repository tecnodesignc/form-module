<div class="box-body">
    <div class='form-group{{ $errors->has("{$lang}.label") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[label]", trans('form::fields.form.label')) !!}
        {!! Form::text("{$lang}[label]", old("{$lang}.label"), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('form::fields.form.label')]) !!}
        {!! $errors->first("{$lang}.label", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("{$lang}.placeholder") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[placeholder]", trans('form::fields.form.placeholder')) !!}
        {!! Form::text("{$lang}[placeholder]", old("{$lang}.placeholder"), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('form::fields.form.placeholder')]) !!}
        {!! $errors->first("{$lang}.placeholder", '<span class="help-block">:message</span>') !!}
    </div>

    <div class='form-group{{ $errors->has("{$lang}.description") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[description]", trans('form::fields.form.description')) !!}
        {!! Form::textarea("{$lang}[description]", old("{$lang}.description"), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('form::fields.form.description')]) !!}
        {!! $errors->first("{$lang}.description", '<span class="help-block">:message</span>') !!}
    </div>

</div>
