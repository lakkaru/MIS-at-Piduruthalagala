var noOfDays = 1;
$(document).ready(function() {
    $(".exDatepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: '85'
    });
    $(".exDatepicker").datepicker('setDate', new Date());


    $(".reset").click(function() {
        $(".exDate2").hide();
        $(".exDate3").hide();
    });
    $("#exDatepicker1").change(function() {
        // alert('test');
        advanceDate(1);
        advanceDate(2);
    });
    $("#exDatepicker2").change(function() {
        advanceDate(2);
    });
    $("#exDatepicker4").change(function() {
        // alert('test');
        advanceDate(3);
        advanceDate(4);
    });
    $("#exDatepicker5").change(function() {
        advanceDate(4);
    });

    //ajax for vehicale availability
    $('#exDatepicker1').change(function() {
        checkVehicle('#exDatepicker1');
    });
    $('#exDatepicker2').change(function() {
        checkVehicle('#exDatepicker2');
    });
    $('#exDatepicker3').change(function() {
        checkVehicle('#exDatepicker3');
    });
    $('#exDatepicker4').change(function() {
        checkVehicle('#exDatepicker4');
    });
    $('#exDatepicker5').change(function() {
        checkVehicle('#exDatepicker5');
    });
    $('#exDatepicker6').change(function() {
        checkVehicle('#exDatepicker6');
    });

    function checkVehicle(exDate) {//checking vehicale on ex date
        var url = $('#exForm').attr('action');
        url = url.substring(0, url.length - 7);
        switch (exDate) {//settinng date field for $_post[]
            case '#exDatepicker1':
                url = url.concat('/checkVehicle/exDate11');
                break;
            case '#exDatepicker2':
                url = url.concat('/checkVehicle/exDate12');
                break;
            case '#exDatepicker3':
                url = url.concat('/checkVehicle/exDate13');
                break;
            case '#exDatepicker4':
                url = url.concat('/checkVehicle/exDate21');
                break;
            case '#exDatepicker5':
                url = url.concat('/checkVehicle/exDate22');
                break;
            case '#exDatepicker6':
                url = url.concat('/checkVehicle/exDate23');
                break;
        }

        var data = $(exDate).serialize();
        var dayDiv = exDate.substring(3);

        $.post(url, data, function(o) {//posting data to get return value
            for (var i = 0; i < o.length; i++) {
                var vehicleObject = o[i];
            }
            var vehicle = Object.values(vehicleObject);
            if (vehicle == 0) {
                openNav(dayDiv);
            }
            if (vehicle == 1) {
                closeNav(dayDiv);
            }
        }, 'json');
        return false;
    }
    $('#exchange').dataTable({//data table customozing
        "aaSorting": [[4, 'desc']],
        "bJQueryUI": true,
        "pageLength": 5,
        "ordering": true,
        columnDefs:
                [{orderable: false,
                        targets: "no-sort"},
                ]
    });
     $('#exchange_wrapper').width('100%');
});
function showNextDate(x) {//showing next date in leave/ammendments and advansing date
    switch (x) {
        case 1:
            $(".exDate2").show();
            advanceDate(1);
            //advanceDate(2);
            advanceDate(3);
            // advanceDate(4);
            noOfDays = 2;
            $('#noOfDays').val(noOfDays);
            break;
        case 2:
            $(".exDate3").show();
            advanceDate(2);
            advanceDate(4);
            noOfDays = 3;
            $('#noOfDays').val(noOfDays);
            break;

    }
}
function advanceDate(d) {
    switch (d) {
        case 1:
            var date2 = $('#exDatepicker1').datepicker('getDate', '+1d');
            date2.setDate(date2.getDate() + 1);
            $("#exDatepicker2").datepicker({dateFormat: 'yy-mm-dd'});
            $('#exDatepicker2').datepicker('setDate', date2);

            break;
        case 2:
            var date3 = $('#exDatepicker2').datepicker('getDate', '+1d');
            date3.setDate(date3.getDate() + 1);
            $("#exDatepicker3").datepicker({dateFormat: 'yy-mm-dd'});
            $('#exDatepicker3').datepicker('setDate', date3);
            break;
        case 3:
            var date4 = $('#exDatepicker4').datepicker('getDate', '+1d');
            date4.setDate(date4.getDate() + 1);
            $("#exDatepicker5").datepicker({dateFormat: 'yy-mm-dd'});
            $('#exDatepicker5').datepicker('setDate', date4);
            break;
        case 4:
            var date5 = $('#exDatepicker5').datepicker('getDate', '+1d');
            date5.setDate(date5.getDate() + 1);
            $("#exDatepicker6").datepicker({dateFormat: 'yy-mm-dd'});
            $('#exDatepicker6').datepicker('setDate', date5);
            break;
    }
   
}
function openNav(vehi) {
    document.getElementById(vehi).style.height = "100%";
    setInterval(function(){closeNav(vehi)},5000);
}

function closeNav(vehi) {
    document.getElementById(vehi).style.height = "0%";
}