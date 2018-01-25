<div id="pagesBackgorund" class="row">
    <div class="col-lg-4 well">
        <div >
            <div class="col-lg-12">
                <legend class="lead">Viewer Information</legend>
            </div>
        </div>
        <form method="post" id="viewer" class="form-horizontal" action="<?php echo URL; ?>viewer/create" >
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="date" class="control-label"><span class="badge">Date</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="date" class="form-control datepicker" name="date"  required style="width: 110px">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="name" class="control-label "><span class="badge">Name with initials</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="name" class="form-control " name="name"  required >
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="city" class="control-label "><span class="badge">City</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="city" class="form-control " name="city"  required >
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="address" class="control-label"><span class="badge">Address</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="address" class="form-control " name="address"  >
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="resTel" class="control-label"><span class="badge">Telephone - Res</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="tel" id="resTel" class="form-control" name="resTel" pattern='[\?0]\d{2}[\-]\d{7}' title='Phone Number (Format: 037-9999999)' style="width: 110px">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="mobTel" class="control-label"><span class="badge">Telephone - Mob</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="tel" id="mobTel" class="form-control" name="mobTel" pattern='[\?0]\d{2}[\-]\d{7}' title='Phone Number (Format: 071-7777777)' style="width: 110px">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="email" class="control-label"><span class="badge">Email</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="email" id="email" class="form-control " name="email"  >
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="related" class="control-label"><span class="badge">Related To</span></label>
                </div>
                <div class="col-lg-8">
                    <select name="related" id="related" class="form-control" required>
                        <option value="" disabled selected>-- Select --</option>
                        <option value="Rupavahini">Rupavahini</option>
                        <option value="Eye">Eye</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="description" class="control-label"><span class="badge">Description</span></label>
                </div>
                <div class="col-lg-8">
                    <textarea class="form-control" id="description" name="description" required  ></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="text-right col-lg-12">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success addButton">Add&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                        <button type="reset"  class="btn btn-warning">Refresh&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-8">
        <div class="row well">
            <div class="container-fluid dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid">
                            <thead>
                                <tr role="row">
                                    <th    rowspan="1" colspan="1"  >Date</th>
                                    <th   rowspan="1" colspan="1"  >Name</th>
                                    <th    rowspan="1" colspan="1">City</th>
                                    <th   rowspan="1" colspan="1"  >Related</th>
                                    <th class="no-sort"  rowspan="1" colspan="1">Mobile</th>
                                    <th class="no-sort"   rowspan="1" colspan="1"  >View</th>
                                    <th class="no-sort"   rowspan="1" colspan="1"  >Edit</th>
                                    <th class="no-sort"   rowspan="1" colspan="1"  >Delete</th></tr>
                            </thead>
                            <tbody><?php
                                foreach ($this->viewerList as $key => $value) {
                                    echo '<tr>';
                                    echo '<td>' . $value['date'] . '</td>';
                                    echo '<td>' . $value['name'] . '</td>';
                                    echo '<td>' . $value['city'] . '</td>';
                                    echo '<td>' . $value['related'] . '</td>';
                                    echo '<td>' . $value['mobTel'] . '</td>';
                                    echo '<td style="text-align: center;"><a href=" ' . URL . 'viewer/view/' . $value['viewerId'] . ' "><span class="glyphicon glyphicon-eye-open" style="color:blue; text-align: center"></span>';
                                    echo '<td style="text-align: center;"><a href=" ' . URL . 'viewer/edit/' . $value['viewerId'] . ' "><span class="glyphicon glyphicon-edit" style="color:blue; text-align: center"></span>';
                                    echo '<td style="text-align: center;"><a href=" ' . URL . 'viewer/Delete/' . $value['viewerId'] . ' " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
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