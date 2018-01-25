<div id="pagesBackgorund" class="row">
    <div class="col-lg-4">
        <form method="post" class="form-horizontal well" action="<?php echo URL; ?>event/editSave/<?php echo $this->event[0]['eventId']; ?>" >
            <div class="container-fluid">
                <legend class="lead"><?php echo $_SESSION['equipment'] ?> <?php echo $this->event[0]['event']; ?></legend>
            </div>

            <div class="form-group">
                <label for="edate" class="control-label col-lg-3"><span class="badge">Date</span></label>
                <div class="col-lg-9">
                    <input type="text" id="edate" class="form-control datepicker" name="date"  autofocus />
                </div>
            </div>
            <div class="form-group">
                <label for="edescription" class="control-label col-lg-3"><span class="badge">Description</span></label>
                <div class="col-lg-9">
                    <textarea id="edescription" class="form-control"  name="description"  required  ><?php echo $this->event[0]['description']; ?></textarea>
                </div>
            </div>
            <div class="row form-group ">
                <div class="text-right col-lg-12">
                    <div class="btn">
                        <button type="submit" class="btn btn-success">Edit <span class="glyphicon glyphicon-edit"></span></button>
                        <a href="<?php echo URL . 'event'; ?>" ><span class="glyphicon glyphicon-backward" ></span>&nbsp;Back&nbsp;<span class="glyphicon glyphicon-backward" ></span></a>
                    </div> 
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-8">
        <div class="row well">
            <div id="event_wrapper" class="container-fluid dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-lg-12">
                        <table id="event" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid">
                            <thead>
                                <tr role="row">
                                    <th   rowspan="1" colspan="1" style="width: 100px;">Date</th>
                                    <th   rowspan="1" colspan="1" style="width: 91px;">Equipment</th>
                                    <th   rowspan="1" colspan="1" style="width: 91px;">Event</th>
                                    <th class="no-sort"  rowspan="1" colspan="1" >Description</th>

                                    <th class="no-sort"  rowspan="1" colspan="1" style="width: 50px;">Edit</th>
                                    <th class="no-sort"  rowspan="1" colspan="1" style="width: 50px;">Delete</th></tr>
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
    </div>
</div>
