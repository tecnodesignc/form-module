@php
$form=$lead['form'];
$data=$lead['lead'];
@endphp



  <div id="contend-mail" class="p-3">
    <h1>{{ $form->title }}</h1>
    <br>
    <div style="margin-bottom: 5px">
      @foreach($data->values as $index => $field)
        <p class="px-3"><strong>{{ $index }}:</strong> {{ $field }} </p>
      @endforeach
    </div>
  </div>
