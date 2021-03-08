@php
    $id=Str::slug($form->title).$options['rand'];;
@endphp

<div class="content-form{{$options['rand']}}">
    <div class="formerror"></div>
    <form id="{{$id}}" class="form-horizontal" action="{{url('/form/lead')}}">
        <input type="hidden" name="form_id" value="{{$form->id}}" required="">

        @include('form::frontend.form.bt-nolabel.fields')

        @if(Setting::get('form::captcha')=="1")
            <div class="col-sm-offset-2 col-sm-10">
                {!!app('captcha')->display($attributes = ['data-sitekey'=>Setting::get('form::api')])!!}
                </br>
            </div>
        @endif
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">{{trans('form::form.form.submit')}}</button>
            </div>
        </div>
    </form>

</div>

@include('form::frontend.form.mainlayout')
