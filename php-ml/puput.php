<?php  
require_once 'vendor/autoload.php';
use Phpml\Classification\KNearestNeighbors;
?>
<!DOCTYPE html>
<html>
  <head>
    <title>K-Neirest Neighboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
  <div class="col-md-12">
    <nav class="navbar navbar-inverse" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Brand</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
  </div>
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-body">
        <legend>K-Neirest Neighboard</legend>
        <form method="POST" action="">
        <div class="form-group">
          <label>Batuk Ringan ?</label><br>
          Ya <input type="radio" name="c1" value="1"><br>
          Tidak <input type="radio" name="c1" value="0">
        </div>
        <div class="form-group">
          <label>Sesak Dada ?</label><br>
          Ya <input type="radio" name="c2" value="1"><br>
          Tidak <input type="radio" name="c2" value="0">
        </div>
        <div class="form-group">
          <label>Gatal Tenggorokan / pilek / flu ?</label><br>
          Ya <input type="radio" name="c3" value="1"><br>
          Tidak <input type="radio" name="c3" value="0">
        </div>
        <div class="form-group">
          <label>Mengi ? (Sesak / Batuk Saat malam hari)</label><br>
          Ya <input type="radio" name="c4" value="1"><br>
          Tidak <input type="radio" name="c4" value="0">
        </div>
        <div class="form-group">
          <label>Riwayat ?</label><br>
          Ya <input type="radio" name="c5" value="1"><br>
          Tidak <input type="radio" name="c5" value="0">
        </div>
        <div class="form-group">
          <label>Mengganggu Aktifitas & Tidur ?</label><br>
          Ya <input type="radio" name="c6" value="1"><br>
          Tidak <input type="radio" name="c6" value="0">
        </div>
        <div class="form-group">
          <label>Alergi ?</label><br>
          Ya <input type="radio" name="c7" value="1"><br>
          Tidak <input type="radio" name="c7" value="0">
        </div>
        <div class="form-group">
          <label>Data Set</label>
          <input type="file" name="dataset">
        </div>
        <div class="form-group">
          <button name="proses" value="xx" class="btn btn-primary" type="submit">Proses</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php  
  if(isset($_POST['proses'])){
    ?>
    <!doctype>
      <html>
      <head>
      </head>
      <body>
      <?php
      require_once "Classes/PHPExcel.php";
          $tmpfname = "dataset/puput.xlsx";
          $col=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
          $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
          $excelObj = $excelReader->load($tmpfname);
          $worksheet = $excelObj->getSheet(0);
          $lastRow = $worksheet->getHighestRow();
          $lastColumn = $worksheet->getHighestColumn();
          $data=array();
          $tempdata=array();
          $label=array();
          
          for ($row = 1; $row <= $lastRow; $row++) {
              for($x=0;;$x++) {
                if($col[$x]=="A"){
                  array_push($label, $worksheet->getCell($col[$x].$row)->getValue());
                }else{
                  array_push($tempdata, $worksheet->getCell($col[$x].$row)->getValue());
                }
                if($col[$x]==$lastColumn){
                break;
                }
              }
              array_push($data, $tempdata);
              $tempdata=array();
          }
          
          //predict
          $classifier = new KNearestNeighbors();
          $classifier->train($data, $label);
          //echo $classifier->predict([3, 2]);

                  
      ?>

      </body>
      </html>
    <?php
  }
  ?>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>