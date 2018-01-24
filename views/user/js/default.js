$(document).ready(function() {
    $('#userTable').DataTable();//creating datatable
    $('#userTable_wrapper').width('50%');//for data table width

//getting used codes for new user adding
    $('#code').on('change', function() {//trigering txLocation select event
        var url = $('#userForm').attr('action');
        url = url.substring(0, url.length - 7);
        url = url.concat('/checkCode');
        var data = $('#code').serialize();
        $.post(url, data, function(o) {//posting data to get return value
            for (var i = 0; i < o.length; i++) {
                var nameObject = o[i];
            }
            var codeUser = Object.values(nameObject);
            $('#codeUser').fadeIn(500);
            $('#codeUser').empty();//delete the previous text
            $('#codeUser').append('This code letter will remove from <b>'.concat(codeUser).concat('<b/>.'));
        }, 'json');
        $('#codeUser').fadeOut(100);
        return false;
    });

//getting used codes for user editing
    $('#editCode').on('change', function() {//trigering txLocation select event
        var url = $('#editForm').attr('action');
        url = url.substring(0, url.length - 13);
        url = url.concat('/checkCode');
        var data = $('#editCode').serialize();
        $.post(url, data, function(o) {//posting data to get return value
            for (var i = 0; i < o.length; i++) {
                var nameObject = o[i];
            }
            var codeUser = Object.values(nameObject);
            $('#codeUser').fadeIn(500);//delete the previous text
            $('#codeUser').empty();//delete the previous text
            $('#codeUser').append('This code letter will remove from <b>'.concat(codeUser).concat('<b/>.'));
        }, 'json');
        $('#codeUser').fadeOut(100);
        return false;
    });
    $("#confirmDialog").dialog({
        modal: true,
        bgiframe: true,
        width: 500,
        height: 200,
        autoOpen: false
    });

    $("#user").click(function() {//validating and submitting user edit infor
        var name = $('#name').val();
        var role = $('#role').val();
        $('#conName').text(name);
        $('#conRole').text(role);
        var form = $(this).parents('form:first');//getting relavnt form for submit
        var valid = $("#userForm").valid();
        if (valid) {
            $("#confirmDialog").dialog("open");
            $("#confirmDialog").dialog('option', 'buttons', {
                "Confirm": function() {
                    form.submit()
                },
                "Cancel": function() {
                    $(this).dialog("close");
                }
            });
        }
    });//end of adding confirmation

    $.validator.addMethod(
            "regex",
            function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);
            },
            "Please check your phone number.(ex-077-1234567)"
            );
    $("#userForm").validate({//for validating form fields
        rules: {
            name: {
                required: true,
            },
            serviceNumber: {
                required: true,
                minlength: 3,
                maxlength: 4,
            },
            newPassword: {
                required: true, minlength: 3
            },
            confirmPassword: {
                required: true, equalTo: "#newPassword"
            },
            email: {
                required: false,
                email: true
            },
            mobile: {
                required: false,
                regex:"[0][1-9]{2}[-][0-9]{7}",
                maxlength: 11,
            },
            code: {
                required: true
            },
            editCode: {
                required: true
            },
            role: {
                required: true
            }
        },
        messages: {
            name: "Please enter user name with initials.",
            serviceNumber: {
                required: "Please enter user service number.",
                minlength: "Please check user service number.",
                maxlength: "Please check user service number."},
            mobile: {
                maxlength: "Please check your phone number.(Ten digits only)"},
            code: "Please select code letter.",
            role: "Please select user role",
            confirmPassword:"Please enter same password."
        }
    });
});
