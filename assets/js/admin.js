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

        $('.alink').click(function(){
            if ($(this).attr('name') == "view") {
                AdminMember.view($(this).attr('id'));
            }

            if ($(this).attr('name') == "delete") {
                AdminMember.delete($(this).attr('id'));
            }
        });
    },

    validateRegister: function () {
        $('#frm').validate({
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
    },

    view: function (id) {
        $.post(site_url + 'admin/member/view', { mid: id }, function(result){
            $('#view_div').html('').html(result).modal();
        });
    },

    delete: function (id) {
        var ans = confirm("Are you sure you want to remove this member?");
        if (ans) {
            $('tr[id="' + id +'"]').remove();
            $.post(site_url + 'admin/member/delete', { mid: id }, function(result){
                var openDiv = '<div class="modal-header">';
                var closeBtn = '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button>';
                var hdr = '<h4 id="myModalLabel">Delete</h4>';
                var openBody = '<div class="modal-body">';
                var modalContent = openDiv + closeBtn + hdr + '</div>' + openBody + '<h3>' + result + '</h3></div';
                $('#view_div').html('').html(modalContent).modal();
            });
        }
    }
};