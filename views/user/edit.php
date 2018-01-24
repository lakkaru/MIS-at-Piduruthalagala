<!--for editing confirm dialog-->
<div id="confirmDialog" hidden="" title="Confirmation Required">
    <p>Do you want to edit <b id="conName"></b> as a <b id="conRole"></b> in the system?</p>
</div>

<div class="row well">
    <div class="col-lg-4">
        <div class="col-lg-12">
            <legend class="lead">Edit User</legend>
        </div>
        <form class="form-horizontal well" id="userForm" method="post" action="<?php echo URL; ?>user/editSave/<?php echo $this->user[0]['serviceNumber']; ?>" >

            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="name" class="control-label"><span class="badge">Name</span></label>
                </div>
                <div class="col-lg-8">
                    <input id="name" type="text"  class="form-control" name="name" value="<?php echo $this->user[0]['name']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="serviceNumber" class="control-label"><span class="badge">Service Number</span></label>
                </div>
                <div class="col-lg-8">
                    <input id="serviceNumber" type="text" class="form-control"  name="serviceNumber"  value="<?php echo $this->user[0]['serviceNumber']; ?>" style="width: 80px">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="email" class="control-label" ><span class="badge">Email</span></label>   
                </div>
                <div class="col-lg-8">
                    <input id="email" type="email" class="form-control" name="email" value="<?php echo $this->user[0]['email']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="mobile" class="control-label"><span class="badge">Mobile</span></label>
                </div>
                <div class="col-lg-8">
                    <input id="mobile" type="tel" class="form-control" name="mobile" value="<?php echo $this->user[0]['mobile']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label class="control-label" for="code"><span class="badge">Code Letter</span></label>
                </div>
                <div class="controls text-right col-lg-8">
                    <select name="code" id="editCode" class="form-control"  style="width: 90px">                      
                        <option <?php if ($this->user[0]['code'] == 'A') echo 'selected' ?> value="A">A</option>
                        <option <?php if ($this->user[0]['code'] == 'B') echo 'selected' ?> value="B">B</option>
                        <option <?php if ($this->user[0]['code'] == 'C') echo 'selected' ?> value="C">C</option>
                        <option <?php if ($this->user[0]['code'] == 'D') echo 'selected' ?> value="D">D</option>
                        <option <?php if ($this->user[0]['code'] == 'E') echo 'selected' ?> value="E">E</option>
                        <option <?php if ($this->user[0]['code'] == 'F') echo 'selected' ?> value="F">F</option>
                        <option <?php if ($this->user[0]['code'] == 'O') echo 'selected' ?> value="O">O</option>
                        <option <?php if ($this->user[0]['code'] == 'Inac') echo 'selected' ?> value="Inac">Inac</option>
                    </select>
                </div>
            </div>
            <div>
                <p hidden id="codeUser" class="control-label"></p>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label class="control-label" for="role"><span class="badge">User role</span></label>
                </div>
                <div class="controls text-right col-lg-8">
                    <select name="role" id="role" class="form-control" style="width: 90px" >
                        <!--<option value="" disabled="" selected="">Select</option>-->
                        <option <?php if ($this->user[0]['role'] == 'admin') echo 'selected' ?> value="admin">Admin</option>
                        <option <?php if ($this->user[0]['role'] == 'user') echo 'selected' ?> value="user">User</option>
                    </select>
            </div>
            </div>
            <div class="form-group">       
                <div class="text-right col-lg-12">
                    <div id="addUserGroup" class="btn-group" role="group">
                        <button type="button" id="user" class="btn btn-success"   style="width: 100px" >Edit <span class="glyphicon glyphicon-edit"></span></button>
                    </div> 
                    <a href="<?php echo URL . 'user'; ?>"><span class="glyphicon glyphicon-backward" ></span>&nbsp;Back&nbsp;<span class="glyphicon glyphicon-backward" ></span></a>
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