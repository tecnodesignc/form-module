@section('scripts')
  @parent
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <style>
    #loading-form {
      display: none;
      position: absolute;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: 1000000;
      width: 100%;
      height: 100%;
    }

    .lds-spinner {
      color: #fff;
      display: block;
      position: relative;
      width: 64px;
      height: 64px;
      margin: auto;
      background: #fff;
      top: 50%;
    }
  </style>
  <script>
      window.jQuery = window.$ = jQuery;
      (function ($) {
      $(document).ready(function () {
          var formid = '#{{$id}}';
          $(formid).submit(function (event) {
              event.preventDefault();
              var info = objectifyForm($(this).serializeArray());

              info.captcha = {'version': '2', 'token': info['g-recaptcha-response']};
              delete info['g-recaptcha-response'];
              $.ajax({
                  type: 'POST',
                  url: $(this).attr('action'),
                  dataType: 'json',
                  data: {attributes: info},
                  beforeSend: function (data) {
                      $('#loading-form').css('display', 'block');
                  },
                  success: function (data) {
                      $('#loading-form').css('display', 'none');
                      $(".content-form{{$id}}").html('<p class="alert bg-primary" role="alert" style=" padding:10px; border-radius: 10px; color: #fff"><span>' + data.data + '</span> </p>');

                  },
                  error: function (data) {
                      $('#loading-form').css('display', 'none');
                      $(".content-form{{$id}} .formerror").append('<p class="alert alert-danger" role="alert"  style="padding:10px; border-radius: 10px;"><span>' + data.responseJSON.errors + '</span> </p>');
                  }
              })
          })
      });

      function objectifyForm(formArray) {//serialize data function

          var returnArray = {};
          for (var i = 0; i < formArray.length; i++) {
              returnArray[formArray[i]['name']] = formArray[i]['value'];
          }
          return returnArray;
      }
      })(jQuery);

  </script>

  @parent
@endsection
