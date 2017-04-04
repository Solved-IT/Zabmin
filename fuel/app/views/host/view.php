<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Host: <?= $host[0]->name ?></h1>
        <?php
        if ($host[0]->error != "") {
            echo "<small>" . $host[0]->error . "</small>";
        }
        ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Display row with most important information -->
        <div class="row">
            <!-- triggers box -->
            <!--Percentage of memory free -->
            <?php
            // Count number of triggers
            $numTriggers = count($triggers);
            if ($numTriggers > 100) {
                $numTriggers = 100;
            }
            ?>
            <div class = "col-lg-3 col-xs-6">
                <!-- small box red or green, depending on triggers -->
                <?php
                if ($numTriggers > 0) {
                    echo '<div class="info-box bg-red">';
                    echo '<span class="info-box-icon"><i class="fa fa-exclamation-triangle"></i></span>';
                } else {
                    echo '<div class="info-box bg-green">';
                    echo '<span class="info-box-icon"><i class="fa fa-check-square-o"></i></span>';
                }
                ?>
                <div class="info-box-content">
                    <span class="info-box-text">Number of active triggers</span>
                    <span class="info-box-number"><?= $numTriggers ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: <?= $numTriggers ?>%"></div>
                    </div>
                    <span class="progress-description">
                        <a href="/host/triggers/<?= $hostid ?>">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </span>
                </div> 
            </div>
        </div>

        <!--Percentage of memory free -->
        <div class = "col-lg-3 col-xs-6">
            <?php
            $hostViewMemoryUsage = Config::get('hostViewMemoryUsage');
            
            if (array_key_exists($hostViewMemoryUsage, $items)) {
                $freeVirtMemName = $items[$hostViewMemoryUsage]->name;
                $freeVirtMemValue = round($items[$hostViewMemoryUsage]->lastvalue);
                $freeVirtMemLastCheck = date("d-m-Y H:i:s", $items[$hostViewMemoryUsage]->lastclock);
                ?>

                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-ticket"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?= $freeVirtMemName ?></span>
                        <span class="info-box-number"><?= $freeVirtMemValue ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?= $freeVirtMemValue ?>%"></div>
                        </div>
                        <span class="progress-description">
                            Last check: <?= $freeVirtMemLastCheck ?>
                        </span>
                    </div> 
                </div>
                <?php
            } else {
                ?>
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-red"><i class="fa fa-exclamation"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">No virtual memory counter</span>
                        <span class="info-box-number">Please check settings or Zabbix configuration</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                <?php
            }
            ?>
        </div>
        <!--CPU usage, 1 minute average -->
        <?php
        $hostViewProcLoad = Config::get('hostViewProcLoad');
        
        if (array_key_exists($hostViewProcLoad, $items)) {
            $procLoadName = $items[$hostViewProcLoad]->name;
            $procLoadValue = round($items[$hostViewProcLoad]->lastvalue);
            $procLoadLastCheck = date("d-m-Y H:i:s", $items[$hostViewProcLoad]->lastclock);
            ?>
            <div class = "col-lg-3 col-xs-6">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-desktop"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?= $procLoadName ?></span>
                        <span class="info-box-number"><?= $procLoadValue ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?= $procLoadValue ?>%"></div>
                        </div>
                        <span class="progress-description">
                            Last check: <?= $procLoadLastCheck ?>
                        </span>
                    </div> 
                </div>
            </div>
            <?php
        }
        ?>

        <!--Free disk space on first hdd -->
        <?php
        if (array_key_exists("Free disk space on $1 (percentage)", $items)) {
            $freeDiskSpaceName = $items["Free disk space on $1 (percentage)"]->name;
            $freeDiskSpaceValue = round($items["Free disk space on $1 (percentage)"]->lastvalue);
            $freeDiskSpaceLastCheck = date("d-m-Y H:i:s", $items["Free disk space on $1 (percentage)"]->lastclock);
            ?>
            <div class = "col-lg-3 col-xs-6">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-save"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?= $freeDiskSpaceName ?></span>
                        <span class="info-box-number"><?= $freeDiskSpaceValue ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?= $freeDiskSpaceValue ?>%"></div>
                        </div>
                        <span class="progress-description">
                            Last check: <?= $freeDiskSpaceLastCheck ?>
                        </span>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Host ID</th>
                                    <th>Hostname</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($items as $item) {
                                    echo "<tr>";
                                    echo "<td>" . $item->itemid . "</td>";
                                    echo "<td>" . $item->name . "</td>";
                                    echo "<td>" . $item->lastvalue . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <pre>
                            <?php var_dump($latestEvents); ?>
                        </pre>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
