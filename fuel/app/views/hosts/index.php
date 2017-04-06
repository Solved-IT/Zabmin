<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Host ID</th>
                            <th>Hostname</th>
                            <th>Description</th>
                            <th>Connection</th>
                            <th>Availability</th>
                            <th>Triggers</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $host) {
                            echo '<tr class="clickable-row" data-href="' . BASEURL . '/host/' . $host->hostid . '/">';
                            echo "<td>" . $host->hostid . "</td>";
                            echo "<td>" . $host->name . "</td>";
                            echo "<td>" . $host->description . "</td>";

                            /*
                             * Display agent connection
                             * ZBX, SNMP, JMX or IPMI
                             */
                            echo '<td>';
                            if ($host->available != 0) {
                                if ($host->available == 1) {
                                    echo '<span class="badge bg-green">ZBX</span>';
                                }
                                if ($host->available == 2) {
                                    echo '<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="' . $host->error . '"><span class="badge bg-red">ZBX</span></button>';
                                }
                            }
                            if ($host->ipmi_available != 0) {
                                if ($host->ipmi_available == 1) {
                                    echo '<span class="badge bg-green">IPMI</span>';
                                }
                                if ($host->ipmi_available == 2) {
                                    echo '<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="' . $host->ipmi_error . '"><span class="badge bg-red">IPMI</span></button>';
                                }
                            }
                            if ($host->snmp_available != 0) {
                                if ($host->snmp_available == 1) {
                                    echo '<span class="badge bg-green">SNMP</span>';
                                }
                                if ($host->snmp_available == 2) {
                                    echo '<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="' . $host->snmp_error . '"><span class="badge bg-red">SNMP</span></button>';
                                }
                            }
                            if ($host->jmx_available != 0) {
                                if ($host->jmx_available == 1) {
                                    echo '<span class="badge bg-green">JMX</span>';
                                }
                                if ($host->jmx_available == 2) {
                                    echo '<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="' . $host->jmx_error . '"><span class="badge bg-red">JMX</span></button>';
                                }
                            }
                            echo '</td>';

                            /*
                             * Display host status
                             */
                            echo '<td>';
                            if ($host->status == '0') {
                                echo '<span class="badge bg-green">Available</span>';
                            } else {
                                echo '<span class="badge bg-red">Unavailable</span>';
                            }
                            echo '</td>';

                            /*
                             * Number of triggers
                             */
                            echo '<td>';
                            if ($host->triggers == 0) {
                                echo '<span class="badge bg-green">' . $host->triggers . '</span>';
                            } else {
                                echo '<span class="badge bg-red">' . $host->triggers . '</span>';
                            }
                            echo '</td>';

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
</div>