<div id="pagesBackgorund" class="row">
    <div class="col-lg-4 well">
        <div >
            <div class="col-lg-12">
                <legend class="lead">Viewer Information</legend>
            </div>
        </div>
        <form method="post" class="form-horizontal" action="">
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="date" class="control-label"><span class="badge">Date</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="date" class="form-control datepicker" name="date"  readonly style="width: 110px">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="name" class="control-label"><span class="badge">Name with initials</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="name" class="form-control " name="name"   readonly value="<?php echo $this->viewer[0]['name']; ?>" >
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="city" class="control-label"><span class="badge">City</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="city" class="form-control " name="city"   readonly value="<?php echo $this->viewer[0]['city']; ?>"  >
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="address" class="control-label"><span class="badge">Address</</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="address" class="form-control " name="address"  readonly value="<?php echo $this->viewer[0]['address']; ?>"  >
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="resTel" class="control-label"><span class="badge">Telephone - Res</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="tel" id="resTel" class="form-control " name="resTel"  readonly  value="<?php echo $this->viewer[0]['resTel']; ?>"   style="width: 110px">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="mobTel" class="control-label"><span class="badge">Telephone - Mob</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="tel" id="mobTel" class="form-control " name="mobTel"  readonly  value="<?php echo $this->viewer[0]['mobTel']; ?>"   style="width: 110px">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="email" class="control-label"><span class="badge">Email</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="email" id="email" class="form-control " name="email"  readonly  value="<?php echo $this->viewer[0]['email']; ?>"  >
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="related" class="control-label"><span class="badge">Related To</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="related" class="form-control" value="<?php echo $this->viewer[0]['related']; ?>" readonly />
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="description" class="control-label"><span class="badge">Description</span></label>
                </div>
                <div class="col-lg-8">
                    <textarea id="description" class="form-control" name="description"  readonly   > <?php echo $this->viewer[0]['description']; ?> </textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="text-right col-lg-12">
                    <a href="<?php echo URL . 'viewer'; ?>" ><span class="glyphicon glyphicon-backward" ></span>&nbsp;Back&nbsp;<span class="glyphicon glyphicon-backward" ></span></a>
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
