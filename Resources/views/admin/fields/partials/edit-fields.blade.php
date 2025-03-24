<div class="box-body">
    <div class='form-group{{ $errors->has("{$lang}.label") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[label]", trans('form::fields.form.label')) !!}
        @php $old = $field->hasTranslation($lang) ? $field->translate($lang)->label : '' @endphp
        {!! Form::text("{$lang}[label]", old("{$lang}.label",$old), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('form::fields.form.label')]) !!}
        {!! $errors->first("{$lang}.label", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("{$lang}.placeholder") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[placeholder]", trans('form::fields.form.placeholder')) !!}
        @php $old = $field->hasTranslation($lang) ? $field->translate($lang)->placeholder : '' @endphp
        {!! Form::text("{$lang}[placeholder]", old("{$lang}.placeholder",$old), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('form::fields.form.placeholder')]) !!}
        {!! $errors->first("{$lang}.placeholder", '<span class="help-block">:message</span>') !!}
    </div>

    <div class='form-group{{ $errors->has("{$lang}.description") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[description]", trans('form::fields.form.description')) !!}
        @php $old = $field->hasTranslation($lang) ? $field->translate($lang)->description : '' @endphp
        {!! Form::textarea("{$lang}[description]", old("{$lang}.description",$old), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('form::fields.form.description')]) !!}
        {!! $errors->first("{$lang}.description", '<span class="help-block">:message</span>') !!}
    </div>

</div>
