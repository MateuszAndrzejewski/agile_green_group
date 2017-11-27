<?php

  defined('BASEPATH') OR exit('No direct script access allowed.');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <link rel="icon" href="<?= base_url('assets/favicon.png'); ?>">
    <title>Agile Green Group</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/animate.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/main.css'); ?>" rel="stylesheet">

    <script src="<?= base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/tether.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-notify.min.js'); ?>"></script>
    <script type="text/javascript">

      $.notifyDefaults({
        placement: {
          from: "top",
          align: "right"
        },
        animate:{
          enter: "animated fadeInUp",
          exit: "animated fadeOutDown"
        }
      });

    </script>
  </head>

  <body>

    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Agile Green Group</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <!--
          <li class="nav-item active">
            <a class="nav-link" href="#"><i class="fa fa-home fa-2x"></i></a>
          </li>
          -->
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Job Offers</a>
          </li>
          <!--
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          -->
        </ul>

        <?php
          if( empty($_SESSION['is_authorized']) || $_SESSION['is_authorized'] === false )
          {
        ?>
          <form id="loginForm" class="form-inline my-2 my-lg-0" method="post">
            <input id="email" name="email" class="form-control mr-sm-2" type="email" placeholder="E-mail" required>
            <input id="password" name="password" class="form-control mr-sm-2" type="password" placeholder="Password" required>
            <button id="login" class="btn btn-outline-success my-2 my-sm-0" type="submit">Log in</button>
          </form>
          <button class="btn btn-outline-primary my-2 my-sm-0" style="margin-left: 10px;" data-toggle="modal" data-target="#registrationModal">Register</button>
        <?php
          }
          else
          {
        ?>
        <li class="nav-item navbar-nav navbar-right">
          <button id="userPanel" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-user"></i>  <?=$_SESSION['firstname']." ".$_SESSION['lastname']?></button>
        </li>
        <li class="nav-item navbar-nav navbar-right">
          <button id="logout" class="btn btn-outline-danger my-2 my-sm-0" style="margin-left: 10px;"><i class="fa fa-power-off"></i>  Logout</button>
        </li>

        <?php
          }
        ?>
      </div>
    </nav>
    <?php
      if( empty($_SESSION['is_authorized']) || $_SESSION['is_authorized'] === false )
      {
    ?>
      <!-- Registration Form -->
      <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form id="registrationForm">
            <div class="modal-header">
              <h5 class="modal-title" id="registrationModalLabel">Registration</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="form-group row">
                <label for="firstname-input" class="col-2 col-form-label">Firstname</label>
                <div class="col-10">
                  <input class="form-control" type="text" name="firstname" id="firstname-input" pattern="^[A-Za-z]{1,64}$" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="lastname-input" class="col-2 col-form-label">Lastname</label>
                <div class="col-10">
                  <input class="form-control" type="text" name="lastname" id="lastname-input" pattern="^[A-Za-z]{1,64}$" required>
                </div>
              </div>

              <hr>

              <div class="form-group row">
                <label for="email-input" class="col-2 col-form-label">E-mail</label>
                <div class="col-10">
                  <input class="form-control" type="email" placeholder="jan.kowalski@gmail.com" name="email" id="email-input" maxlength="128" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="password-input" class="col-2 col-form-label">Password</label>
                <div class="col-10">
                  <input class="form-control" type="password" placeholder="At least 5 characters." name="password" id="password-input" maxlength="128" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="re-password-input" class="col-2 col-form-label"></label>
                <div class="col-10">
                  <input class="form-control" type="password" placeholder="Repeat your password." id="re-password-input" maxlength="128" required>
                </div>
              </div>

              <div id="registration-alert-msg"></div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Resign</button>
              <button type="submit" class="btn btn-primary" id="register">Register</button>
            </div>
          </form>
          </div>
        </div>
      </div>

      <script type="text/javascript">

        function validate()
        {

        }

        $("#registrationForm").submit(function(e)
        {
          e.preventDefault();
          $("#register").attr('disabled', 'disabled');

          var formData = {
              firstname: $('#firstname-input').val(),
              lastname: $('#lastname-input').val(),
              email: $('#email-input').val(),
              password: $('#password-input').val()
          };

          //validate();

          $.ajax({
            type: 'POST',
            url: "<?php echo site_url('auth/register'); ?>",
            //contentType: "application/json",
            dataType: 'json',
            data: {"user_details" : formData}
          }).done(function( response )
          {
            var msg = jQuery.parseJSON(JSON.stringify(response));

            if (msg.code == 200)
            {
              $('#registrationModal').modal('toggle');

              $.notify({
                icon: msg.icon,
                title: msg.title,
                message: msg.body
              },{
                type: msg.type
              });

            }
            else
              $('#registration-alert-msg').html('<div id="error-msg" class="alert alert-danger">' + msg.body + '</div>');
              $('#error-msg').fadeIn('fast').delay(3000).fadeOut('slow');
          }).fail(function()
          {
            $('#registrationModal').modal('toggle');

            $.notify({
              icon: 'glyphicon glyphicon-alert',
              title: '<strong>Błąd serwera</strong><br><br>',
              message: 'Wystąpił nieznany błąd. Serwer nie odpowiada'
            },{
              type: 'warning'
            });
          }).always(function()
          {
            $("#register").removeAttr('disabled');
          });

        });

        $("#loginForm").submit(function(e)
        {
          e.preventDefault();
          $("#login").attr('disabled', 'disabled');

          var formData = {
              email: $('#email').val(),
              password: $('#password').val()
          };

          $.ajax({
            type: 'POST',
            url: "<?php echo site_url('auth/login'); ?>",
            //contentType: "application/json",
            dataType: 'json',
            data: {"user_details" : formData}
          }).done(function( response )
          {
            var msg = jQuery.parseJSON(JSON.stringify(response));
            console.log(msg);
            window.location.href = msg.url;
          }).fail(function()
          {
            $.notify({
              icon: 'glyphicon glyphicon-alert',
              title: '<strong>Błąd</strong><br><br>',
              message: 'Podano nieprawidłowe dane logowania.'
            },{
              type: 'warning'
            });
          }).always(function()
          {
            $("#login").removeAttr('disabled');
          });

        });
      </script>
    <?php
      }
      else
      {
    ?>
    <script>
    $("#logout").click(function() {
      window.location.href = "<?=site_url('auth/logout')?>";
    });
    </script>
    <?php
      }
    ?>
