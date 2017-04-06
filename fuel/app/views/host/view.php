<?php
if ($data['host'][0]->error != "") {
    echo "<small>" . $data['host'][0]->error . "</small>";
}
?>
<!-- Display row with most important information -->
<div class="row">

    <?php
    /*
     * Triggers box
     */
    $numTriggers = count($data['triggers']);
    if ($numTriggers > 100) {
        $numTriggers = 100;
    }

    echo '<div class = "col-lg-3 col-xs-6">';

    if ($numTriggers > 0) {
        echo '<div class="info-box bg-red">';
        echo '<span class="info-box-icon"><i class="fa fa-exclamation-triangle"></i></span>';
    } else {
        echo '<div class="info-box bg-green">';
        echo '<span class="info-box-icon"><i class="fa fa-check-square-o"></i></span>';
    }

    echo '<div class="info-box-content">';
    echo '<span class="info-box-text">Number of active triggers</span>';
    echo '<span class="info-box-number"><?= $numTriggers ?></span>';
    echo '<div class="progress">';
    echo '<div class="progress-bar" style="width: ' . $numTriggers . '%"></div>';
    echo '</div>';
    echo '<span class="progress-description"><a href="' . BASEURL . '/host/triggers/' . $hostid . '">More info <i class="fa fa-arrow-circle-right"></i></a></span>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    /*
     * Memory free box
     */
    echo '<div class = "col-lg-3 col-xs-6">';

    $dataViewMemoryUsage = Config::get('hostViewMemoryUsage');

    if (array_key_exists($dataViewMemoryUsage, $data['items'])) {
        $freeVirtMemName = $data['items'][$dataViewMemoryUsage]->name;
        $freeVirtMemValue = round($data['items'][$dataViewMemoryUsage]->lastvalue);
        $freeVirtMemLastCheck = date("d-m-Y H:i:s", $data['items'][$dataViewMemoryUsage]->lastclock);

        echo '<div class="info-box bg-aqua">';
        echo '<span class="info-box-icon"><i class="fa fa-ticket"></i></span>';
        echo '<div class="info-box-content">';
        echo '<span class="info-box-text">' . $freeVirtMemName . '</span>';
        echo '<span class="info-box-number">' . $freeVirtMemValue . '</span>';
        echo '<div class="progress">';
        echo '<div class="progress-bar" style="width: ' . $freeVirtMemValue . '%"></div>';
        echo '</div>';
        echo '<span class="progress-description">Last check: ' . $freeVirtMemLastCheck . '</span>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="info-box">';
        echo '<span class="info-box-icon bg-red"><i class="fa fa-exclamation"></i></span>';
        echo '<div class="info-box-content">';
        echo '<span class="info-box-text">No virtual memory counter</span>';
        echo '<span class="info-box-number">Please check settings or Zabbix configuration</span>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';

    /*
     * CPU usage, 1 minute average -->
     */
    echo '<div class = "col-lg-3 col-xs-6">';

    $dataViewProcLoad = Config::get('hostViewProcLoad');

    if (in_array($dataViewProcLoad, $data['items'])) {
        $procLoadName = $data['items'][$dataViewProcLoad]->name;
        $procLoadValue = round($data['items'][$dataViewProcLoad]->lastvalue);
        $procLoadLastCheck = date("d-m-Y H:i:s", $data['items'][$dataViewProcLoad]->lastclock);

        echo '<div class="info-box bg-aqua">';
        echo '<span class="info-box-icon"><i class="fa fa-desktop"></i></span>';
        echo '<div class="info-box-content">';
        echo '<span class="info-box-text">' . $procLoadName . '</span>';
        echo '<span class="info-box-number">' . $procLoadValue . '</span>';

        echo '<div class="progress">';
        echo '<div class="progress-bar" style="width: ' . $procLoadValue . '%"></div>';
        echo '</div>';
        echo '<span class="progress-description">Last check: ' . $procLoadLastCheck . '</span>';
        echo '</div> ';
        echo '</div>';
    } else {
        echo '<div class="info-box">';
        echo '<span class="info-box-icon bg-red"><i class="fa fa-exclamation"></i></span>';
        echo '<div class="info-box-content">';
        echo '<span class="info-box-text">No CPU counter</span>';
        echo '<span class="info-box-number">Please check settings or Zabbix configuration</span>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';

    /*
     * Free disk space on first hdd
     */
    echo '<div class="col-lg-3 col-xs-6">';

    $dataViewDiskUsage = Config::get('hostViewDiskUsage');
    
    if (array_key_exists($dataViewDiskUsage, $data['items'])) {
        $freeDiskSpaceName = $data['items'][$dataViewDiskUsage]->name;
        $freeDiskSpaceValue = round($data['items'][$dataViewDiskUsage]->lastvalue);
        $freeDiskSpaceLastCheck = date("d-m-Y H:i:s", $data['items'][$dataViewDiskUsage]->lastclock);

        echo '<div class="info-box bg-aqua">';
        echo '<span class="info-box-icon"><i class="fa fa-save"></i></span>';
        echo '<div class="info-box-content">';
        echo '<span class="info-box-text">' . $freeDiskSpaceName . '</span>';
        echo '<span class="info-box-number">' . $freeDiskSpaceValue . '</span>';
        echo '<div class="progress">';
        echo '<div class="progress-bar" style="width: ' . $freeDiskSpaceValue . '%"></div>';
        echo '</div>';
        echo '<span class="progress-description">Last check: ' . $freeDiskSpaceLastCheck . '</span>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="info-box">';
        echo '<span class="info-box-icon bg-red"><i class="fa fa-exclamation"></i></span>';
        echo '<div class="info-box-content">';
        echo '<span class="info-box-text">No HDD counter</span>';
        echo '<span class="info-box-number">Please check settings or Zabbix configuration</span>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    ?>
</div>

<div class="row">
    <div class="col-lg-6 col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Host ID</th>
                            <th>Hostname</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data['items'] as $item) {
                            echo "<tr>";
                            echo "<td>" . $item->itemid . "</td>";
                            echo "<td>" . $item->name . "</td>";
                            echo "<td>" . $item->lastvalue . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <!-- Triggers timeline -->
    <div class="col-lg-6 col-xs-12">
        <ul class="timeline">
            <?php
            foreach ($data['triggers'] as $trigger) {
                echo '<li>';
                switch ($trigger->priority) {
                    case 0:
                        echo '<i class="fa fa-exclamation bg-blue"></i>';
                        break;
                    case 1:
                        echo '<i class="fa fa-exclamation bg-green"></i>';
                        break;
                    case 2:
                        echo '<i class="fa fa-exclamation bg-yellow"></i>';
                        break;
                    case 3:
                        echo '<i class="fa fa-exclamation bg-orange"></i>';
                        break;
                    case 4:
                        echo '<i class="fa fa-exclamation bg-red"></i>';
                        break;
                    case 5:
                        echo '<i class="fa fa-exclamation bg-black"></i>';
                        break;
                }

                echo '<div class="timeline-item">';
                echo '<span class="time"><i class="fa fa-clock-o"></i> ' . date(Config::get('dateTimeFormat'), $trigger->lastchange) . '</span>';
                echo '<h3 class="timeline-header">' . $trigger->description . '</h3>';
                echo '<div class="timeline-body">';
                echo '';
                echo '</div>';
                echo '<div class="timeline-footer">';
                echo '<a class="btn btn-primary btn-xs">Read more</a>';
                echo '<a class="btn btn-danger btn-xs">Delete</a>';
                echo '</div>';
                echo '</div>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>
</div>
