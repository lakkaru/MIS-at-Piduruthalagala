<div id="pagesBackgorund" class="row">
    <div class="col-lg-3 well">
        <form method="post" class="form-horizontal" action="<?php echo URL; ?>event/mtce" >
            <div >
                <div class="col-lg-12">
                    <legend class='lead'><?php echo $_SESSION['equipment'] ?> Maintenance</legend>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="mdate" class="control-label col-lg-4"><span class="badge">Date</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="mdate" class="form-control datepicker " name="date" required>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="mdescription" class="control-label col-lg-4"><span class="badge">Description</span></label>
                </div>
                <div class="col-lg-8">
                    <textarea id="mdescription" class="form-control" name="description" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="text-right col-lg-12">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">Add&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                        <button type="reset"  class="btn btn-warning reset">Refresh&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-3 well">
        <form method="post" class="form-horizontal" action="<?php echo URL; ?>event/fault" style="width: 90%">
            <div >
                <div class="col-lg-12">
                    <legend class='lead'><?php echo $_SESSION['equipment'] ?> Fault</legend>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="fdate" class="control-label col-lg-4"><span class="badge">Date</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="fdate" class="form-control datepicker" name="date"  required>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="fdescription" class="control-label col-lg-4"><span class="badge">Description</span></label>
                </div>
                <div class="col-lg-8">
                    <textarea id="fdescription" class="form-control" name="description" required ></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="text-right col-lg-12">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">Add&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                        <button type="reset"  class="btn btn-warning reset">Refresh&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-3 well">
        <form method="post" class="form-horizontal" action="<?php echo URL; ?>event/repair" style="width: 90%">
            <div >
                <div class="col-lg-12">
                    <legend class='lead'><?php echo $_SESSION['equipment'] ?> Repair</legend>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="rdate" class="control-label col-lg-4"><span class="badge">Date</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="rdate" class="form-control datepicker" name="date"  required>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="rdescription" class="control-label col-lg-4"><span class="badge">Description</span></label>
                </div>
                <div class="col-lg-8">
                    <textarea id="rdescription" class="form-control" name="description" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="text-right col-lg-12">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">Add&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                        <button type="reset"  class="btn btn-warning reset">Refresh&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-3 well">
        <form method="post" class="form-horizontal" action="<?php echo URL; ?>event/expan" style="width: 90%">
            <div >
                <div class="col-lg-12">
                    <legend class='lead'><?php echo $_SESSION['equipment'] ?> Expansion</legend>
                </div>
            </div>

            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="edate" class="control-label col-lg-4"><span class="badge">Date</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="edate" class="form-control datepicker" name="date"  required>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="edescription" class="control-label col-lg-4"><span class="badge">Description</span></label>
                </div>
                <div class="col-lg-8">
                    <textarea id="edescription" class="form-control" name="description" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="text-right col-lg-12">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">Add&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                        <button type="reset"  class="btn btn-warning reset">Refresh&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row well">
    <div id="event_wrapper" class="container-fluid dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-lg-12">
                <table id="event" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid">
                    <thead>
                        <tr role="row">
                            <th   rowspan="1" colspan="1" >Date</th>
                            <th   rowspan="1" colspan="1">Equipment</th>
                            <th   rowspan="1" colspan="1">Event</th>
                            <th class="no-sort"  rowspan="1" colspan="1" >Description</th>
                            <th style="text-align: center;" class="no-sort"  rowspan="1" colspan="1" >Edit</th>
                            <th style="text-align: center;" class="no-sort"  rowspan="1" colspan="1" >Delete</th></tr>
                    </thead>
                    <tbody><?php
                        foreach ($this->eventList as $key => $value) {
                            echo '<tr>';
                            echo '<td>' . $value['date'] . '</td>';
                            echo '<td>' . $value['equipment'] . '</td>';
                            echo '<td>' . $value['event'] . '</td>';
                            echo '<td>' . $value['description'] . '</td>';
                            echo '<td style="text-align: center;"><a href=" ' . URL . 'event/edit/' . $value['eventId'] . ' "><span class="glyphicon glyphicon-edit" style="color:blue; text-align: center"></span>';
                            echo '<td style="text-align: center;"><a href=" ' . URL . 'event/Delete/' . $value['eventId'] . ' " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
                            echo '</tr>';
                        }
                        ?></tbody>
                </table>
            </div>
        </div>
    </div>
</div>