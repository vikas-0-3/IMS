<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->config->item('website_name') ?> Dashboard | Login</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url(); ?>asset/img/svg/logo.svg" type="image/x-icon">
  <link rel="stylesheet" href="<?= base_url(); ?>asset/css/style.min.css">
  <link href="<?= base_url(); ?>asset/plugins/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url(); ?>asset/plugins/dropzone/dropzone.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
	


  <style>
.alert {
  padding: 20px;
  color: white;
  width: 350px;
  position: fixed;
  top: 0;
  right: 0;
  z-index: 1;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

/* checkbox css */

  

</style>
</head>

<body>


<!-- <?php
if($this->session->flashdata('alert')) {
$message = $this->session->flashdata('alert');
?>
<div class="alert" style="background-color:<?= $message['color'] ?>;">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong><?php echo $message['message']; ?> !</strong> 
</div>
<?php unset($_SESSION['flashdata']); } ?> -->