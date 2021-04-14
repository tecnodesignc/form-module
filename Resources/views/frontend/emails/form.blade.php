<tr>
  <td style="font-size:16px; font-family:'Arial',Helvetica,sans-serif, sans-serif; color:#999;">
    <p style="line-height:150%;"><span
              style="font-size:18px;"><span
                style="color:#33c0c9;"><strong>{{ $form->title }}</strong></span></span>
    </p>
    @foreach($data->values as $index => $field)
      <p style="line-height:150%;"><span
                style="line-height: 150%; font-weight: bold; background-color: transparent;">{{ $index }}:</span> {{ $field }} </p>
    @endforeach
    </p>

  </td>
</tr>
