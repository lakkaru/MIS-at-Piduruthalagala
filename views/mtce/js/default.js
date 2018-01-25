$(document).ready(function() {
    $('#calender').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: '0',
        changeMonth: true,
        changeYear: true,
    });

    $('#mtce').dataTable({
        "fnSort": [[0, 'acs']],
        "bJQueryUI": true,
        "pageLength": 5,
        "ordering": true,
        columnDefs:
                [{orderable: false,
                        targets: "no-sort"},
                ]
    });

    $('.cancel').click(function() {
        window.location = URL.concat('event');
    });
});


