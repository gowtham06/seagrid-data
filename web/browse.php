<?php
    include 'config.php';

    //FIXME Time should be shown in locally
    date_default_timezone_set('America/Indianapolis');

    function convert_date($hit)
    {
        $hit[0] = substr($hit[0],1,-1);
        return intval(strtotime($hit[0])*1000);
    }

    session_start();
    if(!isset($_SESSION['username'])){
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
        header('Location: ' . $home_url);
    }

?>

<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
              integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="assets/css/browse.css" />


    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./index.php">SEAGrid Data Catalog</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="./search.php">Search</a></li>
                        <li class="active"><a href="./browse.php">Directory Browser</a></li>
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username'] ?><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="center-content">
                <br><br><br>
                <div class="well-sm" id="tools">
                    <a class="btn btn-default" id="refresh-button"><i class="icon-refresh"></i> Refresh</a>
                </div>

                <!-- breadcrumb -->
                <ol class="breadcrumb" id="breadcrumb"></ol>
                <!-- file manager view -->
                <div class="input-group"> <span class="input-group-addon">Filter</span>
                    <input id="filter-text" type="text" class="form-control" placeholder="Search Here...">
                </div>
                <br/>
                <table class="table table-hover table-condensed" id="filemanager"></table>

                <!-- message box -->
                <div id="msgbox"></div>

            </div>
        </div><!-- /.container -->

        <!--JQuery MinJS-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
                integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="assets/js/filemanager.js"></script>
        <script type="text/javascript">
            var PATH = '<?php echo $_SESSION['username']; ?>';
            browse(PATH);
        </script>
    </body>
</html>
