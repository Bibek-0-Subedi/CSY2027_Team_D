<?php if (($this->session->userdata('type')) == 1) { ?>

    <div class="container-fluid ml-2 mr-2">
        <!-- begin create table header  -->
        <div class="row border-bottom my-2">
            <h2>Create Time Table</h2>
        </div>
        <!-- end create table header  -->
        <div class="row mt-1">
            <div class="container-fluid">
                <?php echo form_open('admin/createTimeTable/' . $timetable['routine_id'], ['class' => 'form-inline']); ?>
                <!-- begin TimeTable -->
                <table class="table table-striped table-bordered table-hover">

                    <thead>
                        <tr class="row">
                            <th style="width: 11%">Days/Time
                                <input type="hidden" class="form-control col-10 mb-2" name="r0c0" value="Day/Time">
                            </th>
                            <th style="width: 12.5%">
                                <input type="'text'" class="form-control col-10 mb-2" name="r0c1" value="" placeholder="Time">
                            </th>
                            <th style="width: 12.5%">
                                <input type="'text'" class="form-control col-10 mb-2" name="r0c2" value="" placeholder="Time">
                            </th>
                            <th style="width: 12.5%">
                                <input type="'text'" class="form-control col-10 mb-2" name="r0c3" value="" placeholder="Time">
                            </th>
                            <th style="width: 12.5%">
                                <input type="'text'" class="form-control col-10 mb-2" name="r0c4" value="" placeholder="Time">
                            </th>
                            <th style="width: 12.5%">
                                <input type="'text'" class="form-control col-10 mb-2" name="r0c5" value="" placeholder="Time">
                            </th>
                            <th style="width: 12.5%">
                                <input type="'text'" class="form-control col-10 mb-2" name="r0c6" value="" placeholder="Time">
                            </th>
                            <th style="width: 12.5%">
                                <input type="'text'" class="form-control col-10 mb-2" name="r0c7" value="" placeholder="Time">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($row = 1; $row <= 6; $row++) { ?>
                            <tr class="row">
                                <td style="width: 11%;">
                                    <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c0' ?>" placeholder="Day">
                                </td>
                                <td style="width: 12.5%;">
                                    <?php for ($col = 0; $col <= 3; $col++) { ?>
                                        <?php if ($col == 0) { ?>
                                            <select class="form-control col-sm-10 mb-2" name='<?= 'r' . $row . 'c1r' . $col ?>'>
                                                <option value="" selected>Module</option>
                                                <?php foreach ($modules as $mod) { ?>
                                                    <option value="<?= $mod['module_code'] ?>"><?= $mod['module_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        <?php    } else { ?>
                                            <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c1r' . $col ?>">
                                    <?php }
                                    } ?>
                                </td>
                                <td style="width: 12.5%;">
                                    <?php for ($col = 0; $col <= 3; $col++) { ?>
                                        <?php if ($col == 0) { ?>
                                            <select class="form-control col-sm-10 mb-2" name='<?= 'r' . $row . 'c2r' . $col ?>'>
                                                <option value="" selected>Module</option>
                                                <?php foreach ($modules as $mod) { ?>
                                                    <option value="<?= $mod['module_code'] ?>"><?= $mod['module_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        <?php    } else { ?>

                                            <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c2r' . $col ?>" >
                                    <?php }
                                    } ?>
                                </td>
                                <td style="width: 12.5%;">
                                    <?php for ($col = 0; $col <= 3; $col++) { ?>
                                        <?php if ($col == 0) { ?>
                                            <select class="form-control col-sm-10 mb-2 " name='<?= 'r' . $row . 'c3r' . $col ?>'>
                                                <option value="" selected>Module</option>
                                                <?php foreach ($modules as $mod) { ?>
                                                    <option value="<?= $mod['module_code'] ?>"><?= $mod['module_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        <?php    } else { ?>

                                            <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c3r' . $col ?>">
                                    <?php }
                                    } ?>
                                </td>
                                <td style="width: 12.5%;">
                                    <?php for ($col = 0; $col <= 3; $col++) { ?>
                                        <?php if ($col == 0) { ?>
                                            <select class="form-control col-sm-10 mb-2" name='<?= 'r' . $row . 'c4r' . $col ?>'>
                                                <option value="" selected>Module</option>
                                                <?php foreach ($modules as $mod) { ?>
                                                    <option value="<?= $mod['module_code'] ?>"><?= $mod['module_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        <?php    } else { ?>

                                            <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c4r' . $col ?>">
                                    <?php }
                                    } ?>
                                </td>
                                <td style="width: 12.5%;">
                                    <?php for ($col = 0; $col <= 3; $col++) { ?>
                                        <?php if ($col == 0) { ?>
                                            <select class="form-control col-sm-10 mb-2" name='<?= 'r' . $row . 'c5r' . $col ?>'>
                                                <option value="" selected>Module</option>
                                                <?php foreach ($modules as $mod) { ?>
                                                    <option value="<?= $mod['module_code'] ?>"><?= $mod['module_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        <?php    } else { ?>

                                            <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c5r' . $col ?>" >
                                    <?php }
                                    } ?>
                                </td>
                                <td style="width: 12.5%;">
                                    <?php for ($col = 0; $col <= 3; $col++) { ?>
                                        <?php if ($col == 0) { ?>
                                            <select class="form-control col-sm-10 mb-2" name='<?= 'r' . $row . 'c6r' . $col ?>'>
                                                <option value="" selected>Module</option>
                                                <?php foreach ($modules as $mod) { ?>
                                                    <option value="<?= $mod['module_code'] ?>"><?= $mod['module_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        <?php    } else { ?>

                                            <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c6r' . $col ?>">
                                    <?php }
                                    } ?>
                                </td>
                                <td style="width: 12.5%;">
                                    <?php for ($col = 0; $col <= 3; $col++) { ?>
                                        <?php if ($col == 0) { ?>
                                            <select class="form-control col-sm-10 mb-2" name='<?= 'r' . $row . 'c7r' . $col ?>'>
                                                <option value="" selected>Module</option>
                                                <?php foreach ($modules as $mod) { ?>
                                                    <option value="<?= $mod['module_code'] ?>"><?= $mod['module_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        <?php    } else { ?>

                                            <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c7r' . $col ?>">
                                    <?php }
                                    } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- </div> -->

                <input type="submit" class="btn btn-primary mt-4 mb-4" name="createTable" value="Create">
                <!-- end TimeTable -->
                </form>
            </div>
        </div>
    </div>
<?php } else {
    redirect('admin/login');
} ?>