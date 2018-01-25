<div id="pagesBackgorund">
    <div class="row well">
        <form method="post" class="form-horizontal" action="<?php echo URL; ?>notice/create/" >
            <div class="col-lg-12">
                <div class="col-lg-7">
                    <legend class="lead">Staff Notice</legend>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-1">
                    <label for="date" class="control-label"><span class="badge">Date</span></label>
                </div>
                <div class=" col-lg-2">
                    <input type="text" id="date" class="form-control datepicker" name="date" required>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-1">
                    <label for="description" class="control-label"><span class="badge">Description</span></label>
                </div>
                <div class="col-lg-6">
                    <textarea id="description" class="form-control" name="description" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="text-right col-lg-7">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">Add&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                        <button type="reset"  class="btn btn-warning">Refresh&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class='row well'>
        <div class=" container-fluid dataTables_wrapper form-inline dt-bootstrap">
            <div class="row well">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid">
                        <thead>
                            <tr role="row">
                                <th   rowspan="1" colspan="1" >Date</th>
                                <th class="no-sort"  rowspan="1" colspan="1" >Description</th>
                                <th class="no-sort"  rowspan="1" colspan="1" style="width: 170px;">Added By</th>
                                <th style="text-align: center;" class="no-sort"  rowspan="1" colspan="1">Edit</th>
                                <th style="text-align: center;" class="no-sort"  rowspan="1" colspan="1">Delete</th></tr>
                        </thead>
                        <tbody><?php
                            foreach ($this->noticeList as $key => $value) {
                                echo '<tr>';
                                echo '<td>' . $value['date'] . '</td>';
                                echo '<td>' . $value['description'] . '</td>';
                                echo '<td>' . $value['name'] . '</td>';
                                echo '<td style="text-align: center;"><a href=" ' . URL . 'notice/edit/' . $value['noticeId'] . ' "><span class="glyphicon glyphicon-edit" style="color:blue; text-align: center"></span>';
                                echo '<td style="text-align: center;"><a href=" ' . URL . 'notice/Delete/' . $value['noticeId'] . ' " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
                                echo '</tr>';
                            }
                            ?></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>