<div class="container-fluid ml-2 mr-2">
    <!-- begin create table header  -->
    <div class="row border-bottom my-2">
        <h2>Create Time Table</h2>
    </div>
    <!-- end create table header  -->
    <div class="row mt-1">
        <div class="container-fluid">
            <?php echo form_open('admin/editTimeTable/' . $timetable['routine_id'], ['class' => 'form-inline']); ?>
            <!-- begin TimeTable -->
            <table class="table table-striped table-bordered table-hover">

                <thead>
                    <tr class="row">
                        <th style="width: 11%">Days/Time
                            <input type="hidden" class="form-control col-10 mb-2" name="r0c0" value="Day?Time">
                        </th>
                        <th style="width: 12.5%">
                            <input type="'text'" class="form-control col-10 mb-2" name="r0c1" value="<?= $schedule[0][1] ?>">
                        </th>
                        <th style="width: 12.5%">
                            <input type="'text'" class="form-control col-10 mb-2" name="r0c2" value="<?= $schedule[0][2] ?>">
                        </th>
                        <th style="width: 12.5%">
                            <input type="'text'" class="form-control col-10 mb-2" name="r0c3" value="<?= $schedule[0][3] ?>">
                        </th>
                        <th style="width: 12.5%">
                            <input type="'text'" class="form-control col-10 mb-2" name="r0c4" value="<?= $schedule[0][4] ?>">
                        </th>
                        <th style="width: 12.5%">
                            <input type="'text'" class="form-control col-10 mb-2" name="r0c5" value="<?= $schedule[0][5] ?>">
                        </th>
                        <th style="width: 12.5%">
                            <input type="'text'" class="form-control col-10 mb-2" name="r0c6" value="<?= $schedule[0][6] ?>">
                        </th>
                        <th style="width: 12.5%">
                            <input type="'text'" class="form-control col-10 mb-2" name="r0c7" value="<?= $schedule[0][7] ?>">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($row = 1; $row <= 6; $row++) { ?>
                        <tr class="row">
                            <td style="width: 11%;">
                                <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c0' ?>" value="<?= $schedule[$row][0] ?>">
                            </td>
                            <td style="width: 12.5%;">
                                <?php for ($col = 0; $col <= 3; $col++) { ?>
                                    <?php if ($col == 0) { ?>
                                        <select class="form-control col-sm-10 mb-2" name='<?= 'r' . $row . 'c1r' . $col ?>'>
                                            <option value="<?= $schedule[$row][1][$col]?>" selected><?= $schedule[$row][1][$col]?></option>
                                            <?php foreach ($modules as $mod) { ?>
                                                <option value="<?= $mod['module_code'] ?>"><?= $mod['module_code'] ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php    } else { ?>
                                        <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c1r' . $col ?>" value="<?= $schedule[$row][1][$col] ?>">
                                <?php }
                                } ?>
                            </td>
                            <td style="width: 12.5%;">
                                <?php for ($col = 0; $col <= 3; $col++) { ?>
                                    <?php if ($col == 0) { ?>
                                        <select class="form-control col-sm-10 mb-2" name='<?= 'r' . $row . 'c2r' . $col ?>'>
                                        <option value="<?= $schedule[$row][2][$col]?>" selected><?= $schedule[$row][2][$col]?></option>
                                            <?php foreach ($modules as $mod) { ?>
                                                <option value="<?= $mod['module_code'] ?>"><?= $mod['module_code'] ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php    } else { ?>

                                        <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c2r' . $col ?>" value="<?= $schedule[$row][2][$col] ?>" >
                                <?php }
                                } ?>
                            </td>
                            <td style="width: 12.5%;">
                                <?php for ($col = 0; $col <= 3; $col++) { ?>
                                    <?php if ($col == 0) { ?>
                                        <select class="form-control col-sm-10 mb-2 " name='<?= 'r' . $row . 'c3r' . $col ?>'>
                                        <option value="<?= $schedule[$row][3][$col]?>" selected><?= $schedule[$row][3][$col]?></option>
                                            <?php foreach ($modules as $mod) { ?>
                                                <option value="<?= $mod['module_code'] ?>"><?= $mod['module_code'] ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php    } else { ?>

                                        <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c3r' . $col ?>" value="<?= $schedule[$row][3][$col] ?>">
                                <?php }
                                } ?>
                            </td>
                            <td style="width: 12.5%;">
                                <?php for ($col = 0; $col <= 3; $col++) { ?>
                                    <?php if ($col == 0) { ?>
                                        <select class="form-control col-sm-10 mb-2" name='<?= 'r' . $row . 'c4r' . $col ?>'>
                                        <option value="<?= $schedule[$row][4][$col]?>" selected><?= $schedule[$row][4][$col]?></option>
                                            <?php foreach ($modules as $mod) { ?>
                                                <option value="<?= $mod['module_code'] ?>"><?= $mod['module_code'] ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php    } else { ?>

                                        <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c4r' . $col ?>" value="<?= $schedule[$row][4][$col] ?>" >
                                <?php }
                                } ?>
                            </td>
                            <td style="width: 12.5%;">
                                <?php for ($col = 0; $col <= 3; $col++) { ?>
                                    <?php if ($col == 0) { ?>
                                        <select class="form-control col-sm-10 mb-2" name='<?= 'r' . $row . 'c5r' . $col ?>'>
                                        <option value="<?= $schedule[$row][5][$col]?>" selected><?= $schedule[$row][5][$col]?></option>
                                            <?php foreach ($modules as $mod) { ?>
                                                <option value="<?= $mod['module_code'] ?>"><?= $mod['module_code'] ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php    } else { ?>

                                        <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c5r' . $col ?>" value="<?= $schedule[$row][5][$col] ?>">
                                <?php }
                                } ?>
                            </td>
                            <td style="width: 12.5%;">
                                <?php for ($col = 0; $col <= 3; $col++) { ?>
                                    <?php if ($col == 0) { ?>
                                        <select class="form-control col-sm-10 mb-2" name='<?= 'r' . $row . 'c6r' . $col ?>'>
                                        <option value="<?= $schedule[$row][6][$col]?>" selected><?= $schedule[$row][6][$col]?></option>
                                            <?php foreach ($modules as $mod) { ?>
                                                <option value="<?= $mod['module_code'] ?>"><?= $mod['module_code'] ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php    } else { ?>

                                        <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c6r' . $col ?>" value="<?= $schedule[$row][6][$col] ?>">
                                <?php }
                                } ?>
                            </td>
                            <td style="width: 12.5%;">
                                <?php for ($col = 0; $col <= 3; $col++) { ?>
                                    <?php if ($col == 0) { ?>
                                        <select class="form-control col-sm-10 mb-2" name='<?= 'r' . $row . 'c7r' . $col ?>'>
                                        <option value="<?= $schedule[$row][7][$col]?>" selected><?= $schedule[$row][7][$col]?></option>
                                            <?php foreach ($modules as $mod) { ?>
                                                <option value="<?= $mod['module_code'] ?>"><?= $mod['module_code'] ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php    } else { ?>

                                        <input type="'text'" class="form-control col-10 mb-2" name="<?= 'r' . $row . 'c7r' . $col ?>" value="<?= $schedule[$row][7][$col] ?>">
                                <?php }
                                } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- </div> -->

            <input type="submit" class="btn btn-primary mt-4 mb-4" name="editTable" value="Save Edit">
            <!-- end TimeTable -->
            </form>
        </div>
    </div>
</div>