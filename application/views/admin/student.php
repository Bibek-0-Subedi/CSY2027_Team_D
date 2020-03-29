<div class="container-fluid">
        <div class="pl-sm-2 pr-sm-2 mt-2">
            <div class="row">
                <h3>Students</h3>
            </div>
            <div class="row mt-4">
                <div class="col-lg-9 ml-n3">
                    <form class="form-inline" method="POST">
                        <select class="custom-select mr-sm-2">
                        <option selected>Level</option>
                        <option value="level4">Level 4</option>
                        <option value="level5">Level 5</option>
                        </select>
                        <select class="custom-select mr-sm-2">
                        <option selected>Course</option>
                        <option value="course1">Course 1</option>
                        <option value="course2">Course 2</option>
                        </select>
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" name="filter">Filter</button>
                    </form>
                </div>
                <div class="col-lg-3 ml-auto">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search">
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" name="searchPost">Search Post</button>
                    </form>
                </div>
            </div>
            <!-- end filter and search post  -->
            <!-- begin table structure -->
            <div class="row mt-3 bg-content pl-sm-1">
                <?php
                    echo ($students);

                ?>
            </div>
        </div>
    </div>
    