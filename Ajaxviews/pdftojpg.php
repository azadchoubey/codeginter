<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>  
<!DOCTYPE html>
<html lang="en-US">

<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Location</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>ci/css/loading.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<script>
    $(document).ready(function() {
        $('#blah').hide();
        $('#image').click(function() {
            $('#blah').fadeIn(6000);
        })
        $('#reset').click(function() {
            $('#blah').hide();


        })
        $('.image-link').magnificPopup({type:'image'});

        
    })
    </script>
<body>
    <div class="contanier text-center mt-5">

    <img id="blah" alt="your image" width="350" height="350" />
    <div class="row">
    <div class="col-12">

    <?php
    if(isset($error)){
        echo $error;

    }elseif(isset($jpg)){
       echo' <a class="image-link" href="'.base_url('ci/'.  $jpg ).'">Open popup</a>';
        echo '<div class="contanier text-center mt-5"> <img src = "'.base_url('ci/'.  $jpg ).'" width="720" height="800" > </div>';

    }
?>
        <form enctype="multipart/form-data" method="POST"
            action='<?php  echo base_url("ci/index.php/resize/resize/pdftojpg");?> '>

           
            <div class="mt-4">
             <span class="btn btn-success btn-file">
                Select Image<input type="file" name="pdf" id="image" 
                  multiple  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" required>
            </span>
            <input type="submit" name="submit" value="Upload Photo" class="btn btn-primary btn-file ">
            <input type="reset" id="reset" value="Remove Photo " class="btn btn-danger btn-file " />
        </form>
        </div>
        </div>
        </div>
    </div>










</body>