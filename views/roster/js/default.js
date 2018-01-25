$(document).ready(function() {
    $('#print').click(function() {
        window.print();
    });
    $('#rosterMonth').datepicker({//for roster generation
        dateFormat: 'yy-mm-dd'
    });
    $('#cleander').datepicker({//for display roster month
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy MM',
        minDate: 0,
        onClose: function() {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
            $("#rosterMonth").datepicker('setDate', new Date(year, month, 1));
            var date = $('#rosterMonth').datepicker('getDate');//setting selected month yyy-mm-dd
            fillTable(date);
        }
    });
    
    $('#cleander').focus(function() {//hiding dates
        $('.ui-datepicker-calendar').addClass('hideDates');
    });

    $("#cleander").datepicker('setDate', new Date());//setting current month
    $("#rosterMonth").datepicker('setDate', new Date());//setting current month
    var date = $('#rosterMonth').datepicker('getDate');//setting selected month yyy-mm-dd
    fillTable(date);
});

function fillTable(date) {//jquery for table fiiling
    var Day = date
    var fullDate = new Date(Day);//formating Day to Date standered
    var lastDay = new Date(fullDate.getFullYear(), fullDate.getMonth() + 1, 0);//getting last day of the month for number of rows in roster
    var firstDay = new Date(fullDate.getFullYear(), fullDate.getMonth(), 1);//getting first day of the month    
    var nday = firstDay.getDay();//taking the number relavant of the 1st day of the month
    var day;//for the day
    var nextDate = firstDay;//new date var for days of the month with 1st day loaded
    var endOfMonth = lastDay.getDate();
    var initialDate = new Date("2014-11-29");//for roster starting date

    $("tr").remove(".days");//for removing last filled values for roster
    //adding new table rows for days
    for (i = 0; i <= endOfMonth; i++) {
        $("#tableHead").after("<tr class='days'> <td></td> <td colspan='2'></td> <td colspan='2'></td> <td colspan='2'></td> <td colspan='2'></td> </tr>");
    }
    for (d = 1; d <= endOfMonth; d++) {//filling the roster                                        
        switch (nday) {//naming the week day
            case 0:
                day = "Sun";
                break;
            case 1:
                day = "Mon";
                break;
            case 2:
                day = "Tue";
                break;
            case 3:
                day = "Wed";
                break;
            case 4:
                day = "Thu";
                break;
            case 5:
                day = "Fri";
                break;
            case 6:
                day = "Sat";
                break;
        }

        $('#table tr:eq(' + d + ')').find('td:eq(0)').text(nextDate.getDate());//setting the date on cell
        $('#table tr:eq(' + d + ')').find('td:eq(1)').text(day);//setting day on cell
        //filling duties for days    
        /**
         * 
         * @param {date} d1
         * @param {date} d2
         * @returns {int}
         */
        function dateDiff(d1, d2) {//getting number of dates from 2014-11-30
            var t2 = d2.getTime();
            var t1 = d1.getTime();
            return parseInt((t1 - t2) / (24 * 3600 * 1000));
        }

        var diffDays = dateDiff(nextDate, initialDate);//getting days from initial date
        var mod = diffDays % 6; //taking mod of 6 for duty assigning 

        switch (mod) {//assigning duty turns
            case 0://for AB starting day and EF last day
                switch (nday) {
                    case 0://for Sunday
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('EF');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('E*F*');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('AB');
                        break;
                    case 1://for Monday
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('EF');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('E*F*');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('AB');
                        break;
                    case 2://for Tuesday
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('EF');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('EF');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('AB');
                        break;
                    case 3://for Wendsday
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('EF');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('EF');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('AB');
                        break;
                    case 4://for Thuresday
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('EF');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('EF');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('A*B');
                        break;
                    case 5://for Friday
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('EF');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('EF');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('A*B*');
                        break;
                    case 6://for Saturady
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('EF');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('EF*');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('A*B*');
                        break;
                }
                break;
            case 1://for AB middle day
                $('#table tr:eq(' + d + ')').find('td:eq(2)').text('AB');
                $('#table tr:eq(' + d + ')').find('td:eq(3)').text('A*B');
                $('#table tr:eq(' + d + ')').find('td:eq(4)').text('AB*');
                break;
            case 2://for AB last day and CD first day
                switch (nday) {
                    case 0:
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('AB');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('A*B*');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('CD');
                        break;
                    case 1:
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('AB');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('A*B*');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('CD');
                        break;
                    case 2:
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('AB');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('AB');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('CD');
                        break;
                    case 3:
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('AB');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('AB');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('CD');
                        break;
                    case 4:
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('AB');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('AB');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('C*D');
                        break;
                    case 5:
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('AB');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('AB');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('C*D*');
                        break;
                    case 6:
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('AB');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('AB*');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('C*D*');
                        break;
                }
                break;
            case 3://for CD middle day
                $('#table tr:eq(' + d + ')').find('td:eq(2)').text('CD');
                $('#table tr:eq(' + d + ')').find('td:eq(3)').text('C*D');
                $('#table tr:eq(' + d + ')').find('td:eq(4)').text('CD*');
                break;
            case 4://for CD last day and EF start day
                switch (nday) {
                    case 0:
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('CD');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('C*D*');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('EF');
                        break;
                    case 1:
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('CD');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('C*D*');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('EF');
                        break;
                    case 2:
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('CD');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('CD');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('EF');
                        break;
                    case 3:
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('CD');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('CD');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('EF');
                        break;
                    case 4:
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('CD');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('CD');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('E*F');
                        break;
                    case 5:
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('CD');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('CD');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('E*F*');
                        break;
                    case 6:
                        $('#table tr:eq(' + d + ')').find('td:eq(2)').text('CD');
                        $('#table tr:eq(' + d + ')').find('td:eq(3)').text('CD*');
                        $('#table tr:eq(' + d + ')').find('td:eq(4)').text('E*F*');
                        break;
                }
                break;
            case 5://for EF middle day
                $('#table tr:eq(' + d + ')').find('td:eq(2)').text('EF');
                $('#table tr:eq(' + d + ')').find('td:eq(3)').text('E*F');
                $('#table tr:eq(' + d + ')').find('td:eq(4)').text('EF*');
                break;
        }
        nextDate.setDate(nextDate.getDate() + 1);//increment to next date
        nday = nextDate.getDay();//getting next day
    }//end of for loop
}//end of fillTable
