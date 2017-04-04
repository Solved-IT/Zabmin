<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Hosts overview</h1>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
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
                                foreach ($hosts as $host) {
                                    echo "<tr>";
                                    echo "<td>" . $host->hostid . "</td>";
                                    echo "<td>" . $host->name . "</td>";
                                    echo "<td>" . $host->description . "</td>";
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
            <pre><?php var_dump($hosts) ?></pre>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
