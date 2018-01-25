<!--Home page index-->
<?php
if (($this->dieselMsg) != NULL) {//warning alert for no diesel stock data
    echo '<div id="dieselMsg" class="alert alert-warning">'
    . '<strong>Warning!</strong> ' . $this->dieselMsg . ''
    . '</div>';
}
?> 
<div class="row ">
    <!--for staff notice scrolling-->
    <div class='container-fluid well col-lg-4'>
        <div class="jumbotron " style="padding: 0; ">
            <legend >Staff notices </legend>
            <marquee class='' behavior="scroll" direction='up' scrollamount="2">
                <?php
                foreach ($this->fiveNotice as $key => $value) {
                    echo '<p><span style="color:blue">' . $value['date'] . '</span> - ' . $value['description'] . '</p>';
                }
                ?></marquee>
        </div>
    </div>
    <!--For diesel stock chart form google-->
    <div class="col-lg-4"> 
        <input type="text" id="dieselStock" hidden value=<?php
        echo round($this->approxStock);
        ?> />
        <div id="chart_div" style=" width: 85%;  margin: 0 auto;">

        </div> 
    </div>
    <!--for upcoming maintenance reminding-->
    <div class='container-fluid well col-lg-4'>
        <div class="jumbotron " style="padding: 0; ">
            <legend>Upcoming Maintenance Schedule</legend>
            <marquee class='container-fluid' behavior="scroll" direction='up' scrollamount="2">
                <?php
                $futureDate = new DateTime();
                $futureDate->modify("3 month");
                foreach ($this->fiveMtce as $key => $value) {
                    $mtceDate = new DateTime($value['nextDate']);
                    if ($futureDate >= $mtceDate) {
                        echo '<p><span style="color:blue">' . $value['nextDate'] . ' - </span><span style="color:red">' . $value['equipment'] . ' - ' . $value['description'] .
                        '</span></p>';
                    } else {
                        echo '<p><span style="color:blue">' . $value['nextDate'] . ' - </span><span style="color:green">' . $value['equipment'] . ' - ' . $value['description'] .
                        '</span></p>';
                    }
                }
                ?></marquee>
        </div>
    </div>
    <!-- Past mtce reminding Modal -->
<!--    <div id="mtceModal" class="modal fade" role="dialog">
        <div hidden>
            <input type="text"  id="pastDate" name="pastDate" value="<?php echo $this->pastMtce[0]['nextDate']; ?>"/>
        </div>
        <div class="modal-dialog">
             Past mtce Modal content
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Scheduled Maintenance</h4>
                </div>
                <div class="modal-body">
                    <p><b>You have missed the <?php echo $this->pastMtce[0]['equipment']; ?>  scheduled maintenance on <?php echo $this->pastMtce[0]['nextDate']; ?>. </b></p>
                    <form action="index/doneMtce" id="doneForm" method="post">
                        <input type="text" hidden  name="mtceId" value="<?php echo $this->pastMtce[0]['mtceId']; ?>">
                    </form>
                </div>
                <div class="modal-footer">
                    <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {//giving admin to mark done mtce
                        echo '<button type="button" id="doneButton" class="btn btn-success" data-dismiss="modal">All ready Done</button>' .
                        '<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>';
                    } else {
                        echo '<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>-->
    <!-- gettting diesel stock at the 1st of month-->
    <?php
    if (Session::get('loggedIn') == TRUE) {//check logged in for current dieselDialog opnning 
        $endStock = $this->endStock;
    } else {
        $endStock = 1;
    }
    $date = date('Y-m-01');
    ?>
    <div hidden>
        <input type="number" id="currentStock" class="form-control" value="<?php echo $endStock; ?>" />
    </div>
    <div id="dieselDialog" hidden title="Diesel Stock at the start of month">
        <form id='stockForm' action="diesel/currentStock/<?php echo $date ?>" method="post">
            <div class="form-group">      
                <label for="stock"class="control-label col-lg-4">Diesel Stock</label>
                <div class="col-lg-8">
                    <input type="number" name="stock" class="form-control" min="0" max="3000" /><br/>
                </div>            
            </div>         
        </form>
    </div>
</div>




