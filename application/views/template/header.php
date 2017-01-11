    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Application</title>

      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap-responsive.min.css">
      <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?=base_url()?>assets/css/custom.css">
      <script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/js/jquery-3.1.1.min.js"></script>
  </head>

  <?php if($this->session->userdata('is_logged_in')){ ?>   

    <div class="navbar">
      <div class="navbar-inner">
        <a class="brand" href="#">Well come to Application</a>
    <ul class="nav">
      <li class="active" ><a href="<?=base_url()?>user/logout">Logout</a></li>
    </ul>
      </div>
    </div>

<?php }else{ ?>
    <div class="navbar">
      <div class="navbar-inner">
        <a class="brand" href="#">Application User Login</a>
       
      </div>
      
    </div>
<?php } ?>



</html>