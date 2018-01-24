$(document).ready(function() {
//    init();
    var pastDate = $('#pastDate').val();//getting past dates for schedule mtce
//    alert (pastDate);
    if (pastDate) {//viewing modal if past dates available
        $("#mtceModal").modal();
        $("#doneButton").click(function() {
            $("#doneForm").submit();
            $("#mtceModal").modal('hide');
//alert('clicked');
        });
    };
    
//    alert($('#dieselStock').val());
    var dieselStock = $('#dieselStock').val();
    google.charts.load('current', {'packages': ['gauge']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['Diesel Stock', 2600],
        ]);

        var options = {
            max: 2600,
            width: 1200, height: 360,
            redFrom: 0, redTo: 1100,
            greenFrom: 1600, greenTo: 2600,
            yellowFrom: 1100, yellowTo: 1600,
            minorTicks: 10,
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

        setInterval(function() {
            data.setValue(0, 1, dieselStock);
            chart.draw(data, options);
        }, 130);
    }


//     For diesel stock dialog
$('#stockForm').validate({
    rules: {
        stock: { required: true 
        },
//        description: { required: true }
    },
    messages: {
        stock:'You must add correct diesel stock'
           }
});

    $("#dieselDialog").dialog({
// closeOnEscape: false,
//beforeClose: function (event, ui) { return false; },
//dialogClass: "noclose",
        modal: true,
        bgiframe: true,
        width: 400,
        height: 250,
        autoOpen: false
    });
    
    if($('#currentStock').val()==='0'){
//    var toDay = new Date(); //getting today for diesel stock dialog
//    //$today= new Date();//first day of this month
//    var day = toDay.getDate(); //first day of this month
////    alert(day);
//
//    if (day === 28) {
//alert($('#currentStock').val());

        $("#dieselDialog").dialog("open");
        // e.preventDefault();
        $("#dieselDialog").dialog('option', 'buttons', {
            "Add": function() {
//                var href = $('#dieselLink').attr('href');//getting href of the Delete link
//                alert(href);
                $('#stockForm').submit();
window.location.href = href;
$(this).dialog("close");
            }

        });
    }; //end of diesel stock adding

});


