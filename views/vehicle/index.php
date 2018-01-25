<!--for reservation confirm dialog-->
<div id="resvDialog" hidden="" title="Confirmation Required">
    <p id="reserveMsg"></p>
</div>
<!--for reservation cancel dialog-->
<div id="cancelDialog" hidden="" title="Confirmation Required">
    <label hidden></label>
            <p id="cancelMsg"></p>
        </div>
<div id="pagesBackgorund" class="container-fluid">
    <div class="row container-fluid">
        <form id='vehicaleForm' method="post" action="<?php echo URL; ?>vehicle/create">
            <div class="row">
                <div class="col-lg-12">
                    <legend>Vehicle Reservation</legend>
                </div>
            </div>
            <div class="row well">
                <div class="col-lg-6">
                    <div id='demo' >
                        <!--for selected date for reservation-->
                        <input type="text" id='reserve' name="reserve" hidden/>
                    </div>
                    <div id="calender"  >
                        <!--getting duty changing dates from vehicle_model/checkDutyChanges() to default js-->
                        <script type="text/javascript">
                            var unavailabledates = $.parseJSON('<?php print_r($this->checkDutyChanges); ?>');
                        </script>
                    </div>
                </div>
                <div class='row col-lg-6 container-fluid form-group'>
                    <!--<button type="button"  class="btn btn-warning" style="float: right" >Cancel Reservation</button>-->
                    <div class="container-fluid dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th   rowspan="1" colspan="1" >Reserved Date by ADE</th>
                                            <th class="no-sort"   rowspan="1" colspan="1"  style="text-align: center;"</th>Cancel</tr>
                                    </thead>
                                    <tbody><?php
                                        foreach ($this->reservedList as $key => $value) {
                                            echo '<tr>';
                                            echo '<td>' . $value['date'] . '</td>';
                                            
                                            echo '<td style="text-align: center;"><a href=" ' . URL . 'vehicle/cancel/' . $value['amendedId'] . '" id="cancelButton"><span class="glyphicon glyphicon glyphicon-trash" style="color:red"></td>';
                                            echo '</tr>';
                                        }
                                        ?></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>