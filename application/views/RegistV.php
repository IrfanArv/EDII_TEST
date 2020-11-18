<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
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
                        <p>Silahkan registrasi</p>
                        <div class="page-links">
                            <a href="<?= base_url() ?>">Login</a>
                            <a href="<?= base_url() ?>signup" class="active">Daftar</a>
                        </div>
                        <form class="user" action="<?php echo site_url('signup'); ?>" method="post">
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>" placeholder="Masukan email kamu">
                            <?php echo "<span class='text-danger'>" . form_error('email') . "</span>"; ?>
                            <?php echo "<span class='text-danger'>" . $this->session->flashdata('error_email') . "</span>"; ?>

                            <input type="password" class="input-text" name="password" id="password" placeholder="Password">
                            <?php echo "<span class='text-danger'>" . form_error('password') . "</span>"; ?>

                            <input type="password" class="input-text" name="confirm_password" id="confirm_password" placeholder="Ulang Password">
                                                <?php echo "<span class='text-danger'>".form_error('confirm_password')."</span>"; ?>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Daftar</button>
                            </div>

                            <?php echo $this->session->flashdata('message'); ?>
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
        var url = "<?php echo site_url() ?>";
        jQuery.validator.setDefaults({
            highlight: function(element) {
                jQuery(element).closest('.form-control').addClass('is-invalid');

            },
            unhighlight: function(element) {
                jQuery(element).closest('.form-control').removeClass('is-invalid');
            },
            errorElement: 'div',
            errorClass: 'invalid-feedback',
            errorPlacement: function(error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());

                } else {
                    error.insertAfter(element);

                }
            }
        });

        $("#form-daftar").validate({
            rules: {
                username: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true

                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                role {
                    required: true
                }
            },
            messages: {
                username: {
                    required: "Tidak Boleh Kosong",
                    minlength: "minimal 2 characters"
                },
                password: {
                    required: "Tidak Boleh Kosong",
                    minlength: "minimal 5 characters"
                },
                confirm_password: {
                    required: "Tidak Boleh Kosong",
                    minlength: "minimal 5 characters",
                    equalTo: "Password Harus Sama"
                },
                email: {
                    email: "Email Salah",
                    required: "Tidak Boleh Kosong",
                    remote: "Email Sudah Terdaftar"
                },
                role {
                    required: "Pilih salah satu"
                }
            },


        });

        $(function() {
            if ($('.alert').show()) {
                hilang();
            }
        })

        function hilang() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 4000);
        }
    </script>
</body>

</html>