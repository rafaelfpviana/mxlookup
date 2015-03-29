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
        #progressbar{display:none}
        #res{width:700px;height:200px}
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
            <div id="progressbar"></div>
            <p class="lead">Provide a CSV file containing the domain and the total count of that domain separeated by comma..</p>
            <div class="form-group">
              <input type="file" id="csvfile" name="csvfile" data-filename-placement="inside" title="Choose your file" />
            </div>
            <h2>Result - copy it bellow</h2>
            <textarea id="res"></textarea>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/mootools/1.5.1/mootools-yui-compressed.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/css/base/jquery-ui.css">
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.file-input.js"></script>
    <script src="js/lookup.js"></script>
  </body>
</html>