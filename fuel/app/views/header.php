<?php

/*
 *  .----------------.  .----------------.  .----------------.  .----------------.  .----------------.  .-----------------.
 * | .--------------. || .--------------. || .--------------. || .--------------. || .--------------. || .--------------. |
 * | |   ________   | || |      __      | || |   ______     | || | ____    ____ | || |     _____    | || | ____  _____  | |
 * | |  |  __   _|  | || |     /  \     | || |  |_   _ \    | || ||_   \  /   _|| || |    |_   _|   | || ||_   \|_   _| | |
 * | |  |_/  / /    | || |    / /\ \    | || |    | |_) |   | || |  |   \/   |  | || |      | |     | || |  |   \ | |   | |
 * | |     .'.' _   | || |   / ____ \   | || |    |  __'.   | || |  | |\  /| |  | || |      | |     | || |  | |\ \| |   | |
 * | |   _/ /__/ |  | || | _/ /    \ \_ | || |   _| |__) |  | || | _| |_\/_| |_ | || |     _| |_    | || | _| |_\   |_  | |
 * | |  |________|  | || ||____|  |____|| || |  |_______/   | || ||_____||_____|| || |    |_____|   | || ||_____|\____| | |
 * | |              | || |              | || |              | || |              | || |              | || |              | |
 * | '--------------' || '--------------' || '--------------' || '--------------' || '--------------' || '--------------' |
 * '----------------'  '----------------'  '----------------'  '----------------'  '----------------'  '----------------' 
 *
 * The free and open source Zabbix frontend.
 *
 * Created by:
 * Solved-IT (www.solved-it.nu)
 * 
 * This is the header
 * 
 */
?>
<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>IT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="/Zabmin/public/assets/img/SOLVEDITlogo_ME.png"></i></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <?php
                /*
                 * Do we have the latest events ?
                 */
                if (isset($latestEvents)) {
                    $numberOfLatestEvents = count($latestEvents);
                    ?>
                    <!--Zabbix Events notification -->
                    <li class="dropdown notifications-menu">
                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                            <i class = "fa fa-bell-o"></i>
                            <span class = "label label-warning"><?= $numberOfLatestEvents ?></span>
                        </a>
                        <ul class = "dropdown-menu">
                            <li class = "header">The <?= $numberOfLatestEvents ?> latest alerts</li>
                            <li>
                                <!--inner menu: contains the actual data -->
                                <ul class = "menu">
                                    <?php
                                    foreach ($latestEvents as $event) {
                                        echo '<li>';
                                        echo '<a href = "#">';
                                        switch ($event->value) {
                                            case 0:
                                                echo '<i class = "fa fa-check text-green"></i>';
                                                break;
                                            case 1:
                                                echo '<i class = "fa fa-warning text-red"></i>';
                                                break;
                                            case 2:
                                                echo '<i class = "fa fa-search-plus text-yellow"></i>';
                                                break;
                                            case 3:
                                                echo '<i class = "fa fa-warning text-red"></i>';
                                                break;
                                        }
                                        echo str_replace("{HOST.NAME}", $event->hosts[0]->name, $event->relatedObject->description);
                                        echo '</a>';
                                        echo '</li>';
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class = "footer"><a href = "/alerts">View all</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
                <!--Control Sidebar Toggle Button -->
                <li>
                    <a href = "#" data-toggle = "control-sidebar"><i class = "fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>