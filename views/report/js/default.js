$(document).ready(function() {
    $('#printButton').click(function() {
        window.print(); // print the page
    });
    var date = new Date();//for today
    var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);//for first of month
    $('#from').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: '0'
    });
    $("#from").datepicker('setDate', new Date(firstDay));//start of month
    $('#to').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: '0'
    });
    $("#to").datepicker('setDate', new Date());//current date
    $('#mtceFrom').datepicker({//changing month and year
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        minDate:'0'
    });
    $("#mtceFrom").datepicker('setDate', new Date());
    $('#mtceTo').datepicker({//changing month and year
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        minDate:'0'
    });
    $("#mtceTo").datepicker('setDate', new Date());
    $('#start').datepicker({//for running report
        dateFormat: 'yy-mm-dd'
    });
    $('#next').datepicker({//for running report
        dateFormat: 'yy-mm-dd'
    });
    $('#monthDis').datepicker({//for display month year only
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy MM',
        maxDate: '-1m',
        onClose: function() {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
            $("#start").datepicker('setDate', new Date(year, month, 1));
            var date = $('#start').datepicker('getDate');//setting selected month yyy-mm-dd
            date.setMonth(date.getMonth() + 1);//adding one month
            $("#next").datepicker("setDate", date);
        }
    });
    $('#monthDis').focus(function() {//hiding dates
        $('.ui-datepicker-calendar').addClass('hideDates');
    });

    $("#monthDis").datepicker('setDate', new Date());//setting current month

    var monthBack = $('#monthDis').datepicker('getDate');
    monthBack.setDate(1);//setting previous month first date
    $("#start").datepicker('setDate', monthBack);//first date of previous month
    monthBack.setMonth(monthBack.getMonth() + 1);//setting this month again
    $("#next").datepicker('setDate', monthBack);
});
