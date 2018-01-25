<div id="pagesBackgorund" class="row">
    <div class="col-lg-4">
        <form class="generalForm form-horizontal well" method="post" action="<?php echo URL; ?>diesel/editSave/<?php echo $this->diesel[0]['dieselId']; ?>" >
            <div >
                <div class="col-lg-12">
                    <legend class="lead">Editing Diesel Supply</legend>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="date" class="control-label"><span class="badge">Date</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="date" class="form-control datepicker" name="date" autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="stock" class="control-label "><span class="badge">Current Stock</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="number" id="stock" class="form-control"  name="stock" min="0" value="<?php echo $this->diesel[0]['stock']; ?>"  required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="amount" class="control-label"><span class="badge">Amount Supplied</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="number" id="amount" class="form-control" name="amount" min="0" value="<?php echo $this->diesel[0]['amount']; ?>"   required>
                </div>
            </div>
            <div class="form-group">
                <div class="text-right col-lg-12">           
                        <button type="submit" class="btn btn-success">Edit <span class="glyphicon glyphicon-edit"></span></button>
                        <a href="<?php echo URL . 'diesel'; ?>" ><span class="glyphicon glyphicon-backward" ></span>&nbsp;Back&nbsp;<span class="glyphicon glyphicon-backward" ></span></a>                
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-8 well">
        <div id="dieselTable_wrapper" class="container-fluid dataTables_wrapper form-inline dt-bootstrap">
            <div class="row well">
                <div class="col-lg-12">
                    <table id="dieselTable" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th  rowspan="1" colspan="1">Date</th>
                                <th class="no-sort"  rowspan="1" colspan="1">Current Stock</th>
                                <th class="no-sort"  rowspan="1" colspan="1">Amount Supplied (Liters)</th>
                                <th class="no-sort"  rowspan="1" colspan="1">Total Stock</th>
                                <th style="text-align: center;" class="no-sort"  rowspan="1" colspan="1">Edit</th>
                                <th style="text-align: center;" class="no-sort"  rowspan="1" colspan="1">Delete</th></tr>
                        </thead>
                        <tbody><?php
                            foreach ($this->dieselList as $key => $value) {
                                echo '<tr>';
                                echo '<td>' . $value['date'] . '</td>';
                                echo '<td>' . $value['stock'] . '</td>';
                                echo '<td>' . $value['amount'] . '</td>';
                                echo '<td>' . ($value['amount'] + $value['stock']) . '</td>';
                                echo '<td style="text-align: center;"><a href=" ' . URL . 'diesel/edit/' . $value['dieselId'] . ' "><span class="glyphicon glyphicon-edit" style="color:blue; text-align: center"></span>';
                                echo '<td style="text-align: center;"><a href=" ' . URL . 'diesel/Delete/' . $value['dieselId'] . ' " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
                                echo '</tr>';
                            }
                            ?></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
