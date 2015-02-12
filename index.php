<?php
ERROR_REPORTING(E_ALL);
$uploaddir = getcwd() . '/upload/';
$uploadfile = $uploaddir . 'domains';

$uploaded = false;
if (!empty($_FILES['csvfile'])){
    if(move_uploaded_file($_FILES['csvfile']['tmp_name'], $uploadfile)) {
        $uploaded = true;
    }
}

?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MX Lookup</title>
    <style>
        .jumbotron {
          text-align: center;
          background-color: transparent;
        }
        .jumbotron .btn {
          padding: 14px 24px;
          font-size: 21px;
        }
        .jumbotron #csvfile {
            margin: 0 auto;
        }
    </style>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
            <div class="page-header">
                <h1>MX Lookup</h1>
            </div>
            
            <form action="index.php" enctype="multipart/form-data" method="POST">
                <p class="lead">Provide a CSV file containing the domain and the total count of that domain separeated by comma..</p>
                <div class="form-group">
                    <label for="csvfile">Choose your file</label>
                    <input type="file" id="csvfile" name="csvfile">
                </div>
                <p><button type="submit" class="btn btn-lg btn-success">Submit</button></p>
            </form>
            <?php if ($uploaded): ?>
            <p class="bg-success">Your file is ready, copy it's contents bellow</p>
            <textarea><?php system("./resolve; cat ./uploads/domains.resolved"); ?></textarea>
            <?php endif; ?>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>