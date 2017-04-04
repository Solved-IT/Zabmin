<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Zabmin | <?php echo $title; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="<?= BASEURL ?>/public/assets/css/AdminLTE.min.css">

        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?= BASEURL ?>/public/assets/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous">></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous">></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
        <script src="<?= BASEURL ?>/public/assets/js/app.min.js"></script>
        <script src="<?= BASEURL ?>/public/assets/js/demo.js"></script>
    </head>

    <body class="hold-transition <?php echo (Request::active()->action != 'login') ? 'skin-green sidebar-mini' : 'login-page' ?>">
        <!-- Site wrapper -->
        <div class="wrapper">
            <?php
            /*
             * If the requested action is login, do not display header and sidebar
             */

            if (Request::active()->action != 'login') {
                echo $header;
                echo $sidebar;
            }

            echo '<div class="content">';

            /*
             * Display any alert messages
             */

            if (!empty(Session::get_flash())) {
                foreach (Session::get_flash() as $message) {
                    echo '<div class="col-md-12">';

                    switch ($message['value']['type']) {
                        case "error":
                            echo '<div class="alert alert-danger alert-dismissible">';
                            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                            echo '<h4><i class="icon fa fa-ban"></i>An error has occured</h4>';
                            break;
                        case "info":
                            echo '<div class="alert alert-info alert-dismissible">';
                            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                            echo '<h4><i class="icon fa fa-info"></i>A notification</h4>';
                            break;
                        case "warning":
                            echo '<div class="alert alert-warning alert-dismissible">';
                            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                            echo '<h4><i class="icon fa fa-warning"></i>Warning!</h4>';
                            break;
                        case "success":
                            echo '<div class="alert alert-success alert-dismissible">';
                            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                            echo '<h4><i class="icon fa fa-check"></i>That worked!</h4>';
                            break;
                    }

                    echo $message['value']['message'];
                    echo '</div>';
                }
            }

            echo $content;

            if (Request::active()->action != 'login') {
                echo '<footer class="main-footer">';
                echo '<div class = "pull-right hidden-xs">';
                echo '<b>Version</b> 0.0.1 ALPHA';
                echo '</div>';
                echo '<strong>Copyright &copy;' . date('Y') . $site_title . '.</strong> All rights reserved.';
                echo '</footer>';
            }
            ?>
        </div> <!-- content div -->
    </div> <!-- wrapper div -->
</body>
</html>