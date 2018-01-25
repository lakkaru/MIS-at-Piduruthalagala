$(document).ready(function() {
    $('#calender').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: '1', //dissabling previous days
        maxDate: '60',
        beforeShowDay: DisableSpecificDates,
        onSelect: function() {//getting date when it clicked
            requestedDate = $('#calender').datepicker().val();
            loadDoc(requestedDate);//making reservation
        }
    });
    $(".ui-state-default").on("mouseenter", function() {//tooltip for available dates
        $(this).attr('title', 'Available for reservation.');
    });

    $("#cancelButton").click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href'); //getting href of the Delete link
        cancelConf(href);
    })
});
function DisableSpecificDates(date) {//dissabling amended roster dates
    var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
    return [unavailabledates.indexOf(string) === -1];
}
function loadDoc(reDate) {//reserving dates in calender
    var reuqestedDate = reDate;
    $("#resvDialog").dialog({//opening confiremation dialog
        modal: true,
        bgiframe: true,
        width: 500,
        height: 200,
        autoOpen: false
    });
    $('#reserveMsg').text("You will reserve the vehicle on " + reuqestedDate + "?");
    $("#resvDialog").dialog("open");
    $("#resvDialog").dialog('option', 'buttons', {
        "Confirm": function() {
            $('#reserve').val(reuqestedDate);
            $('#vehicaleForm').submit();
            $(this).dialog("close");
        },
        "Cancel": function() {
            $(this).dialog("close");
        }
    });
}
function cancelConf(href) {
    $('#cancelMsg').text("The vehcle will availabel for staff transportation.");
    // For cancel confirmation
    $("#cancelDialog").dialog({
        modal: true,
        bgiframe: true,
        width: 500,
        height: 200,
        autoOpen: false
    });
    $("#cancelDialog").dialog("open");

    $("#cancelDialog").dialog('option', 'buttons', {
        "Confirm": function() {
            window.location.href = href;
        },
        "Cancel": function() {
            $(this).dialog("close");
        }
    });
    //end of delete confirmation
}
    