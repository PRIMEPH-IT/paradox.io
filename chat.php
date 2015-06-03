<?php
  include("include/init.php");
  $result = mysqli_query($conn, "SELECT * FROM chat_messages order by cm_datetime desc");

  if(isset($_POST['message'])&&trim($_POST['message'])!=""){
    $sql = "INSERT INTO `chat_messages` (`cm_datetime`, `cm_name`, `cm_message`) VALUES 
        (NOW(), '".mysqli_real_escape_string($conn, $_SESSION['name'])."', '".mysqli_real_escape_string($conn, $_POST['message'])."');";
    mysqli_query($conn, $sql);
    header("Refresh:0");
  }
  if(isset($_POST['name'])&&trim($_POST['name'])!=""){
    $_SESSION['name']=$_POST['name'];
  }
  
?>
<!doctype html> 
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>paradox.io - PRIME Philippines IT Department</title>
        <meta name="description" content="The official productivity tool of PRIME Philippines.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <!--<link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            paradox.io
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="navbar-form navbar-right">
            <span>Hello, <?php echo $_SESSION['name'];?>!&nbsp;&nbsp;&nbsp;</span>
            <a href="index" class="btn btn-primary">Logout</a>
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="row">
          <br/>
          <h3>Fall down seven times, get up eight.</h3>
          <h4>This is the paradox.io chatbox. Please be aware that all messages can be seen by everyone else at the moment.</h4>
      </div>
      <div class="row">
        <div class="well chatbox">
          <?php
            while ($row = mysqli_fetch_array($result)) {
              $dtime = strtotime($row['cm_datetime']);
              $formatteddtime = date("M d, Y / g:i A", $dtime);
               echo '<span class="label label-default">'.$formatteddtime.'</span>&nbsp;<h4 class="label label-primary">'.$row['cm_name'].':</h4>&nbsp;&nbsp;'.$row['cm_message'].'<br/>';
            }
          ?>
          
        </div>
      </div>

        <div class="row clearfix">
          
            <form role="form" method="post" action="chat">
              <div class="col-md-8 col-md-offset-2 column">
                <div class="form-group">
                 <label for="exampleInputEmail1">Message:</label>
                 <div class="input-group">
                   <input type="text" class="form-control" id="message" name="message" required/>
                     <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </span>
                </div>
                </div>
              </div>
            </form>
        </div>
      
    </div>
    <div class="container">
      <hr/>
      <footer>
        <p>&copy; PRIME Philippines 2015</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. 
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>-->
    </body>
</html>
