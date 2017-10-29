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

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/main.css'); ?>" rel="stylesheet">
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
          if( empty($_SESSION['is_logged']) || $_SESSION['is_logged'] === false )
          {
        ?>
          <form class="form-inline my-2 my-lg-0" >
            <input name="email" class="form-control mr-sm-2" type="email" placeholder="E-mail">
            <input name="password" class="form-control mr-sm-2" type="password" placeholder="Password">
            <button id="login" class="btn btn-outline-success my-2 my-sm-0" type="submit">Log in</button>
          </form>
          <button id="register" class="btn btn-outline-primary my-2 my-sm-0" style="margin-left: 10px;">Register</button>
        <?php
          }
        ?>
      </div>
    </nav>
