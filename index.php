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
  <div class="content">
  
    <h1>Build a form <a href="forms" style="float: right;">View Existing Forms</a></h1>
    <div class="build-wrap"></div>
    <div class="render-wrap"></div>
    <button id="edit-form">Edit Form</button>
  </div>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/form-builder.min.js"></script>
  <script src="assets/js/form-render.min.js"></script>
 <!-- <script src="assets/js/demo.js"></script> -->

  <script>
    jQuery(document).ready(function($) {
  var buildWrap = document.querySelector('.build-wrap'),
    renderWrap = document.querySelector('.render-wrap'),
    editBtn = document.getElementById('edit-form'),
    //formData = window.sessionStorage.getItem('formData'),
    formData = '';
    editing = true,
    fbOptions = {
      dataType: 'json'
    };

  if (formData) {
    fbOptions.formData = JSON.parse(formData);
  }

  var toggleEdit = function() {
    document.body.classList.toggle('form-rendered', editing);
    editing = !editing;
  };

  var formBuilder = $(buildWrap).formBuilder(fbOptions).data('formBuilder');

  $('.form-builder-save').click(function() {
   // document.getElementById("res").innerHTML = formBuilder.formData;

      $.ajax({
        type:'POST',
        data: {result: formBuilder.formData } ,
        url:'process.php',
        cache: false,
        success: function(result){
          alert('Form save Successfully! Click View Existing Forms to see your form');
        },
        error: function(){
          alert("Failed");
        }
       }); 
   });

  editBtn.onclick = function() {
    toggleEdit();
  };
});

  </script>
</body>

</html>
