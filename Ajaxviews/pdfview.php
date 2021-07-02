
                
       
              
                <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>preview</title>
  </head>
  <body> 
  



  <div class="contanier mt-5 ">  <div class="row align-items-end">
  <div class="row">
  <div class="col-md-3 ml-md-auto">
<form enctype="multipart/form-data" method="POST"
            action='<?php  echo base_url("index.php/resize/resize/pdftojpg");?> '>

           
        
            <input type="hidden"  value="<?php echo 'upload/pdftojpg/'.$result['file_name'];?>" name = 'file' class="btn btn-success btn-file " />
             <input type="submit"  value="Convert jpg"class="btn btn-warning btn-lg" data-toggle="modal" name='sub'data-target=".bd-example-modal-lg">
           
        </form>
        
  

        </div>
  </div>    <?php 
if(isset($result)){
echo '<object width="720px" height="600px" data="'.base_url('upload/pdftojpg/'.$result['file_name']).'"></object>';

}else{

    echo $error;
}
?>  

      </div>

      </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>