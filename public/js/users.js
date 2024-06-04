
// $('#password_requirements').attr('hidden', true);

$('#basic-default-password').on('focus', function() {
    $('#password_requirements').attr('hidden', false);
    $('#submit').attr('disabled', true)
});



$('#basic-default-password').keyup(function () {
    var pwdLength   = /^.{8,16}$/;
    var pwdUpper    = /[A-Z]+/;
    var pwdLower    = /[a-z]+/;
    var pwdNumber   = /[0-9]+/;
    var pwdSpecial  = /[!@#$%^&()'[\]"?+-/*={}.,;:_]+/;

    pwdLength.test( $('#basic-default-password').val() );

    var s = $('#basic-default-password').val();

    if (pwdLength.test( s )) {
        // console.log(s);

        $('#pwd-restriction-length').addClass('pwd-restriction-checked');
    } else {
        $('#pwd-restriction-length').removeClass('pwd-restriction-checked');
    }
    
    if (pwdUpper.test(s) && pwdLower.test(s)) {
        $('#pwd-restriction-upperlower').addClass('pwd-restriction-checked');
    } else {
        $('#pwd-restriction-upperlower').removeClass('pwd-restriction-checked');
    }

    if (pwdNumber.test(s)) {
        $('#pwd-restriction-number').addClass('pwd-restriction-checked');
    } else {
        $('#pwd-restriction-number').removeClass('pwd-restriction-checked');
    }

    if (pwdSpecial.test(s)) {
        $('#pwd-restriction-special').addClass('pwd-restriction-checked');
    } else {
        $('#pwd-restriction-special').removeClass('pwd-restriction-checked');
    }
});


$('#basic-default-password-confirm').on('keyup', function() {
    const password_confirm  = $('#basic-default-password-confirm').val();
    const password          = $('#basic-default-password').val();
    let   isvalid           = $(".pwd-restriction-checked").length == 4;
    $('#confirm_password_div').attr('hidden', false);
    $('#submit').attr('disabled', true);

    
    
    if(password_confirm === password && isvalid) {
        $('#confirm_password_div').attr('hidden', true);
        $('#submit').attr('disabled', false);
    } 

});

