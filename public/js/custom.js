$(document).ready(function() {
    $(".datepicker").datepicker({//setting common datepicker
        dateFormat: 'yy-mm-dd',
        maxDate: '0'
    });
    $(".datepicker").datepicker('setDate', new Date());
    $(".datepicker").keydown(function(e) {
        e.preventDefault();
        return false;
    });

    $('#success').delay(1500).slideUp(1000); //fading out success div at header
    $('#noAccess').delay(1500).slideUp(1000); //fading out success div at header
    $('#error').delay(1500).slideUp(1000); //fading out success div at header

    $('.dataTable').dataTable({
        "aaSorting": [[0, 'desc']],
        "bJQueryUI": true,
        "pageLength": 5,
        "ordering": true,
        columnDefs:
                [{orderable: false,
                        targets: "no-sort"},
                ]
    });
    $('.dataTable_wrapper').width('100%');

    // For delete confirmation
    $("#deleteDialog").dialog({
        modal: true,
        bgiframe: true,
        width: 400,
        height: 200,
        autoOpen: false
    })
//            .css("background", "#A7C0C4");
    $(".deleteButton").click(function(e) {
        var href = $(this).attr('href'); //getting href of the Delete link
        $("#deleteDialog").dialog("open");
        e.preventDefault();
        $("#deleteDialog").dialog('option', 'buttons', {
            "Confirm": function() {
                window.location.href = href;
            },
            "Cancel": function() {
                $(this).dialog("close");
            }
        });
    }); //end of delete confirmation

    $("#logoutDialog").dialog({
        modal: true,
        bgiframe: true,
        width: 400,
        height: 200,
        autoOpen: false
    });

    $('#logout').on('click', function(e) {
        var href = $(this).attr('href'); //getting href of the logoutDialog link
        $("#logoutDialog").dialog("open");
        e.preventDefault();
        $("#logoutDialog").dialog('option', 'buttons', {
            "Confirm": function() {
                window.location.href = href;
            },
            "Cancel": function() {
                $(this).dialog("close");
            }
        })
    }); //end of logoutDialog confirmation
}); 