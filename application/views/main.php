<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Stylish Portfolio - Start Bootstrap Template</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="<?=base_url()?>assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?=base_url()?>assets/css/stylish-portfolio.min.css" rel="stylesheet">

</head>
<body id="page-top">

  <!-- Navigation -->
  <a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">
        <a class="js-scroll-trigger" href="#page-top">4uerere</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#page-top">Cari Makan</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#about">Menu Makan</a>
      </li>
    </ul>
  </nav>

  <!-- Header -->
  <header class="masthead d-flex">
    <div class="container text-center my-auto">
      <h1 class="mb-5">Makan Apa Kali Ini?</h1>
      <h2 class="mb-5" id="hasil-makanan">
        <a class="btn btn-success text-left cari-makanan" >Cari</a>
      </h2>
      
    </div>
  </header>

  <!-- About -->
  <section class="content-section bg-light" id="about">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2>Menu Makan</h2>
            <div class="text-left">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Tambah</button>
            </div>
            <table class="table table-bordered ">
            <thead>
              <tr>
                <th class="text-left">Nama Makanan</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
            foreach ($data as $d) {?>
              <!-- echo $d['no']. "<br>"; -->
              <tr>
                <td class="text-left"><?=$d['nama']?></td>
                <td><a href="<?=base_url()?>user/delete/<?=$d['no']?>"><button class="btn btn-danger">Hapus</button></a></td>
              </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <div id="myModal" class="modal fade" role="dialog">
    <form action="<?=base_url()?>user/insert" method="post">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="usr">Nama Makanan:</label>
              <input type="text" class="form-control" name="namamakanan" id="usr">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
          </div>
        </div>

      </div>
    </form>
  </div>
  <?php
  ?>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">

      <h4 class="text-muted ">4uerere</h4>
    </div>
  </footer>

  <?php
    $data_json = json_encode($data);
  ?>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?=base_url()?>assets/js/stylish-portfolio.min.js"></script>

  <script>
    
    var animationTimer;
    $('.cari-makanan').click(function(){
            data = JSON.parse('<?=$data_json?>');
            console.log(data);
            var output, started, duration, desired;
            // Initial setup
            output = $('#hasil-makanan');
            // Animate! 
            timesRun = 0;
            animationTimer = setInterval(function() {
                    index = Math.floor(Math.random() * Math.floor(data.length));
                    output.text(data[index].nama);
                    timesRun += 1;
                    if(timesRun == 130){
                        clearInterval(animationTimer);
                    }
            }, 20);
    });
  </script>

</body>

</html>
