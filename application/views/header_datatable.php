<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">

<title>Hobbies</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
<script src="<?php echo base_url();?>assets/js/require.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
            if(isset($headerassets)) {
                foreach ($headerassets as $assetstype => $headerasset) {
                    if($assetstype == 'css') {
                      if(count($headerasset)) {
                        foreach ($headerasset as $keycss => $css) {
                          echo '<link rel="stylesheet" href="'.base_url($css).'">'."\n";
                        }
                      }
                    } elseif($assetstype == 'js') {
                      if(count($headerasset)) {
                        foreach ($headerasset as $keyjs => $js) {
                          echo '<script type="text/javascript" src="'.base_url($js).'"></script>'."\n";
                        }
                      }
                    }
                }
            }
        ?>
   

<!-- Input Mask Plugin -->
<script src="<?php echo base_url();?>assets/plugins/input-mask/plugin.js"></script>
<!--Custom Css-->
<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" /> 

 <!--Dashboard Core -->
<!--<link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet" />-->
<!--<script src="<?php echo base_url();?>assets/js/dashboard.js"></script>-->
 <!--c3.js Charts Plugin -->
<link href="<?php echo base_url();?>assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
<script src="<?php echo base_url();?>assets/plugins/charts-c3/plugin.js"></script>
<!-- Google Maps Plugin -->
<!--<link href="<?php echo base_url();?>assets/plugins/maps-google/plugin.css" rel="stylesheet" />-->
<!--<script src="<?php echo base_url();?>assets/plugins/maps-google/plugin.js"></script>-->
<!-- Datatables Plugin -->
<!--<script src="<?php echo base_url();?>assets/plugins/datatables/plugin.js"></script>-->
<!--select search-->
<!--<link href="<?php echo base_url();?>assets/css/fSelect.css" rel="stylesheet" />-->
<!--<script src="<?php echo base_url();?>assets/js/fSelect.js"></script>-->
<!--<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>-->
<!--<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>-->
<!--<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
<!--<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css"></style>-->
<!--<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>-->
<!--<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>-->


<style>
 body {
        font-family: "Myriad Pro", Myriad, "Liberation Sans", "Nimbus Sans L", "Helvetica Neue", Helvetica, Arial, sans-serif;
 }
</style>
</head>