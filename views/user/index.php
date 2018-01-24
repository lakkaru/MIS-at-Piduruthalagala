<!--for adding confirm dialog-->
<div id="confirmDialog" hidden="" title="Confirmation Required">
    <p>Do you want to add <b id="conName"></b> as a new <b id="conRole"></b> to the system?'</p>
</div>
<div class="row well">
    <div class="col-lg-4">
        <div class="col-lg-12">
            <legend class="lead">Add New User</legend>
        </div>
        <form method="post" id="userForm" class="form-horizontal well" action="<?php echo URL; ?>user/create" >         
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="name" class="control-label"><span class="badge">Name</span></label>
                </div>
                <div class="col-lg-8">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Name with initials">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="serviceNumber" class="control-label"><span class="badge">Service Number</span></label>
                </div>
                <div class="col-lg-8">
                    <input id="serviceNumber" type="number" class="form-control" name="serviceNumber" min="0" style="width: 80px">
                </div>
            </div>
            <!--            <div class="form-group">
                            <div class=" col-lg-4">
                                <label for="password" class="control-label"><span class="badge">Password</span></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Default :- Service Number" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" col-lg-4">
                                <label for="confirmPassword" class="control-label"><span class="badge">Confirm Password</span></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="confirmPassword" class="form-control" id="confirmPassword" name="confirmPassword" >
                            </div>
                        </div>-->
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="email" class="control-label"><span class="badge">Email</span></label>
                </div>
                <div class="col-lg-8">
                    <input id="email" type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="mobile" class="control-label"><span class="badge">Mobile</span></label>
                </div>
                <div class="col-lg-8">
                    <input id="mobile" type="tel" class="form-control" name="mobile">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label class="control-label" for="code"><span class="badge">Code Letter</span></label>
                </div>
                <div class="col-lg-8">
                    <select name="code" id="code" class="form-control"  style="width: 90px">
                        <option value="" disabled="" selected="">Use 'O' for ADE</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="O">O</option>
                    </select>
                </div>

            </div>
            <div>
                <p hidden id="codeUser" class="control-label" ></p>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label class="control-label" for="role"><span class="badge">User role</span></label>
                </div>
                <div class="col-lg-8">
                    <select name="role" id="role" class="form-control" style="width: 90px" >
                        <option value="" disabled="" selected="">Select</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
<!--                <p>&nbsp;</p>-->
            </div>
            <div class="form-group">
                <div class="text-right col-lg-12">
                    <div class="btn-group">
                        <button type="button" id="user" class="btn btn-success">Add&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                        <button type="reset"  class="btn btn-warning">Refresh&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-08">
        <div class="container-fluid dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-lg-8">
                    <table class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" >
                        <thead>
                            <tr role="row">
                                <th   rowspan="1" colspan="1">Name</th>
                                <th   rowspan="1" colspan="1">Service Number</th>
                                <th   rowspan="1" colspan="1"">Code</th>
                                <th class="no-sort"  rowspan="1" colspan="1" >Email</th>
                                <th class="no-sort"  rowspan="1" colspan="1">Mobile</th>
                                <th   rowspan="1" colspan="1">Role</th>
                                <th class="no-sort"  rowspan="1" colspan="1">Password Reset</th>
                                <th class="no-sort"  rowspan="1" colspan="1">Edit</th>
                                <th class="no-sort"  rowspan="1" colspan="1" >Delete</th></tr>
                        </thead>
                        <tbody><?php
                            foreach ($this->userList as $key => $value) {
                                echo '<tr>';
                                echo '<td>' . $value['name'] . '</td>';
                                echo '<td>' . $value['serviceNumber'] . '</td>';
                                echo '<td>' . $value['code'] . '</td>';
                                echo '<td>' . $value['email'] . '</td>';
                                echo '<td>' . $value['mobile'] . '</td>';
                                echo '<td>' . $value['role'] . '</td>';
                                echo '<td style="text-align: center;"><a data-toggle="tooltip" title="Password will reset to service number." href=" ' . URL . 'user/reset/' . $value['serviceNumber'] . ' "><span class="glyphicon glyphicon-refresh" style="color:green; text-align: center"></span>';
                                echo '<td style="text-align: center;"><a href=" ' . URL . 'user/edit/' . $value['serviceNumber'] . ' "><span class="glyphicon glyphicon-edit" style="color:blue; text-align: center"></span>';
                                echo '<td style="text-align: center;"><a href=" ' . URL . 'user/Delete/' . $value['serviceNumber'] . ' " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
                                echo '</tr>';
                            }
                            ?></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>