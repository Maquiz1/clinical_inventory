        <div class="leftside-menu">

            <!-- Brand Logo Light -->
            <a href="index.php" class="logo logo-light">
                <span class="logo-lg">
                    <img src="assets/images/logo.png" alt="logo">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="small logo">
                </span>
            </a>

            <!-- Brand Logo Dark -->
            <a href="index.php" class="logo logo-dark">
                <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="dark logo">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="small logo">
                </span>
            </a>

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title">Main</li>

                    <li class="side-nav-item">
                        <a href="index.php" class="side-nav-link">
                            <i class="ri-dashboard-3-line"></i>
                            <span class="badge bg-success float-end">9+</span>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#generic" aria-expanded="false" aria-controls="generic" class="side-nav-link">
                            <i class="ri-share-line"></i>
                            <span>Give Item New Name </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="generic">
                            <ul class="side-nav-second-level">
                                <?php
                                $x = 1;
                                foreach ($override->get('use_group', 'status', 1) as $categoryG) {
                                ?>
                                    <li>
                                        <a href="add.php?id=1&category=<?= $categoryG['id']; ?>&btn=Add"><?= $categoryG['name']; ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#Batch" aria-expanded="false" aria-controls="Batch" class="side-nav-link">
                            <i class="ri-share-line"></i>
                            <span>Add New Batches </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="Batch">
                            <ul class="side-nav-second-level">
                                <?php
                                foreach ($override->get('use_group', 'status', 1) as $categoryB) {
                                ?>
                                    <li>
                                        <a href="add.php?id=2&category=<?= $categoryB['id']; ?>&btn=Add"><?= $categoryB['name']; ?></a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#Mgeneric" aria-expanded="false" aria-controls="generic" class="side-nav-link">
                            <i class="ri-share-line"></i>
                            <span>Manges Items </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="Mgeneric">
                            <ul class="side-nav-second-level">
                                <?php
                                $x = 1;
                                foreach ($override->get('use_group', 'status', 1) as $categoryM) {
                                ?>
                                    <li>
                                        <a href="info.php?id=1&category=<?= $categoryM['id']; ?>"><?= $categoryM['name']; ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#Lgeneric" aria-expanded="false" aria-controls="generic" class="side-nav-link">
                            <i class="ri-share-line"></i>
                            <span>List of all Items </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="Lgeneric">
                            <ul class="side-nav-second-level">
                                <?php
                                $x = 1;
                                foreach ($override->get('use_group', 'status', 1) as $categoryM) {
                                ?>
                                    <li>
                                        <a href="info.php?id=6&category=<?= $categoryM['id']; ?>"><?= $categoryM['name']; ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#CheckingCalibration" aria-expanded="false" aria-controls="CheckingCalibration" class="side-nav-link">
                            <i class="ri-share-line"></i>
                            <span> Checking / Calibration </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="CheckingCalibration">
                            <ul class="side-nav-second-level">
                                <li class="side-nav-item">
                                    <a data-bs-toggle="collapse" href="#TodaysChecks" aria-expanded="false" aria-controls="TodaysChecks">
                                        <span> Todays Checks</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="TodaysChecks">
                                        <ul class="side-nav-second-level">
                                            <?php
                                            foreach ($override->get('use_group', 'status', 1) as $categoryT) {
                                            ?>
                                                <a href="info.php?id=4&category=<?= $categoryT['id']; ?>&visit_status=0"><?= $categoryT['name']; ?></a>

                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="side-nav-item">
                                    <a data-bs-toggle="collapse" href="#Checked" aria-expanded="false" aria-controls="Checked">
                                        <span> Checked</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="Checked">
                                        <ul class="side-nav-second-level">
                                            <?php
                                            foreach ($override->get('use_group', 'status', 1) as $categoryC) {
                                            ?>
                                                <a href="info.php?id=4&category=<?= $categoryC['id']; ?>&visit_status=1"><?= $categoryC['name']; ?></a>

                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="side-nav-item">
                                    <a data-bs-toggle="collapse" href="#NotChecked" aria-expanded="false" aria-controls="NotChecked">
                                        <span>Not Checked</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="NotChecked">
                                        <ul class="side-nav-second-level">
                                            <?php
                                            $x = 1;
                                            foreach ($override->get('use_group', 'status', 1) as $categoryN) {
                                            ?>
                                                <a href="info.php?id=4&category=<?= $categoryN['id']; ?>&visit_status=0"><?= $categoryN['name']; ?></a>

                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#Expiration" aria-expanded="false" aria-controls="Expiration" class="side-nav-link">
                            <i class="ri-share-line"></i>
                            <span> Valid / Expired </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="Expiration">
                            <ul class="side-nav-second-level">
                                <li class="side-nav-item">
                                    <a data-bs-toggle="collapse" href="#Expired" aria-expanded="false" aria-controls="Expired">
                                        <span> Expired </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="Expired">
                                        <ul class="side-nav-second-level">
                                            <?php
                                            $x = 1;
                                            foreach ($override->get('use_group', 'status', 1) as $categoryE) {
                                            ?>
                                                <li>
                                                    <a href="info.php?id=5&category=<?= $categoryE['id']; ?>&expiration=expired"><?= $categoryE['name']; ?></a>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <ul class="side-nav-second-level">
                                <li class="side-nav-item">
                                    <a data-bs-toggle="collapse" href="#Valid" aria-expanded="false" aria-controls="Valid">
                                        <span> Valid </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="Valid">
                                        <ul class="side-nav-second-level">
                                            <?php
                                            $x = 1;
                                            foreach ($override->get('use_group', 'status', 1) as $categoryV) {
                                            ?>
                                                <li>
                                                    <a href="info.php?id=5&category=<?= $categoryV['id']; ?>&expiration=valid"><?= $categoryV['name']; ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#Reports" aria-expanded="false" aria-controls="Reports" class="side-nav-link">
                            <i class="ri-share-line"></i>
                            <span> Reports </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="Reports">
                            <ul class="side-nav-second-level">
                                <li class="side-nav-item">
                                    <a data-bs-toggle="collapse" href="#Reports1" aria-expanded="false" aria-controls="Reports1">
                                        <span> Reports 1 </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="Reports1">
                                        <ul class="side-nav-second-level">
                                            <?php
                                            $x = 1;
                                            foreach ($override->get('use_group', 'status', 1) as $categoryR1) {
                                            ?>
                                                <li>
                                                    <a href="report5.php?report=0&category=<?= $categoryR1['id']; ?>"><?= $categoryR1['name']; ?></a>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </li>
                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>