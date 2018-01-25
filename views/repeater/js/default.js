$(document).ready(function() {
    //getting avarage rx level from selectedd tx location
    $('#txLoc').on('change', function() {//trigering txLocation select event
        var url = $('#avgLevel').attr('action');
        var data = $('#avgLevel').serialize();
        $.post(url, data, function(o) {//posting data to get return value
            for (var i = 0; i < o.length; i++) {
                var levelObject = o[i];
            }
            var avgLevel = Object.values(levelObject);
            $('#maxLevelShow').empty();//delete the previous text
            $('#maxLevelShow').append(' was '.concat(Math.round(avgLevel)).concat(' %.'));
        }, 'json');
        return false;
    });
    
    $(".addForm").validate({//for form validation
        rules: {
            newPassword: {
                required: true, minlength: 5
            },
            confirmPassword: {
                required: true, equalTo: "#newPassword", minlength: 5
            },
            email: {
                required: true, email: true
            },
            phone: {
                required: true, number: true, minlength: 7
            },
            url: {
                url: true
            },
            remarks: {
                required: true
            },
            gender: {
                required: true
            }
        },
        messages: {
            remarks: "Please enter a short description.",
            gender: "Please select your gender."
        }
    });

});
