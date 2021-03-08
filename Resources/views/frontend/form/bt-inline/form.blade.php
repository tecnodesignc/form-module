@php
    $id=Str::slug($form->title).rand(1,999);
@endphp

<div class="content-form{{$id}}">
    <div class="formerror"></div>
    <form id="{{$id}}" class="form-inline" action="{{url('/form/lead')}}">

        <input type="hidden" name="form_id" value="{{$form->id}}" required="">

        @include('form::frontend.form.bt-inline.fields')

        @if(Setting::get('form::captcha')=="1")
            <div class="col-sm-offset-2 col-sm-10">
                {!!app('captcha')->display($attributes = ['data-sitekey'=>Setting::get('form::api')])!!}
                </br>
                </br>
            </div>

        @endif

        <button type="submit" class="btn btn-primary">{{trans('form::form.form.submit')}}</button>
    </form>

</div>
@include('form::frontend.form.mainlayout')
