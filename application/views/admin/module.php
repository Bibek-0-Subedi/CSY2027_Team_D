<div class="container-fluid mx-3">
    <!-- <div class="mt-2"> -->
    <div class="row border-bottom my-2">
        <h2>Module</h2>
    </div>
        <!-- add Module button -->
        <div class="row mt-3 mb-5 bg-light py-4 rounded">
            <!-- <a href="staffDetail" class="btn btn-primary">Add Module</a> -->
            <div class="col-md-9 text-info pt-3 d-flex">
                <div class="large-icon px-4">
                    <i class="fas fa-book-open"></i>
                </div> 
                <div>
                    <h4>Total Modules</h4>
                    <h1 class="big-icon ml-5"><?= count($modules) ?></h1>
                </div>
            </div>
            <div class="col-md-2">
              <a href="moduleDetail" class="btn text-primary border border-primary">
                  <div class="medium-icon px-5">
                      <i class="fa fa-user-plus"></i>
                  </div>    
                  <h5>Add Module</h5>
              </a>
          </div>
        </div>
        <!-- add module button  -->
        <?php
            if (!empty($this->session->flashdata('archived'))) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('archived'); ?>
            </div>
        <?php } elseif (!empty($this->session->flashdata('edited'))) {?> 
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('edited'); ?>
            </div>
        <?php }elseif (!empty($this->session->flashdata('added'))) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('added'); ?>
            </div>
        <?php } elseif (!empty($this->session->flashdata('deleted'))) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('deleted'); ?>
            </div>
        <?php } ?>
        <div class="row mt-4">
            <div class="col-lg-9 mb-4">
            <?php echo form_open('admin/module/', ['class' => 'form-inline']); ?>
                    <select class="custom-select col-sm-2 mr-3" name='course_code'>
                            <option value="null" >Course</option>
                            <?php foreach ($course as $crse) { ?>
                                <option value="<?= $crse['course_code'] ?>" <?php if (isset($_POST['course_code']) && $_POST['course_code'] == $crse['course_code']) echo "selected" ; ?>><?= $crse['course_name'] ?></option>
                            <?php } ?>
                    </select>
                    <button class="btn btn-info my-2 my-sm-0 mr-2" type="submit" name="filter">Filter</button>
                    <a href="" class="btn btn-secondary my-2 my-sm-0" type="button">Clear</a>
                </form>
            </div>
        </div>
        <!-- end filter and search post  -->
        <!-- begin table structure -->
        <div class="row mt-3 ">
            <div class="container-fluid">
                <table id="moduleTable" 
                        class="table table-striped  table-bordered table-hover" 
                        data-url="json/data1.json" 
                        data-filter-control="true">
                    <thead>
                        <tr>
                            <th>Module Code</th>
                            <th data-filter-control="select">Module Name</th>
                            <th data-filter-control="select">Duration</th>
                            <th data-filter-control="select">Module Leader</th>
                            <th data-filter-control="select">Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($modules as $module) { ?>
                            <tr>
                                <td><?= $module['module_code'] ?></td>
                                <td><?= $module['module_name'] ?></td>
                                <td><?= $module['module_duration'] ?></td>
                                <td>
                                    <?php if ($module['module_leader']) {
                                            echo $module['firstname'] .' ' . $module['surname'] ;
                                    }else {
                                            echo "Not Assigned";
                                    } ?>
                                </td>
                                <td><?= $module['course_name'] ?></td>
                                <td style="display: flex; justify-content: space-around;">
                                    <a href="moduleDetail/<?php echo $module['module_code']; ?>" class="btn btn-success">Edit</a>
                                    <?php echo form_open('admin/module/'.$module['module_code'] ); ?>
                                        <input type="submit" class="btn btn-info" name="archive" onclick="return checkArchive()" value="Archive">
                                    </form>
                                    <?php echo form_open('admin/module/'.$module['module_code'] ); ?>
                                        <input type="submit" class="btn btn-danger" name="delete" onclick="return checkDelete()" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#moduleTable').DataTable();
                    });
                    function checkDelete(){
                        return confirm('Do you really want to delete this Module ?');
                    }
                    function checkArchive(){
                        return confirm('Do you really want to archive this Module ?');
                    }
                </script>
            </div>
        </div>
    </div>
</div>
