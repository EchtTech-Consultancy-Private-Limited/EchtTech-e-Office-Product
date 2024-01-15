<script>
    function handlePasteOTP(e) {
    var clipboardData = e.clipboardData || window.clipboardData || e.originalEvent.clipboardData;
    var pastedData = clipboardData.getData('Text');
    var arrayOfText = pastedData.toString().split('');
    /* for number only */
    if (isNaN(parseInt(pastedData, 10))) {
        e.preventDefault();
        return;
    }
    for (var i = 0; i < arrayOfText.length; i++) {
        if (i >= 0) {
            document.getElementById('otp-number-input-' + (i + 1)).value = arrayOfText[i];
        } else {
            return;
        }
    }
    e.preventDefault();
  }

$(document).ready(function() {
    $('.otp-event').each(function() {
        var $input = $(this).find('.otp-number-input');
        var $submit = $(this).find('.otp-submit');
        $input.keydown(function(ev) {
            otp_val = $(this).val();
            if (ev.keyCode == 37) {
                $(this).prev().focus();
                ev.preventDefault();
            } else if (ev.keyCode == 39) {
                $(this).next().focus();
                ev.preventDefault();
            } else if (otp_val.length == 1 && ev.keyCode != 8 && ev.keyCode != 46) {
                otp_next_number = $(this).next();
                if (otp_next_number.length == 1 && otp_next_number.val().length == 0) {
                    otp_next_number.focus();
                }
            } else if (otp_val.length == 0 && ev.keyCode == 8) {
                $(this).prev().val("");
                $(this).prev().focus();
            } else if (otp_val.length == 1 && ev.keyCode == 8) {
                $(this).val("");
            } else if (otp_val.length == 0 && ev.keyCode == 46) {
                next_input = $(this).next();
                next_input.val("");
                while (next_input.next().length > 0) {
                    next_input.val(next_input.next().val());
                    next_input = next_input.next();
                    if (next_input.next().length == 0) {
                        next_input.val("");
                        break;
                    }
                }
            }

        }).focus(function() {
            $(this).select();
            var otp_val = $(this).prev().val();
            if (otp_val === "") {
                $(this).prev().focus();
            } else if ($(this).next().val()) {
                $(this).next().focus();
            }
        }).keyup(function(ev) {
            otpCodeTemp = "";
            $input.each(function(i) {
                if ($(this).val().length != 0) {
                    $(this).addClass('otp-filled-active');
                } else {
                    $(this).removeClass('otp-filled-active');
                }
                otpCodeTemp += $(this).val();
            });
            if ($(this).val().length == 1 && ev.keyCode != 37 && ev.keyCode != 39) {
                $(this).next().focus();
                ev.preventDefault();
            }
            $input.each(function(i) {
                if ($(this).val() != '') {
                    $submit.prop('disabled', false);
                } else {
                    $submit.prop('disabled', true);
                }
            });

        });
        $input.on("paste", function(e) {
            window.handlePasteOTP(e);
        });
    });

});
// Login With OTP
$('#candidate_login_form').on('keypress', function(e) {
    return e.which !== 13;
});

$(document).on('click', '#login_with_otp', function() {
    let login_with_otp = $('#login_with_otp').val();
    const formData = new FormData(candidate_login_form);
    $('#login_username').text('');
    $('#login_username_captcha').text('');
    if(formData.get('username') == ""){
        $('#login_username').text('Please enter a user name');
    }else{
        $("#pageloader").fadeIn();
        // $("#login_with_otp").attr("disabled", true);
        // $('#login_username').text('Please Wait...');
        const data = {
        "_token": "{{ csrf_token() }}",
        userName: formData.get('username'),
        captcha: formData.get('captcha'),
        login_with_otp: login_with_otp,
        };
        $.ajax({
        type: "POST",
        url: "{{ route('auth.login') }}",
        data: data,
        success: function(response) {
          $("#pageloader").fadeOut();
            $("#login_with_otp").attr("disabled", false);
            if (response == 402) {
              $(".reload").click();
              $(".captcha").val('');
              $('#login_username').text('Invalid Username Number')
            } else {
            document.getElementById("login_user_name").style.display = "none";
            document.getElementById("otp").style.display = "block";
            const mobileNum = response.userDetail.mobile_number;
            const userEmail = response.userDetail.email;
            const lastTwoDigit = String(mobileNum).slice(-3);
            const lastFourDigit = userEmail.substring(userEmail.indexOf('@') - 4, userEmail.indexOf('@'));
            const numTest = '+91********' + lastTwoDigit;
            const emailText = '' + lastFourDigit + '......@gmail.com';
            $('#hidden_mobile_num').text(numTest);
            $('#hidden_email_num').text(emailText);
            $('#email').val(response.userDetail.email);
            $('#mob_number').val(response.userDetail.mobile_number);
            $('#user_role').val(response.userDetail.userRole);
            $('#otp_type').val(response.userDetail.otp_type);
            // check OTP Expiration
            let timerOn = true;
            function timer(remaining) {
                var m = Math.floor(remaining / 60);
                var s = remaining % 60;
                m = m < 10 ? '0' + m : m;
                s = s < 10 ? '0' + s : s;
                document.getElementById('timer').innerHTML = m + ':' + s;
                remaining -= 1;

                if (remaining >= 0 && timerOn) {
                setTimeout(function() {
                    timer(remaining);
                }, 1000);
                return;
                }

                if (!timerOn) {
                // Do validate stuff here
                return;
                }
                $('.resend_sms').removeClass('disabled');
                $(".otp_timer_expired").text("OTP expired !");
            }
            timer(120);
            }
        },error: function(xhr, status, error) {
            $("#pageloader").fadeOut();
            $(".reload").click();
            $(".captcha").val('');
            $('#login_username_captcha').text(xhr.responseJSON.message);
          }
        });
    }
  });
// End Login With OTP

// Verify OTP
jQuery(document).on('click', ".verify_otp_btn", function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var verify_otp_1 = $("#otp-number-input-1").val();
    var verify_otp_2 = $("#otp-number-input-2").val();
    var verify_otp_3 = $("#otp-number-input-3").val();
    var verify_otp_4 = $("#otp-number-input-4").val();
    $("#resend").text('');
    if (verify_otp_1 == "" || verify_otp_2 == "" || verify_otp_3 == "" || verify_otp_4 == "") {
      $(".verify_otp_error").text("Please enter your verification code.");
    } else {
      var data = new FormData(verify_otp);
      $.ajax({
        type: "POST",
        url: "{{ route('auth.verify-otp') }}",
        data: data,
        processData: false,
        contentType: false,
        success: function(response) {
          if (response.status == 1) {
            // window.location.href = response.redirectUrl
            document.getElementById("otp").style.display = "none";
            document.getElementById("user_password").style.display = "block";
            $('#password_email').val(response.userDetail.email);
            $('#password_mob_number').val(response.userDetail.mobile_number);
            $('#password_user_role').val(response.userDetail.userRole);
          } else if (response.status == 0) {
            $(".verify_otp_error").text("Please enter valid verification code.");
          } else if (response.status == 2) {
            $(".verify_otp_error").text("Your OTP Expired !");
          }
        }
      });
    }

  });

  // End Verify OTP

//  Use password Login
$('#login_with_pass').on('keypress', function(e) {
    return e.which !== 13;
});
jQuery(document).on('click', ".verify_password_btn", function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    const formData = new FormData(login_with_pass);
    $('#login_password_captcha').text('');
    $(".password_error").text('');
    if(formData.get('password') == ""){
        $('.password_error').text('Please enter your Password');
    } else {
        // $(".verify_password_btn").attr("disabled", true);
        $.ajax({
        type: "POST",
        url: "{{ route('auth.login-password-user') }}",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            $(".verify_password_btn").attr("disabled", false);
            if (response.status == 200) {
              Swal.fire({
                text: "You have successfully logged in!",
                icon: "success",
                buttonsStyling: !1,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
              }),
                window.location.href = response.redirectUrl
            }else if (response.status == 201) {
              $(".reload").click();
              $(".captcha").val('');
              $(".password_error").text("Password Invalid !");
            }
        },error: function(xhr, status, error) {
            $(".reload").click();
            $(".captcha").val('');
            $('#login_password_captcha').text(xhr.responseJSON.message);
          }
      });
    }

  });
  // End Use password Login
  // resend OTP
  jQuery(document).on('click', ".resend_sms", function() {
    let email = $('#email').val();
    let mobile_number = $('#mob_number').val();
    let otp_type = $('#otp_type').val();
    $('.resend_sms').addClass('disabled');
    jQuery.ajax({
      type: 'post',
      url: '{{ route("auth.resend-otp") }}',
      data: {
        "_token": "{{ csrf_token() }}",
        "action": "resend_sms",
        'email': email,
        'mobile_number': mobile_number,
        'otp_type': otp_type
      },
      success: function(response) {
        // console.log("response", response)
        $('#resend').text(response);
        $('.verify_otp_error').text('');
        $('.otp_resend_expired').text('');
        $('#timer').css("display", "none");
        $(".otp_timer_expired").css("display", "none");

        // check OTP Expiration
        let timerOn = true;
        // set Expiration time in second(120)
        let expireTime = 120;

        function timer(remaining) {
          var m = Math.floor(remaining / 60);
          var s = remaining % 60;

          m = m < 10 ? '0' + m : m;
          s = s < 10 ? '0' + s : s;
          document.getElementById('resend_timer').innerHTML = m + ':' + s;
          remaining -= 1;

          if (remaining >= 0 && timerOn) {
            setTimeout(function() {
              timer(remaining);
            }, 1000);
            return;
          }

          if (!timerOn) {
            // Do validate stuff here
            return;
          }
          $('.resend_sms').removeClass('disabled');
          $(".otp_resend_expired").text("OTP expired !");
        }
        timer(expireTime);
      }
    });
  });
//   End Resend OTP

// Forgot password section
jQuery(document).on('click', "#login_forgot_password", function() {
    document.getElementById("otp").style.display = "none";
    document.getElementById("user_password").style.display = "none";
    document.getElementById("login_user_name").style.display = "none";
});


// reset password validation
jQuery('#reset_password_form').validate({
        rules: {
        password: {
            required: true,
            minlength: 8
        },
        password_confirm: {
            required: true,
            minlength: 8,
            equalTo: "#candidate_password_2"
        },
        captcha:{
          required:true
        },
    }
});
// relode captcha new captcha
$('.reload').click(function () {
        $.ajax({
            type: 'GET',
            url: '{{ route("reloadCaptcha") }}',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
