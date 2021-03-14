$(document).ready(function() { 

    $('#check-user').hide();  8   
    let usernameError = true; 
    $('#username').keyup(function () { 
        validateUsername(); 
    }); 
      
    function validateUsername() { 
      let usernameValue = $('#username').val(); 
      if (usernameValue.length == 0) { 
      $('#check-user').show(); 
          usernameError = false; 
          return false; 
      }  
      else if((usernameValue.length < 4)) { 
          $('#check-user').show(); 
          $('#check-user').html("*Enter atleast 4 characters"); 
          usernameError = false; 
          return false; 
      }  
      else { 
          $('#check-user').hide(); 
      } 
    } 

    $('#check-email').hide();     
    let emailError = true; 
    $('#email').keyup(function () { 
        validateEmail(); 
    }); 
      
    function validateEmail() { 
      let emailValue = $('#email').val(); 
      let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
      if (regex.test(emailValue)) { 
      $('#check-email').hide(); 
          emailError = false; 
          return false; 
      }  
      else { 
          $('#check-email').show(); 
          $('#check-email').html("*Enter a valid email."); 
          emailError = true; 
          return false; 
      }  
    }

    $('#check-pass').hide();     
    let passwordError = true; 
    $('#password').keyup(function () { 
        validatePassword(); 
    }); 
      
    function validatePassword() { 
      let passwordValue = $('#password').val(); 
      if (passwordValue.length == 0) { 
      $('#check-pass').show(); 
          passworderror = false; 
          return false; 
      }  
      else if((passwordValue.length < 8)) { 
          $('#check-pass').show(); 
          $('#check-pass').html("*Enter atleast 8 characters"); 
          passworderror = false; 
          return false; 
      }  
      else { 
          $('#check-pass').hide(); 
      } 
    } 

    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });

    $('#submitbtn').click(function (event) { 
        event.preventDefault();
        validateUsername(); 
        validatePassword(); 
        validateEmail(); 
        var formData = $('#register-form').serialize();
        $.ajax ({
            url: 'register-action.php',
            method: 'post',
            data: formData + '&action=register'
        }).done(function(result){
            console.log(result);
            var data = JSON.parse(result);
            $('.alert').show();
            if(data.status == 0) {
                $('#result').html(data.msg);
            }
            else{
                $('.alert').hide();
                window.location = "userProfile.html";
            }
            
        })
    }); 
});

