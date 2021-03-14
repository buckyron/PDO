$(document).ready(function() { 

    let userMail;
    $(window).load(function() { 
        //insert all your ajax callback code here. 
        //Which will run only after page is fully loaded in background.
        let params = new URLSearchParams(window.location.search);
        for (let p of params) {
            userMail = p[1];
        }
    });

    $('#check-fname').hide();     
    let fnameError = true; 
    $('#firstname').keyup(function () { 
        validateFname(); 
    });       
    function validateFname() { 
      let fnameValue = $('#firstname').val(); 
      let regex = /^[a-zA-Z ]*$/;
      if (fnameValue.length == '') { 
        $('#check-fname').show(); 
            fnameError = false; 
            return false; 
        }  
        else if(!(regex.test(fnameValue))) { 
            $('#check-fname').show(); 
            $('#check-fname').html("*Only characters allowed"); 
            fnameError = false; 
            return false; 
        }  
        else { 
            $('#check-fname').hide(); 
        }   
    }

    $('#check-lname').hide();     
    let lnameError = true; 
    $('#lastname').keyup(function () { 
        validatelname(); 
    }); 
      
    function validatelname() { 
      let lnameValue = $('#lastname').val(); 
      let regex = /^[a-zA-Z ]*$/;
      if (lnameValue.length == '') { 
        $('#check-lname').show(); 
            lnameError = false; 
            return false; 
        }  
        else if(!(regex.test(lnameValue))) { 
            $('#check-lname').show(); 
            $('#check-lname').html("*Only characters allowed"); 
            lnameError = false; 
            return false; 
        }  
        else { 
            $('#check-lname').hide(); 
        }   
    }

    $('#check-phone').hide();     
    let phoneError = true; 
    $('#phone').keyup(function () { 
        validatePhone(); 
    }); 
      
    function validatePhone() { 
      let phoneValue = $('#phone').val(); 
      let regex = /\+?\d[\d -]{8,12}\d/;


      if (phoneValue.length == '') { 
        $('#check-phone').show(); 
            phoneError = false; 
            return false; 
        }  
        else if(!(regex.test(phoneValue))) { 
            $('#check-phone').show(); 
            $('#check-phone').html("*Enter a valid Phone number."); 
            phoneError = false; 
            return false; 
        }  
        else { 
            $('#check-phone').hide(); 
        }   
    }


    $('#check-url').hide();     
    let urlError = true; 
    $('#url').keyup(function () { 
        validateUrl(); 
    }); 
      
    function validateUrl() { 
      let urlValue = $('#url').val(); 
      let regex = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/;


      if (urlValue.length == '') { 
        $('#check-url').show(); 
            urlError = false; 
            return false; 
        }  
        else if(!(regex.test(urlValue))) { 
            $('#check-url').show(); 
            $('#check-url').html("*Enter a valid url."); 
            urlError = false; 
            return false; 
        }  
        else { 
            $('#check-url').hide(); 
        }   
    }

    $('#check-dob').hide();     
    let dobError = true; 
    $('#dob').keyup(function () { 
        validateDob(); 
    }); 
      
    function validateDob() { 
        let dobValue = $('#dob').val(); 
        let regex = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/ ; 

      if (dobValue.length == '') { 
        $('#check-dob').show(); 
            dobError = false; 
            return false; 
        }  
        else if(!(regex.test(dobValue))) { 
            $('#check-dob').show(); 
            $('#check-dob').html("*Enter a valid dob."); 
            dobError = false; 
            return false; 
        }  
        else { 
            $('#check-dob').hide(); 
        }   
    }


    $('#check-age').hide();     
    let ageError = true; 
    $('#age').keyup(function () { 
        validateAge(); 
    }); 
      
    function validateAge() { 
      let ageValue = $('#age').val(); 

      if (ageValue.length == '') { 
        $('#check-age').show(); 
            ageError = false; 
            return false; 
        }  
        else { 
            $('#check-age').hide(); 
        }   
    }

    

    $('#submitbtn').click(function (event) {
        event.preventDefault(); 
        validateFname();
        validatelname();
        validatePhone();
        validateUrl();
        validateAge();
        validateDob();
        var formData = $('#update-form').serialize() + "&email=" + userMail;
        console.log(formData);
        $.ajax ({
            url: 'register-action.php',
            method: 'post',
            data: formData + '&action=update',
        }).done(function(result){
            console.log(result);  
        })
    }); 
});
