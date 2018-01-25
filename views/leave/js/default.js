var noOfDays = 1;
$(document).ready(function() {
    $(".leaveDatepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: '85'

    });
    $(".leaveDatepicker").datepicker('setDate', new Date());

    $(".reset").click(function() {
        $(".leaveDate2").hide();
        $(".leaveDate3").hide();
    });
    $("#leaveDatepicker1").change(function() {
        advanceDate2();
        advanceDate3();
    });
    $("#leaveDatepicker2").change(function() {
        advanceDate3();
    });
    $('.reset').click(function() {
        noOfDays = 1;
        $('#noOfDays').val(noOfDays);
    });
//leave summery gauges
    var casual = $('#casual').text();
    var vacation = $('#vacation').text();;
    var medical = $('#medical').text();;
    google.charts.load('current', {'packages': ['gauge']});
    google.charts.setOnLoadCallback(casualChart);
    google.charts.setOnLoadCallback(vacationChart);
    google.charts.setOnLoadCallback(medicalChart);
    function casualChart() {
        var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['Casual', 7],
        ]);
        var options = {
            max: 7,
            width: 600, height: 180,
            redFrom: 5, redTo: 7,
            greenFrom: 0, greenTo: 3,
            yellowFrom: 3, yellowTo: 5,
            minorTicks: 1.75,
        };

        var chart = new google.visualization.Gauge(document.getElementById('casual_div'));
        chart.draw(data, options);

        setInterval(function() {
            data.setValue(0, 1, casual);
            chart.draw(data, options);
        }, 130);
    }
    function vacationChart() {
        var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['Vaccation', 21],
        ]);
        var options = {
            max: 21,
            width: 600, height: 180,
            redFrom: 14, redTo: 21,
            greenFrom: 0, greenTo: 5,
            yellowFrom: 5, yellowTo: 14,
            minorTicks: 0.190467,
        };

        var chart = new google.visualization.Gauge(document.getElementById('vaccation_div'));
        chart.draw(data, options);

        setInterval(function() {
            data.setValue(0, 1, vacation);
            chart.draw(data, options);
        }, 130);
    }
    function medicalChart() {
        var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['Medical', 21],
        ]);
        var options = {
            max: 21,
            width: 600, height: 180,
            greenFrom: 0, greenTo: 7,
            yellowFrom: 7, yellowTo: 14,
            redFrom: 14, redTo: 21,
            minorTicks: 0.190467,
        };

        var chart = new google.visualization.Gauge(document.getElementById('medical_div'));
        chart.draw(data, options);

        setInterval(function() {
            data.setValue(0, 1, medical);
            chart.draw(data, options);
        }, 130);
    }

    //ajax for vehicale availability
    $('#leaveDatepicker1').change(function() {
        checkVehicle('#leaveDatepicker1');
    });
    $('#leaveDatepicker2').change(function() {
        checkVehicle('#leaveDatepicker2');
    });
    $('#leaveDatepicker3').change(function() {
        checkVehicle('#leaveDatepicker3');
    });
    
    function checkVehicle(leaveDate) {//checking vehicale on leave date
        var url = $('#leaveForm').attr('action');
        url = url.substring(0, url.length - 7);
        switch (leaveDate) {//settinng date field for $_post[]
            case '#leaveDatepicker1':
                url = url.concat('/checkVehicle/lDate1');
                break;
            case '#leaveDatepicker2':
                url = url.concat('/checkVehicle/lDate2');
                break;
            case '#leaveDatepicker3':
                url = url.concat('/checkVehicle/lDate3');
                break;
        }
        var data = $(leaveDate).serialize();
        var dayDiv = leaveDate.substring(6);
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
    };
    $('#leave').dataTable({//data table customozing
        "aaSorting": [[3, 'desc']],
        "bJQueryUI": true,
        "pageLength": 5,
        "ordering": true,
        columnDefs:
                [{orderable: false,
                        targets: "no-sort"},
                ]
    });
     $('#leave_wrapper').width('100%');
});

function showNextDate(x) {//showing next date in leave/ammendments
    switch (x) {
        case 1:
            $(".leaveDate2").show();
            advanceDate2();
            noOfDays = 2;
            $('#noOfDays').val(noOfDays);
            break;
        case 2:
            $(".leaveDate3").show();
            advanceDate3();
            noOfDays = 3;
            $('#noOfDays').val(noOfDays);
            break;
    }
}
function advanceDate2() {
    var date2 = $('#leaveDatepicker1').datepicker('getDate', '+1d');
    date2.setDate(date2.getDate() + 1);
    $("#leaveDatepicker2").datepicker({dateFormat: 'yy-mm-dd'});
    $('#leaveDatepicker2').datepicker('setDate', date2);
}
function advanceDate3() {
    var date3 = $('#leaveDatepicker2').datepicker('getDate', '+1d');
    date3.setDate(date3.getDate() + 1);
    $("#leaveDatepicker3").datepicker({dateFormat: 'yy-mm-dd'});
    $('#leaveDatepicker3').datepicker('setDate', date3);

}

function openNav(vehi) {
    document.getElementById(vehi).style.height = "100%";
    setInterval(function(){closeNav(vehi)},5000);
}

function closeNav(vehi) {
    document.getElementById(vehi).style.height = "0%";
}