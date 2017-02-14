<?php include 'conn.php' ?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="assets/css/demo.css">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/form-builder.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/form-render.min.css">
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title>My Survey Builder</title>
</head>

<body>
 

   <?php 
$id = $_GET['id'];
$sql = "SELECT * FROM forms WHERE pk_i_id = {$id}";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  ?>

  <?php

$row = $result->fetch_assoc();
   ?>
  <form id="fb-render"></form>
  <hr>

  <a href="index.php">Create a new Form</a> | <a href="forms.php">View Forms</a>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/form-builder.min.js"></script>
  <script src="assets/js/form-render.min.js"></script>
 <!-- <script src="assets/js/demo.js"></script> --> 

<script>

jQuery(document).ready(function($) {
  var fbRender = document.getElementById('fb-render'),
    formData = '<?php echo $row['s_form'] ?>';
    
    var formRenderOpts = {
    formData: formData,
     dataType: 'json'
  };

  $(fbRender).formRender(formRenderOpts);
});

</script>

  <?php
} else {
    echo "0 results";
}
  ?>
</body>

</html>
<?php $conn->close(); ?>
