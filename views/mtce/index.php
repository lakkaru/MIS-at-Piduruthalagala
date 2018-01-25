<div id="pagesBackgorund" class="row">
    <div class="col-lg-4 well">
        <form method="post" class="form-horizontal" action="<?php echo URL; ?>mtce/create" >
            <div class="container-fluid">
                <legend class="lead"><?php echo $_SESSION['equipment'] ?> Next Maintenance Schedule</legend>
            </div>
            <div class="form-group">
                <label for="nextDate" class="control-label col-lg-4"><span class="badge">Next date</span></label>
                <div class="col-lg-8">
                    <input type="text" id="calender" autofocus class="form-control" readonly name="nextDate" style="width: 200px" required>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="control-label col-lg-4"><span class="badge">Description</span></label>
                <div class="col-lg-8">
                    <textarea  class="form-control" name="description" required ></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="text-right col-lg-12">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success addButton">Add&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                        <button type="reset"  class="btn btn-warning reset">Refresh&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                    </div>

                    <a href="<?php echo URL . 'event'; ?>" ><span class="glyphicon glyphicon-backward" ></span>&nbsp;Back&nbsp;<span class="glyphicon glyphicon-backward" ></span></a>
                </div>

            </div>
        </form>
    </div>
</div>
<div id="mtce_wrapper" class="container-fluid dataTables_wrapper form-inline dt-bootstrap">
    <div id="pagesBackgorund" class="row well">
        <div class="col-lg-12">
            <table id="mtce" class="table table-striped table-bordered  mtceTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc"   rowspan="1" colspan="1" >Next Mtce Date</th>
                        <th class="sorting"   rowspan="1" colspan="1" >Equipment</th>
                        <th class="sorting"   rowspan="1" colspan="1" >Description</th>
                         <th style="text-align: center;" class="no-sort"  rowspan="1" colspan="1">Edit</th>
                        <th style="text-align: center;" class="no-sort"  rowspan="1" colspan="1">Delete</th></tr>
                </thead>
                <tbody><?php
                    foreach ($this->mtceList as $key => $value) {
                        echo '<tr>';
                        echo '<td>' . $value['nextDate'] . '</td>';
                        echo '<td>' . $value['equipment'] . '</td>';
                        echo '<td>' . $value['description'] . '</td>';
                        echo '<td style="text-align: center;"><a href=" ' . URL . 'mtce/edit/' . $value['mtceId'] . ' "><span class="glyphicon glyphicon-edit" style="color:blue; text-align: center"></span>';
                        echo '<td style="text-align: center;"><a href=" ' . URL . 'mtce/Delete/' . $value['mtceId'] . ' " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
                        echo '</tr>';
                    }
                    ?></tbody>
            </table>
        </div>
    </div>
</div>