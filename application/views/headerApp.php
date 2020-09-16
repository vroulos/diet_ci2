<!DOCTYPE html>
<html>
<head>
  <title>MyWebApp</title>
  <link rel="icon"  href="<?php echo base_url('assets/images/favicon.png'); ?>">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
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
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Σύνδεση</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="<?= base_url('dietitians/logind') ?>">Διαιτολόγος</a>
              <a class="dropdown-item" href="<?= base_url('user/login') ?>">Πελάτης</a>
            </div>
          </li>
        </ul>
     
       
          
        
      </div>
           
        <div class="nav-item dropdown">
          <ul>
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown09" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"> </span>
                    Γλώσσα</a>
                <div class="dropdown-menu" aria-labelledby="dropdown09">
                    <a class="dropdown-item" href="<?= base_url('mywebapp/first') ?>"><span class=".fa-flag-o"> </span>Ελληνικά</a>
                     <a class="dropdown-item" href="<?= base_url('mywebapp/firstEng') ?>"><span class=".fa-flag-o"> </span>English</a>
                </div>
                   </ul>
            </div>

     
    </nav>