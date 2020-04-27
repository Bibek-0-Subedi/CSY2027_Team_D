<?php if (($this->session->userdata('type')) == 1) { ?>
<div class="container-fluid ml-2 mr-2">
    <!-- begin create table header  -->
    <div class="row border-bottom my-2">
        <h2>View Time Table</h2>
    </div>
    <!-- end create table header  -->
    <div class="row mt-1">
        <div class="container-fluid">
            <!-- begin first column -->
            <table class="table table-striped table-bordered table-hover">

                <thead>
                    <tr class="row">
                        <th style="width: 11%"><?= $timetable[0][0] ?></th>
                        <th style="width: 12.5%"><?= $timetable[0][1] ?></th>
                        <th style="width: 12.5%"><?= $timetable[0][2] ?></th>
                        <th style="width: 12.5%"><?= $timetable[0][3] ?></th>
                        <th style="width: 12.5%"><?= $timetable[0][4] ?></th>
                        <th style="width: 12.5%"><?= $timetable[0][5] ?></th>
                        <th style="width: 12.5%"><?= $timetable[0][6] ?></th>
                        <th style="width: 12.5%"><?= $timetable[0][7] ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($row = 1; $row <= 6; $row++) { ?>
                        <tr class="row">
                            <td style="width: 11%;">
                                <?= $timetable[$row][0]?> 
                            </td>
                            <td style="width: 12.5%;">
                                <?php for ($col=0; $col <= 3; $col++){?> 
                                    <?= $timetable[$row][1][$col] ?>
                                    <br>
                                <?php }?>
                            </td>
                            <td style="width: 12.5%;">
                                <?php for ($col=0; $col <= 3; $col++){?> 
                                    <?= $timetable[$row][2][$col] ?>
                                    <br>
                                <?php }?>
                            </td>
                            <td style="width: 12.5%;">
                                <?php for ($col=0; $col <= 3; $col++){?> 
                                    <?= $timetable[$row][3][$col] ?>
                                    <br>
                                <?php }?>
                            </td>
                            <td style="width: 12.5%;">
                                <?php for ($col=0; $col <= 3; $col++){?> 
                                    <?= $timetable[$row][4][$col] ?>
                                    <br>
                                <?php }?>
                            </td>
                            <td style="width: 12.5%;">
                                <?php for ($col=0; $col <= 3; $col++){?> 
                                    <?= $timetable[$row][5][$col] ?>
                                    <br>
                                <?php }?>
                            </td>
                            <td style="width: 12.5%;">
                                <?php for ($col=0; $col <= 3; $col++){?> 
                                    <?= $timetable[$row][6][$col] ?>
                                    <br>
                                <?php }?>
                            </td>
                            <td style="width: 12.5%;">
                                <?php for ($col=0; $col <= 3; $col++){?> 
                                    <?= $timetable[$row][7][$col] ?>
                                    <br>
                                <?php }?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- </div> -->
        </div>
    </div>
</div>
<?php } else {
redirect('admin/login');
} ?>