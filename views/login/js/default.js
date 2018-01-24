$(document).ready(function() {
//for login Dialog
    $("#loginDialog").dialog({
        modal: true,
        bgiframe: true,
        width: 400,
        height: 290,
        autoOpen: true
    });
    $("#loginDialog").dialog('option', 'buttons', {
        "Login": function() {
            $('#submitLogin').click();//submitting login details to loginrun
        },
        "Cancel": function() {
            $(this).dialog("close");
            window.location = URL.concat('index');//direct to index page
        }
    });
//for serviceNumber & password mismatch popup
$('#mismatch').delay(2000).fadeOut(400);

})