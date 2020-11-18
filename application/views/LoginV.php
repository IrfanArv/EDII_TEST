<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/fontawesome-all.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/style.css' ?>">
</head>

<body>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="<?php echo base_url() . 'assets/images/graphic1.svg' ?>">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Selamat Datang</h3>
                        <div class="page-links">
                            <a href="<?= base_url() ?>" class="active">Login</a>
                            <a href="<?= base_url() ?>signup">Daftar</a>
                        </div>
                        <form class="user" action="<?php echo site_url('login'); ?>" method="post">
                            <?php echo $this->session->flashdata('error'); ?>
                            <?php echo $this->session->flashdata('message'); ?>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="text" class="form-control" value="<?php echo set_value('email') ?>" name="email" id="email" aria-describedby="emailHelp" placeholder="Email">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button>
                            </div>

                            <?php echo "<span class='text-danger'>" . form_error('email') . "</span>"; ?>
                            <?php echo "<span class='text-danger'>" . $this->session->flashdata('error_email') . "</span>"; ?><br>
                            <?php echo "<span class='text-danger'>" . form_error('password') . "</span>"; ?>
                            <?php echo "<span class='text-danger'>" . $this->session->flashdata('error_password') . "</span>"; ?>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");;
    });
</script>

<script type="text/javascript">
    $(function(){
      if($('.alert').show()){
        hilang();
        }
    });
      
    function hilang(){
      window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 4000);
    }


</script>
</body>

</html>