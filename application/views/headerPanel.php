<!DOCTYPE html>
<html>
<head>
  <title>MyWebApp</title>
  <link rel="icon"  href="<?php echo base_url('assets/images/favicon.png'); ?>">
  <!-- load the jquery from cdn because the toggle navigation was not working -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- load local bootstrap css -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

  
  </head>
  <body>

<nav class="navbar navbar-fixed-top navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="#">nutricio</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link " href="<?= base_url('adminPanel/adminLogout') ?>">Αποσύνδεση</a>
          </li>
<!--           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Σύνδεση</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="<?= base_url('dietitians/logind') ?>">Διαιτολόγος</a>
              <a class="dropdown-item" href="<?= base_url('user/login') ?>">Πελάτης</a>
            </div>
          </li> -->
        </ul>
        
      </div>
    </nav>