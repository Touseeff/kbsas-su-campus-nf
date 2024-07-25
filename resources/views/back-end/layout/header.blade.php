<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KBSAS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url("back-end/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url("back-end/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
  <link rel="stylesheet" href="{{ url("back-end\dist\css\style1.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url("back-end/dist/css/adminlte.min.css")}}">
  <!-- Include the script to hide the alert after 5 seconds -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set a timeout to hide the alert after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            var alertMessage = document.getElementById('alert-message');
            if (alertMessage) {
                alertMessage.style.display = 'none';
            }
        }, 5000);
    });
</script>
</head>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ url("back-end/dist/img/AdminLTELogo.png") }}" alt="AdminLTELogo" height="60" width="60">
  </div> --}}
