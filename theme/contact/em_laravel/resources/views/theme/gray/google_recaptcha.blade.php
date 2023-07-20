@if($form->google_re_captcha_site_key != "")
    <script src="https://www.google.com/recaptcha/api.js?render={{ $form->google_re_captcha_site_key }}"></script>
    <script>
       $ ( '.js_send_btn' ).on ( 'click', function(e) {
      e.preventDefault ();
      e.stopImmediatePropagation ();
      grecaptcha.ready ( function() {
        grecaptcha.execute ( '{{ $form->google_re_captcha_site_key }}', {
          action: 'easy_mail_send'
        } ).then ( function( token ) {
          var token_input = document.getElementById('g-recaptcha-token');
          token_input.value = token;
          document.querySelector('.js_main_form').submit();
        } );
      }, false );
    } );
    </script>
    @isset($form->google_re_captcha_bottom_px)
        <style>
            .grecaptcha-badge {
                margin-bottom: {{ $form->google_re_captcha_bottom_px }}px;
            }
        </style>
    @endisset
@endif