<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?=APP_NAME; ?> | Login</title>

    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <link rel="stylesheet" href="<?=base_url(); ?>assets/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>assets/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>assets/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>assets/vendor/bootstrap/dist/css/bootstrap.css" />

    <link rel="stylesheet" href="<?=base_url(); ?>assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>assets/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>assets/styles/style.css">
    <style>
        body{
            background-image: url(<?=base_url(); ?>assets/images/pattern2.png);
        }
    </style>

</head>
<body class="blank">
<?php $this->load->view("layout/splash"); ?>
<div class="color-line"></div>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title><?=APP_NAME?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    @import url("<?=base_url(); ?>assets/vendor/fontawesome/css/font-awesome.css");
.login-block{
    background: #DE6262;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #FFB88C, #DE6262); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
float:left;
width:100%;
padding : 50px 0;
}
.banner-sec{background:url("<?=base_url();?>assets/images/LOGO_MITRA_JATENG.png")  no-repeat left bottom; background-size:cover; min-height:400px; border-radius: 0 10px 10px 0; padding:0;}
.container{background:rgba(255,255,255,1); border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);max-width:90%;}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: blue; color:#fff; font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}
    </style>
    <script src="<?=base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />');
            else $('head > link').filter(':first').replaceWith(defaultCSS);
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height());
          window.parent.postMessage( iframe_height, 'http://10.175.4.6');
        });
    </script>
</head>
<body>
    <section class="login-block">
    <div class="container">
    <div class="row">
        <div class="col-md-4 login-sec">
            <h2 class="text-center">Digi Micro Loan<br>Login</h2>
<form class="login-form" method="POST" action="<?=base_url();?>main/login">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Username AD</label>
    <input type="text" name="user_name" class="form-control" placeholder="" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input type="password" name="user_password" class="form-control" placeholder="">
  </div>
     <?php if(!empty($_SESSION['error_login'])){ ?>
          <div class="form-group">
                <label class="text-danger"><b><?=$_SESSION['error_login'];?></b></label>
          </div>
    <?php } ?>
 <div class="form-check">
    <button type="submit" name="login" class="btn btn-login float-right">Masuk</button>
  </div>

</form>
<div class="copy-text">
    
</div>

        </div>
        <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
   <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">

      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>
      </div>
    </div>
   </div>

        </div>
    </div>
</div>
</section>
    <script type="text/javascript">

    </script>
</body>
</html>










<script src="<?=base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/iCheck/icheck.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/sparkline/index.js"></script>

<script src="<?=base_url(); ?>assets/scripts/homer.js"></script>

</body>
</html>
