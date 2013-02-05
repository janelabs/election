var Admin = {

    initView: function(){
        //validate login form
        Admin.validateLogin();
    },

    validateLogin: function () {
        $('#loginfrm').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                email: {
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address."
                },
                password: {
                    required: "Please enter your password.",
                    minlength: "Your password is too short."
                }
            },
            errorClass: "login_error"
        });
    }
};

var AdminMember = {
    initView: function(){
        //validate login form
        AdminMember.validateRegister();
    },

    validateRegister: function () {
        $('#registerFrm').validate({
            rules: {
                lname: "required",
                fname: "required",
                mname: "required",
                address: "required",
                mobile_no: {
                    digits: true,
                    minlength: 11
                },
                eadd: {
                    required: true,
                    email: true
                }
            },
            errorClass: "reg_error"
        });
    }
};