<div class="box-body">
    <div class='form-group{{ $errors->has("{$lang}.title") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[title]", trans('form::forms.form.title')) !!}
       @php $old = $form->hasTranslation($lang) ? $form->translate($lang)->title : '' @endphp
        {!! Form::text("{$lang}[title]", old("{$lang}.title",$old), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('form::forms.form.title')]) !!}
        {!! $errors->first("{$lang}.title", '<span class="help-block">:message</span>') !!}
    </div>

</div>
